<?php

/**
 * Wbs
 *
 * Wbs_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 28, 2021
 * @reference   https://bootstrapmade.com/demo/templates/OnePage/
 */


namespace App\Controllers\Front;

use App\Controllers\BaseController;

use Pusher\Pusher;


class Wbs extends BaseController
{
    public function index()
    {
        return view('_front/_pages/_wbs/wbs');
    }

    public function save_data()
    {

        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'reporter_fullname' => [
                    'label' => 'Nama Lengkap ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'reporter_nik' => [
                    'label' => 'NIK ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'reporter_address' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'reporter_email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'reporter_phonenumber' => [
                    'label' => 'No HP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'employee_name' => [
                    'label' => 'Nama Pegawai',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'violation_type' => [
                    'label' => 'Jenis Pelanggaran',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'occurre_time' => [
                    'label' => 'Waktu Kejadian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'crime_scene' => [
                    'label' => 'Tempat Kejadian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'report_detail' => [
                    'label' => 'Uraian Laporan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'attachment' => [
                    'label' => 'Lampiran',
                    'rules' => 'uploaded[attachment]|mime_in[attachment,image/png,image/jpg,image/jpeg]|is_image[attachment]',
                    'errors' => [
                        'uploaded' => '{field} wajib diisi',
                        'mime_in' => 'Harus dalam bentuk gambar, jangan file yang lain'
                    ]
                ]

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'reporter_fullname' => $validation->getError('reporter_fullname'),
                        'reporter_nik' => $validation->getError('reporter_nik'),
                        'reporter_address' => $validation->getError('reporter_address'),
                        'reporter_email' => $validation->getError('reporter_email'),
                        'reporter_phonenumber' => $validation->getError('reporter_phonenumber'),
                        'employee_name' => $validation->getError('employee_name'),
                        'violation_type' => $validation->getError('violation_type'),
                        'occurre_time' => $validation->getError('occurre_time'),
                        'crime_scene' => $validation->getError('crime_scene'),
                        'report_detail' => $validation->getError('report_detail'),
                        'attachment' => $validation->getError('attachment')
                    ]
                ];
            } else {
                $id_report = $this->wbs->noLaporan();

                $wbs = "Wbs";

                $filelampiran = $this->request->getFile('attachment');

                $filelampiran->move('assets/image/lampiran', $id_report . '.' . $filelampiran->getExtension());


                $day = $this->request->getVar('calendar_day');
                $month = $this->request->getVar('calendar_month');
                $year = $this->request->getVar('calendar_year');
                $time = $this->request->getVar('occurre_time');
                $save_data_reporter = [
                    'report_id' => $id_report,
                    'reporter_fullname' => $this->request->getVar('reporter_fullname'),
                    'reporter_nik' => $this->request->getVar('reporter_nik'),
                    'reporter_address' => $this->request->getVar('reporter_address'),
                    'reporter_email' => $this->request->getVar('reporter_email'),
                    'reporter_phonenumber' => $this->request->getVar('reporter_phonenumber'),
                    'report_type' => $wbs
                ];

                $save_data_wbs = [
                    'employee_name' => $this->request->getVar('employee_name'),
                    'violation_type' => $this->request->getVar('violation_type'),
                    'occurre_time' => $day . '-' . $month . '-' . $year . ' ' . $time,
                    'crime_scene' => $this->request->getVar('crime_scene'),
                    'report_detail' => $this->request->getVar('report_detail'),
                    'attachment' => './assets/image/lampiran/' . $filelampiran->getName(),
                    'id_report' => $id_report

                ];

                $this->rprtr->insert($save_data_reporter);

                $this->wbs->insert($save_data_wbs);



                $msg = [
                    'success' => 'Pengaduan Anda Berhasil Terkirim'
                ];

                require_once(APPPATH . 'views/vendor/autoload.php');
                $options = [
                    'cluster' => 'ap1',
                    'useTLS' => true
                ];

                $pusher = new Pusher(
                    'f00b9630960e06cbb49c',
                    '1a9e6f0160eb376a5f5d',
                    '1219579',
                    $options
                );

                $data['message_wbs'] = 'success';

                $pusher->trigger('my-chanel', 'my-event', $data);
            }
            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }
}
