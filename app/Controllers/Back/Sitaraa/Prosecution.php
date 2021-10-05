<?php

namespace App\Controllers\Back\Sitaraa;

use App\Controllers\BaseController;

use App\Models\Back\DataProsecution_Model;

use Config\Services;

class Prosecution extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Daftar Tersangka Penuntutan'

        ];
        return view('_back/_pages/_sitara/_prosecution/prosecution', $data);
        //
    }
    public function data()
    {
        $request = Services::request();
        $datamodel = new DataProsecution_Model($request);
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

                $url = site_url('Back/Sitaraa/Sidang?suspect_id=' . $list->suspect_id  . '');

                // $btnNext = "<a href=\"$url\" type=\"button\" class=\"btn btn-primary btn-sm\"><i class=\"fa fa-arrow-right\"></i>";


                $btnAdd = "<button type=\"button\" class=\"btn btn-primary btn-sm\" onclick=\"add('" . $list->suspect_id . "')\">
                <i class=\"fa fa-plus\"></i>
            </button>";

                $btnNext = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"next('" . $list->suspect_id . "')\">
                <i class=\"fa fa-arrow-right\"></i>
            </button>";

                $id_trial = "<span class=\"badge bg-warning\">$list->trial_nomor</span>";

                $row[] = $no;
                $row[] = $list->suspect_nik;
                $row[] = $list->suspect_name;
                $row[] = $list->suspect_ttl;
                $row[] = $list->suspect_gender;
                $row[] = $list->suspect_address;
                $row[] = $id_trial;
                $row[] = $btnAdd;
                $row[] = $btnNext;
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
                'data' => view('_back/_pages/_sitara/_prosecution/data_prosecution', $data)
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
                'case_nomor' => [
                    'label' => 'Nomor Perkara',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'case_date' => [
                    'label' => 'Tanggal Perkara',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'start_investigation' => [
                    'label' => 'SPDP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'allegation' => [
                    'label' => 'Tuduhan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'stage_one' => [
                    'label' => 'Tahap 1',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'stage_two' => [
                    'label' => 'Tahap 2',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'public_prosecutor' => [
                    'label' => 'JPU',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'indictment_article' => [
                    'label' => 'Pasal Sangkaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'demans' => [
                    'label' => 'Tuntutan',
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
                        'case_nomor' => $validation->getError('case_nomor'),
                        'case_date' => $validation->getError('case_date'),
                        'start_investigation' => $validation->getError('start_investigation'),
                        'allegation' => $validation->getError('allegation'),
                        'stage_one' => $validation->getError('stage_one'),
                        'stage_two' => $validation->getError('stage_two'),
                        'public_prosecutor' => $validation->getError('public_prosecutor'),
                        'indictment_article' => $validation->getError('indictment_article'),
                        'demans' => $validation->getError('demans'),


                    ]
                ];
            } else {
                $status = 'Pra Penuntutan';
                $nomor = $this->request->getVar('case_nomor');
                $date =  $this->request->getVar('case_date');

                $save_data_id = [
                    'case_id' => $nomor . '/' . $date,
                    'case_status' => $status,
                ];
                $save_data = [
                    'id_case' => $nomor . '/' . $date,
                    'start_investigation' => $this->request->getVar('start_investigation'),
                    'allegation' => $this->request->getVar('allegation'),
                    'stage_one' => $this->request->getVar('stage_one'),
                    'stage_two' => $this->request->getVar('stage_two'),
                    'public_prosecutor' => $this->request->getVar('public_prosecutor'),
                    'indictment_article' => $this->request->getVar('indictment_article'),
                    'demans' => $this->request->getVar('demans'),
                ];

                $id = $this->request->getVar('suspect_id');

                $this->sspct->update($id, $save_data_id);

                $this->csdet->insert($save_data);

                $msg = [
                    'success' => 'Data Tersangka Berhasil Tersimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }

    public function save_data_trial()
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
                'trial_date' => [
                    'label' => 'Tanggal Sidang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'trial_agenda' => [
                    'label' => 'Agenda Sidang',
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
                        'trial_date' => $validation->getError('trial_date'),
                        'trial_agenda' => $validation->getError('trial_agenda'),

                    ]
                ];
            } else {
                $nomor = $this->request->getVar('trial_nomor');

                $save_data = [
                    'trial_id' => $this->request->getVar('id_trial'),
                    'trial_nomor' => $this->request->getVar('trial_no'),
                    'trial_date' => $this->request->getVar('trial_date'),
                    'trial_agenda' => $this->request->getVar('trial_agenda'),

                ];
                $save_data_trial = [
                    'trial_nomor' => $this->request->getVar('trial_no'),
                ];

                $id = $this->request->getVar('suspect_id');

                $this->sspct->update($id, $save_data_trial);

                $this->trial->insert($save_data);

                $msg = [
                    'success' => 'Data Sidang Berhasil Tersimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }

    public function add()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_suspect');

            $row = $this->sspct->search_id($id);

            $data = [
                'id_suspect' => $row['suspect_id'],
                'id_trial' => $row['id_trial'],
                'trial_nomor' => $row['trial_nomor'],
            ];

            $msg = [
                'success' => view('_back/_pages/_sitara/_prosecution/modal_add_trial', $data)
            ];
        }
        echo json_encode($msg);
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id_suspect = $this->request->getVar('id_suspect');

            $row = $this->sspct->search_id($id_suspect);
            // var_dump($row);
            // die();

            $data = [
                'suspect_id' => $row['suspect_id'],
                'start_investigation' => $row['start_investigation'],
                'allegation' => $row['allegation'],
                'stage_one' => $row['stage_one'],
                'stage_two' => $row['stage_two'],
                'public_prosecutor' => $row['public_prosecutor'],
                'indictment_article' => $row['indictment_article'],
                'demans' => $row['demans'],
            ];

            $msg = [
                'success' => view('_back/_pages/_sitara/_prosecution/modal_process', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function next()
    {
        if ($this->request->isAJAX()) {

            $status = 'Penuntutan';

            $id = $this->request->getVar('id_suspect');

            $save_data_id = [
                'case_status' => $status,
            ];

            $this->sspct->update($id, $save_data_id);


            $msg = [
                'success' => 'Data berhasil disimpan'
            ];
        }
        echo json_encode($msg);
    }
}
