<?php

namespace App\Controllers\Back\Sitaraa;

use App\Controllers\BaseController;

use App\Models\Back\DataSuspect_Model;

use Config\Services;

class Suspect extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Daftar Tersangka'

        ];
        return view('_back/_pages/_sitara/_suspect/suspect', $data);
        //
    }

    public function data()
    {
        $request = Services::request();
        $datamodel = new DataSuspect_Model($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];


                // if ($path == 'png') {
                //     $storeImage = "<img src=\"$url\" class=\"img-thumbnail\" width=\"50\" height=\"35\"/>";
                // } elseif ($path == 'jpg') {
                //     $storeImage = "<img src=\"$url\" class=\"img-thumbnail\" width=\"50\" height=\"35\"/>";
                // } elseif ($path == 'jpeg') {
                //     $storeImage = "<img src=\"$url\" class=\"img-thumbnail\" width=\"50\" height=\"35\"/>";
                // } else {
                //     $storeImage = $file;
                // }


                $btnEdit = "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->suspect_id . "')\">
                <i class=\"fa fa-tags\"></i>
            </button>";
                $btnView = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"view('" . $list->suspect_id . "')\">
				<i class=\"fas fa-eye\"></i>
            </button>";
                $btnRemove = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"remove('" . $list->suspect_id . "')\">
				<i class=\"fas fa-trash\"></i>
            </button>";

                $row[] = $no;
                $row[] = $list->suspect_nik;
                $row[] = $list->suspect_name;
                $row[] = $list->suspect_ttl;
                $row[] = $list->suspect_gender;
                // $row[] = $list->suspect_nationality;
                // $row[] = $list->suspect_religion;
                // $row[] = $list->suspect_profession;
                // $row[] = $list->suspect_education;
                $row[] = $list->suspect_address;
                // $row[] = $list->suspect_email;
                // $row[] = $list->suspect_phonenumber;
                $row[] = $btnEdit . "" . $btnView . "" . $btnRemove;
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
                'show_suspect' => $this->sspct->findAll()
            ];
            // var_dump($data);

            $msg = [
                'data' => view('_back/_pages/_sitara/_suspect/data_suspect', $data)
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
                'data' => view('_back/_pages/_sitara/_suspect/modal_create')
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
                // 'user_email' => [
                //     'label' => 'Email',
                //     'rules' => 'required|is_unique[tb_m_user.user_email]',
                //     'errors' => [
                //         'required' => '{field} tidak boleh kosong',
                //         'is_unique' => '{field} tidak boleh ada yang sama'
                //     ]
                // ],
                'suspect_nik' => [
                    'label' => 'NIK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_name' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_ttl' => [
                    'label' => 'TTL',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_gender' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_nationality' => [
                    'label' => 'Kebangsaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_religion' => [
                    'label' => 'Agama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_profession' => [
                    'label' => 'Pekerjaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_education' => [
                    'label' => 'Pendidikan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_address' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_phonenumber' => [
                    'label' => 'No HP',
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
                        'suspect_nik' => $validation->getError('suspect_nik'),
                        'suspect_name' => $validation->getError('suspect_name'),
                        'suspect_ttl' => $validation->getError('suspect_ttl'),
                        'suspect_gender' => $validation->getError('suspect_gender'),
                        'suspect_nationality' => $validation->getError('suspect_nationality'),
                        'suspect_religion' => $validation->getError('suspect_religion'),
                        'suspect_profession' => $validation->getError('suspect_profession'),
                        'suspect_education' => $validation->getError('suspect_education'),
                        'suspect_address' => $validation->getError('suspect_address'),
                        'suspect_phonenumber' => $validation->getError('suspect_phonenumber'),

                    ]
                ];
            } else {
                $save_data = [
                    'suspect_nik' => $this->request->getVar('suspect_nik'),
                    'suspect_name' => $this->request->getVar('suspect_name'),
                    'suspect_ttl' => $this->request->getVar('suspect_ttl'),
                    'suspect_gender' => $this->request->getVar('suspect_gender'),
                    'suspect_nationality' => $this->request->getVar('suspect_nationality'),
                    'suspect_religion' => $this->request->getVar('suspect_religion'),
                    'suspect_profession' => $this->request->getVar('suspect_profession'),
                    'suspect_education' => $this->request->getVar('suspect_education'),
                    'suspect_address' => $this->request->getVar('suspect_address'),
                    'suspect_email' => $this->request->getVar('suspect_email'),
                    'suspect_phonenumber' => $this->request->getVar('suspect_phonenumber'),
                ];
                // print_r($save_data);
                $this->sspct->insert($save_data);

                $msg = [
                    'success' => 'Data Tersangka Berhasil Tersimpan'
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

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'suspect_nik' => [
                    'label' => 'NIK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_name' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_ttl' => [
                    'label' => 'TTL',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_gender' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_nationality' => [
                    'label' => 'Kebangsaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_religion' => [
                    'label' => 'Agama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_profession' => [
                    'label' => 'Pekerjaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_education' => [
                    'label' => 'Pendidikan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_address' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'suspect_phonenumber' => [
                    'label' => 'No HP',
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
                        'suspect_nik' => $validation->getError('suspect_nik'),
                        'suspect_name' => $validation->getError('suspect_name'),
                        'suspect_ttl' => $validation->getError('suspect_ttl'),
                        'suspect_gender' => $validation->getError('suspect_gender'),
                        'suspect_nationality' => $validation->getError('suspect_nationality'),
                        'suspect_religion' => $validation->getError('suspect_religion'),
                        'suspect_profession' => $validation->getError('suspect_profession'),
                        'suspect_education' => $validation->getError('suspect_education'),
                        'suspect_address' => $validation->getError('suspect_address'),
                        'suspect_phonenumber' => $validation->getError('suspect_phonenumber'),
                    ]
                ];
            } else {
                $status = "New";
                $save_data = [
                    'suspect_nik' => $this->request->getVar('suspect_nik'),
                    'suspect_name' => $this->request->getVar('suspect_name'),
                    'suspect_ttl' => $this->request->getVar('suspect_ttl'),
                    'suspect_gender' => $this->request->getVar('suspect_gender'),
                    'suspect_nationality' => $this->request->getVar('suspect_nationality'),
                    'suspect_religion' => $this->request->getVar('suspect_religion'),
                    'suspect_profession' => $this->request->getVar('suspect_profession'),
                    'suspect_education' => $this->request->getVar('suspect_education'),
                    'suspect_address' => $this->request->getVar('suspect_address'),
                    'suspect_email' => $this->request->getVar('suspect_email'),
                    'suspect_phonenumber' => $this->request->getVar('suspect_phonenumber'),
                    'case_status' => $status,
                ];


                $suspect_id = $this->request->getVar('suspect_id');

                $this->sspct->update($suspect_id, $save_data);

                $msg = [
                    'success' => 'Data Tersangka Berhasil di Perbarui'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Permintaan Anda Tidak Dapat di Proses');
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id_suspect = $this->request->getVar('id_suspect');

            $row = $this->sspct->search_id($id_suspect);

            $data = [
                'suspect_id' => $row['suspect_id'],
                'suspect_nik' => $row['suspect_nik'],
                'suspect_name' => $row['suspect_name'],
                'suspect_ttl' => $row['suspect_ttl'],
                'suspect_gender' => $row['suspect_gender'],
                'suspect_nationality' => $row['suspect_nationality'],
                'suspect_religion' => $row['suspect_religion'],
                'suspect_profession' => $row['suspect_profession'],
                'suspect_education' => $row['suspect_education'],
                'suspect_address' => $row['suspect_address'],
                'suspect_email' => $row['suspect_email'],
                'suspect_phonenumber' => $row['suspect_phonenumber'],

            ];

            $msg = [
                'success' => view('_back/_pages/_sitara/_suspect/modal_edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function view()
    {
        if ($this->request->isAJAX()) {
            $report_id = $this->request->getVar('report_id');

            $row = $this->rprtr->find($report_id);

            $data = [
                'report_id' => $row['report_id'],
                'reporter_fullname' => $row['reporter_fullname'],
                'reporter_nik' => $row['reporter_nik'],
                'reporter_address' => $row['reporter_address'],
                'reporter_email' => $row['reporter_email'],
                'reporter_phonenumber' => $row['reporter_phonenumber'],
            ];

            $msg = [
                'success' => view('_back/_pages/_wbs/modal_view', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function remove()
    {
        if ($this->request->isAJAX()) {

            $id_suspect = $this->request->getVar('id_suspect');

            $this->sspct->delete($id_suspect);

            $msg = [
                'success' => 'Data Tersangka berhasil dihapus'
            ];
        }
        echo json_encode($msg);
    }


    public function count_pengaduan()
    {
        if ($this->request->isAJAX()) {
            $data = $this->wbs->count_all();

            $msg = [
                'success' => $data,
            ];

            echo json_encode($msg);
        }
    }

    public function count_diproses()
    {
        if ($this->request->isAJAX()) {
            $data = $this->wbs->count_process();

            $msg = [
                'success' => $data,
            ];

            echo json_encode($msg);
        }
    }

    public function count_selesai()
    {
        if ($this->request->isAJAX()) {
            $data = $this->wbs->count_done();

            $msg = [
                'success' => $data,
            ];

            echo json_encode($msg);
        }
    }
}
