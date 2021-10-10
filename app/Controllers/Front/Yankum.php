<?php

/**
 * Lankum
 *
 * Lankum_Controller scripts
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

class Yankum extends BaseController
{
    public function __construct()
    {
        $this->email = \Config\Services::email();
    }
    public function index()
    {
        return view('_front/_pages/_yankum/yankum');
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
                'question_type' => [
                    'label' => 'Kategori',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'question_subject' => [
                    'label' => 'Subyek',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'question_detail' => [
                    'label' => 'Isi Laporan',
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
                        'mime_in' => 'Harus dalam bentuk gambar, jangan file yang lain'
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
                        'question_type' => $validation->getError('question_type'),
                        'question_subject' => $validation->getError('question_subject'),
                        'question_detail' => $validation->getError('question_detail'),
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

                        $id_report = $this->yankum->noLaporan();

                        $token = $this->yankum->generateToken();

                        $yankum = "Yankum";

                        $sendTo = $this->request->getVar('reporter_email');

                        $name = $this->request->getVar('reporter_fullname');

                        $filelampiran = $this->request->getFile('attachment');

                        $filelampiran->move('assets/image/lampiran', $id_report . '.' . $filelampiran->getExtension());

                        $save_data_reporter = [
                            'report_id' => $id_report,
                            'reporter_fullname' => $this->request->getVar('reporter_fullname'),
                            'reporter_nik' => $this->request->getVar('reporter_nik'),
                            'reporter_address' => $this->request->getVar('reporter_address'),
                            'reporter_email' => $this->request->getVar('reporter_email'),
                            'reporter_phonenumber' => $this->request->getVar('reporter_phonenumber'),
                            'report_type' => $yankum
                        ];

                        $save_data_yankum = [
                            'question_type' => $this->request->getVar('question_type'),
                            'question_subject' => $this->request->getVar('question_subject'),
                            'question_detail' => $this->request->getVar('question_detail'),
                            'attachment' => $filelampiran->getName(),
                            'id_report' => $id_report,
                            'token' => $token,

                        ];

                        $this->email->setFrom('Kejari Kabupaten Tasikmalaya');

                        $this->email->setTo($sendTo);

                        $this->email->setSubject('Token Pengaduan WBS');

                        $this->email->setMessage('<h1>Token Pengaduan WBS</h1> 
                        <h4> Hallo  ' . $name . '</h4> 
                        <p> Kode Token Pengaduan anda adalah : 
                        </p> <h3>' . $token . '</h3> <p> Gunakan Kode Pengaduan diatas untuk melihat progress Pengaduan di website Pelayanan Terpadu Kejari Kabupaten Tasikmalaya.<br><br>Terima Kasih, <br>PTSP Kejari Kab.Tasikmalaya</p>');

                        $this->email->send();


                        $this->rprtr->insert($save_data_reporter);

                        $this->yankum->insert($save_data_yankum);

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
}
