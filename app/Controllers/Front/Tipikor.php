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

use Pusher\Pusher;


class Tipikor extends BaseController
{
    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    public function index()
    {
        return view('_front/_pages/_tipikor/tipikor');
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
                    'rules' => 'required|min_length[16]|max_length[16]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama',
                        'max_length' => '{field} tidak boleh kurang dari 16 Angka',
                        'min_length' => '{field} tidak boleh kurang dari 16 Angka'
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
                'calendar_day' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'calendar_month' => [
                    'label' => 'Month',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'calendar_year' => [
                    'label' => 'Year',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} kosong',
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
                    'rules' => 'uploaded[attachment]|ext_in[attachment,zip,rar,jpeg,jpg,png,pdf]|max_size[attachment,8192]',
                    'errors' => [
                        'uploaded' => '{field} wajib diisi',
                        'mime_in' => 'Harus dalam bentuk gambar, jangan file yang lain',
                        'max_size' => 'Maksimal File 8 Mb'
                    ]
                ],
                'captcha' => [
                    'label' => 'Captcha',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],

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
                        'calendar_day' => $validation->getError('calendar_day'),
                        'calendar_month' => $validation->getError('calendar_month'),
                        'calendar_year' => $validation->getError('calendar_year'),
                        'occurre_time' => $validation->getError('occurre_time'),
                        'crime_scene' => $validation->getError('crime_scene'),
                        'report_detail' => $validation->getError('report_detail'),
                        'attachment' => $validation->getError('attachment'),
                        'captcha' => $validation->getError('captcha')
                    ]
                ];
            } else {

                $captcha_response = $this->request->getVar('captcha');
                if ($captcha_response != '') {

                    $secretKey = '6LfM8-sbAAAAAKql7pRHw2nECSv3VuWVmkkcvr4H';

                    $response = $this->request->getVar('captcha');

                    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$response}");

                    $status = json_decode($verify, true);
                    // var_dump($status);
                    if ($status['success']) {

                        $id_report = $this->tpkr->noLaporan();

                        $token = $this->tpkr->generateToken();

                        $tipikor = "Tipikor";

                        $sendTo = $this->request->getVar('reporter_email');

                        $name = $this->request->getVar('reporter_fullname');

                        $filelampiran = $this->request->getFile('attachment');

                        $filelampiran->move('assets/uploads/file', $id_report . '.' . $filelampiran->getExtension());


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
                            'attachment' => $filelampiran->getName(),
                            'id_report' => $id_report,
                            'token' => $token,
                            'status' => "Terkirim",
                        ];

                        $save_data_status = [
                            'tokens' => $token,
                            'status' => "Terkirim",
                        ];


                        $this->email->setFrom('Kejari Kabupaten Tasikmalaya');


                        $this->email->setTo($sendTo);

                        $this->email->setSubject('Token Pengaduan TIPIKOR');


                        $this->email->setMessage('<h1>Token Pengaduan TIPIKOR </h1> 
                        <h4> Hallo  ' . $name . '</h4> 
                        <p> Kode Token Pengaduan anda adalah : 
                        </p> <h3>' . $token . '</h3> <p> Gunakan Kode Pengaduan diatas untuk melihat progress Pengaduan di website Pelayanan Terpadu Kejari Kabupaten Tasikmalaya.<br><br>Terima Kasih, <br>PTSP Kejari Kab.Tasikmalaya</p>');

                        $this->email->send();


                        $this->rprtr->insert($save_data_reporter);

                        $this->tpkr->insert($save_data_tipikor);

                        $this->status->insert($save_data_status);


                        $msg = [
                            'success' => '*catat No Token ' . $token . ' Untuk Melihat Progress Pengaduan'
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

                        $data['message_tipikor'] = 'success';

                        $pusher->trigger('my-chanel', 'my-event', $data);
                    } else {
                        $msg = [
                            'error' =>  'Something goes to wrong 1'

                        ];
                    }
                } else {
                    $msg = [
                        'error' =>  'Something goes to wrong 2'

                    ];
                }
            }
            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }

    public function get_data()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'tipikor_search' => [
                    'label' => 'No Laporan ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'tipikor_search' => $validation->getError('tipikor_search'),

                    ]
                ];
            } else {

                $token = $this->request->getVar('tipikor_search');

                $msg = $this->status->search_id($token);

                // var_dump($row);
                // $data = [
                //     'status' => $row->status,
                //     'updated_at' => $row->updated_at,
                // ];


                // $msg = [
                //     'data' => $row
                // ];
            }
            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }
}
