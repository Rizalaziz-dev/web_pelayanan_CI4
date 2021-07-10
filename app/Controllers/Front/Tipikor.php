<?php

/**
 * Tipikor
 *
 * Tipikor_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 28, 2021
 * @reference   https://bootstrapmade.com/demo/templates/OnePage/
 */


namespace App\Controllers\Front;

use App\Controllers\BaseController;


class Tipikor extends BaseController
{
    public function index()
    {
        return view('_front/_pages/_tipikor/tipikor');
    }

    public function save_data()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                // 'user_email' => [
                //     'label' => 'Email',
                //     'rules' => 'required|is_unique[tb_m_user.user_email]',
                //     'errors' => [
                //         'required' => '{field} tidak boleh kosong',
                //         'is_unique' => '{field} tidak boleh ada yang sama'
                //     ]
                // ],
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
                'subject' => [
                    'label' => 'Subjek Laporan',
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
                        'subject' => $validation->getError('subject'),
                        'occurre_time' => $validation->getError('occurre_time'),
                        'crime_scene' => $validation->getError('crime_scene'),
                        'report_detail' => $validation->getError('report_detail')
                    ]
                ];
            } else {
                $id_report = $this->tpkr->noLaporan();
                $tipikor = "Tipikor";
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
                    'report_type' => $tipikor
                ];

                $save_data_tipikor = [
                    'subject' => $this->request->getVar('subject'),
                    'occurre_time' => $day . '-' . $month . '-' . $year . ' ' . $time,
                    'crime_scene' => $this->request->getVar('crime_scene'),
                    'report_detail' => $this->request->getVar('report_detail'),
                    'id_report' => $id_report

                ];

                $this->rprtr->insert($save_data_reporter);

                $this->tpkr->insert($save_data_tipikor);

                $msg = [
                    'success' => 'Data Mahasiswa Berhasil Tersimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }
}
