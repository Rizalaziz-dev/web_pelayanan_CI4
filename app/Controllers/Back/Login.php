<?php

/**
 * Login
 *
 * Login_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 20, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Controllers\Back;

use App\Controllers\BaseController;

class Login extends BaseController
{

    public function index()
    {
        return view('_back/_login/index');
    }

    public function check_login()
    {

        if ($this->request->isAJAX()) {



            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'user_email' => [
                    'label' => 'Username atau Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'password' => [
                    'label' => 'Password ',
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
                        'user_email' => $validation->getError('user_email'),
                        'password' => $validation->getError('password')
                    ]
                ];
            } else {

                $user_email = $this->request->getVar('user_email');

                $password = $this->request->getVar('password');

                $data = $this->login->select('*')
                    ->join('tb_m_level', 'user_level=level_id')
                    ->where('user_email', $user_email)
                    ->first();


                if ($data) {
                    $pass = $data['user_password'];
                    if (password_verify($password, $pass)) {
                        $save_session = [
                            'login' => true,
                            'user_email' => $user_email,
                            'user_name' => $data['user_fullname'],
                            'id_level' => $data['user_level'],
                            'nama_level' => $data['level_name']
                        ];
                        $this->session->set($save_session);

                        $msg = [
                            'success' => [
                                'link' => '/admin/users'
                            ]
                        ];
                    } else {
                        $msg = [
                            'error' => [
                                'password' => 'Maaf Password Salah'
                            ]
                        ];
                    }
                } else {
                    $msg = [
                        'error' => [
                            'user_email' => 'Maaf Username tidak ditemukan'
                        ]
                    ];
                }
            }

            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }

    public function out()
    {
        $this->session->destroy();

        return redirect()->to('/Back/login');
    }
}
