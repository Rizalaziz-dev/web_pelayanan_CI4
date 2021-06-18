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
            $data = [
                'show_user' => $this->usr->findAll()
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

    public function form_edit()
    {
        if ($this->request->isAJAX()) {
            $user_email = $this->request->getVar('user_email');

            $row = $this->usr->find($user_email);

            $data = [
                'user_email' => $row['user_email'],
                'user_fullname' => $row['user_fullname'],
                'user_group' => $row['user_group'],
                'user_password' => $row['user_password']

            ];

            $msg = [
                'success' => view('_pages/User/modal_edit', $data)
            ];
            echo json_encode($msg);
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

                $this->usr->insert($save_data);

                $msg = [
                    'success' => 'Data Mahasiswa Berhasil Tersimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }

    public function update_data()
    {
        if ($this->request->isAJAX()) {
            $save_data = [
                'user_fullname' => $this->request->getVar('user_fullname'),
                'user_group' => $this->request->getVar('user_group'),
                'user_password' => $this->request->getVar('user_password')
            ];

            $user_email = $this->request->getVar('user_email');

            $this->usr->update($user_email, $save_data);

            $msg = [
                'success' => 'Data User Berhasil di Perbarui'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Permintaan Anda Tidak Dapat di Proses');
        }
    }

    public function remove()
    {
        if ($this->request->isAJAX()) {
            $user_email = $this->request->getVar('user_email');

            $this->usr->delete($user_email);

            $msg = [
                'success' => 'User dengan Email $user_email berhasil dihapus'
            ];
        }
        echo json_encode($msg);
    }
}
