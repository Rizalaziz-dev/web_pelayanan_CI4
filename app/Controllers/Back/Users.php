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

namespace App\Controllers\Back;

use App\Controllers\BaseController;

use App\Models\Back\DataUser_Model;

use app\config\Email;

use Config\Services;

use Pusher\Pusher;

use Pusher\PusherInstance;



class Users extends BaseController
{

    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Master User'
        ];


        return view('_back/_pages/_admin/_user/user', $data);
    }

    public function data()
    {
        $request = Services::request();
        $datamodel = new DataUser_Model($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $btnEdit = "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->user_email . "')\">
                <i class=\"fa fa-tags\"></i>
            </button>";
                $btnRemove = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"remove('" . $list->user_email . "')\">
                <i class=\"fa fa-trash\"></i>
            </button>";

                $row[] = $no;
                $row[] = $list->user_email;
                $row[] = $list->user_name;
                $row[] = $list->user_fullname;
                $row[] = $list->user_phonenumber;
                $row[] = $list->level_name;
                $row[] = $btnEdit . "" . $btnRemove;
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }



    public function get_data()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'show_user' => $this->usr->findAll()
            ];

            $msg = [
                'data' => view('_back/_pages/_admin/_user/data_user', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }


    public function create()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('_back/_pages/_admin/_user/modal_create')
            ];

            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $user_email = $this->request->getVar('user_email');

            $row = $this->usr->find($user_email);

            $data = [
                'user_email' => $row['user_email'],
                'user_name' => $row['user_name'],
                'user_fullname' => $row['user_fullname'],
                'user_phonenumber' => $row['user_phonenumber'],
                'user_level' => $row['user_level'],
                'user_password' => $row['user_password']

            ];

            $msg = [
                'success' => view('_back/_pages/_admin/_user/modal_edit', $data)
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
                'user_name' => [
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'user_fullname' => [
                    'label' => 'Nama Lengkap ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'user_phonenumber' => [
                    'label' => 'No HP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'user_level' => [
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
                ],
                // 'confirm_password' => [
                //     'label' => 'Confirm Password',
                //     'rules' => 'required|matches[user_password]',
                //     'errors' => [
                //         'required' => '{field} tidak boleh kosong',
                //         'matches' => '{field} berbeda dengan Password'
                //     ]
                // ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'user_email' => $validation->getError('user_email'),
                        'user_name' => $validation->getError('user_name'),
                        'user_fullname' => $validation->getError('user_fullname'),
                        'user_phonenumber' => $validation->getError('user_phonenumber'),
                        'user_level' => $validation->getError('user_level'),
                        'user_password' => $validation->getError('user_password'),
                        // 'confirm_password' => $validation->getError('confirm_password')
                    ]
                ];
            } else {
                $save_data = [
                    'user_email' => $this->request->getVar('user_email'),
                    'user_name' => $this->request->getVar('user_name'),
                    'user_fullname' => $this->request->getVar('user_fullname'),
                    'user_phonenumber' => $this->request->getVar('user_phonenumber'),
                    'user_level' => $this->request->getVar('user_level'),
                    'user_password' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT)
                ];
                // print_r($save_data);
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
                'user_name' => $this->request->getVar('user_name'),
                'user_phonenumber' => $this->request->getVar('user_phonenumber'),
                'user_level' => $this->request->getVar('user_level'),
                'user_password' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT)
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
                'success' => 'User dengan Email ' . $user_email . ' berhasil dihapus'
            ];
        }
        echo json_encode($msg);
    }

    public function get_level()
    {
        if ($this->request->isAJAX()) {

            $dataLevel = $this->lvl->findAll();

            $msg = [
                'data' => $dataLevel
            ];
            echo json_encode($msg);
        }
    }

    public function sendEmail()
    {

        $this->email->setFrom('rizal.aziz37946@gmail.com', 'rizalaziz');
        $this->email->setTo('rizal.aziz37946@gmail.com');
        // $this->email->setCC('another@another-example.com');
        // $this->email->setBCC('them@their-example.com');

        $this->email->setSubject('Email Test');
        $this->email->setMessage('Testing the email class.');

        $this->email->send();

        if (!$this->email->send()) {
            return false;
        } else {
            return true;
        }
    }
}
