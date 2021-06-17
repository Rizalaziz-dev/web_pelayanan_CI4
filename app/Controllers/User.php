<?php


/**
 * User
 *
 * User_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Controllers;

use App\Models\User_model;




class User extends BaseController
{

    public function index()
    {
        $page_tittle = [
            'tittle' => 'Master User'
        ];



        return view('_pages/User/user');
    }

    public function get_data()
    {
        if ($this->request->isAJAX()) {
            $user = new User_model();
            $data = [
                'show_user' => $user->findAll()
            ];

            $msg = [
                'data' => view('_pages/User/data_user', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }

    public function form_create()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('_pages/User/modal_create')
            ];

            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }

    public function save_data()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'user_email' => [
                    'label' => 'Email',
                    'rules' => 'required|is_unique[tb_m_user.user_email]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'user_fullname' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'user_group' => [
                    'label' => 'Group',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'user_password' => [
                    'label' => 'Password',
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
                        'user_fullname' => $validation->getError('user_fullname'),
                        'user_group' => $validation->getError('user_group'),
                        'user_password' => $validation->getError('user_password')
                    ]
                ];
            } else {
                $save_data = [
                    'user_email' => $this->request->getVar('user_email'),
                    'user_fullname' => $this->request->getVar('user_fullname'),
                    'user_group' => $this->request->getVar('user_group'),
                    'user_password' => $this->request->getVar('user_password')
                ];

                $mhs = new User_model();

                $mhs->insert($save_data);

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
