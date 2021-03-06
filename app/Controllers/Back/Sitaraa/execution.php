<?php

namespace App\Controllers\Back\Sitaraa;

use App\Controllers\BaseController;

use App\Models\Back\DataExecution_Model;

use Config\Services;

class Execution extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Daftar Tersangka Eksekusi'

        ];
        return view('_back/_pages/_sitara/_execution/execution', $data);
        //
    }
    public function data()
    {
        $request = Services::request();
        $datamodel = new DataExecution_Model($request);
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

                $btnEdit = "<button type=\"button\" class=\"btn btn-primary btn-sm\" onclick=\"edit('" . $list->suspect_id . "')\">
                <i class=\"fa fa-tags\"></i>
            </button>";
                $btnNext = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"edit('" . $list->suspect_id . "')\">
                <i class=\"fa fa-check\"></i>
            </button>";

                $row[] = $no;
                $row[] = $list->suspect_nik;
                $row[] = $list->suspect_name;
                $row[] = $list->suspect_ttl;
                $row[] = $list->suspect_gender;
                $row[] = $list->suspect_address;
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
                'data' => view('_back/_pages/_sitara/_execution/data_execution', $data)
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
                'decision_nomor' => [
                    'label' => 'Nomor Putusan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'decision_date' => [
                    'label' => 'Tanggal Putusan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama'
                    ]
                ],
                'decision_pn' => [
                    'label' => 'Detail Putusan',
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
                        'decision_nomor' => $validation->getError('decision_nomor'),
                        'decision_date' => $validation->getError('decision_date'),
                        'decision_pn' => $validation->getError('decision_pn'),
                    ]
                ];
            } else {
                $status = 'Kekuatan Hukum Tetap';

                $nomor = $this->request->getVar('decision_nomor');

                $save_data_status = [
                    'case_status' => $status,
                    'decision_id' => $nomor,

                ];


                $save_data = [

                    'decision_nomor' => $nomor,
                    'decision_date' => $this->request->getVar('decision_date'),
                    'decision_pn' => $this->request->getVar('decision_pn'),

                ];

                // $save_data_idTrial = [
                //     'trial_id' => $id_trial,
                // ];
                // $this->trial->insert($save_data_idTrial);

                $id = $this->request->getVar('suspect_id');

                $this->sspct->update($id, $save_data_status);

                $this->dcsn->insert($save_data);

                $msg = [
                    'success' => 'Data Tersangka Berhasil Tersimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id_suspect = $this->request->getVar('id_suspect');

            $row = $this->sspct->search_id($id_suspect);

            $data = [
                'suspect_id' => $row['suspect_id'],
                // 'start_investigation' => $row['start_investigation'],
                // 'allegation' => $row['allegation'],
                // 'stage_one' => $row['stage_one'],
                // 'stage_two' => $row['stage_two'],
                // 'public_prosecutor' => $row['public_prosecutor'],
                // 'indictment_article' => $row['indictment_article'],
                // 'demans' => $row['demans'],
            ];

            $msg = [
                'success' => view('_back/_pages/_sitara/_execution/modal_process', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function next()
    {
        if ($this->request->isAJAX()) {

            $status = 'Pra Penuntutan';

            $id = $this->request->getVar('suspect_id');

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
