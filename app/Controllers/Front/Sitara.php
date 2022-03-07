<?php

/**
 * Sitara
 *
 * Sitara_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 21, 2021
 * @reference   https://bootstrapmade.com/demo/templates/OnePage/
 */

namespace App\Controllers\Front;

use App\Controllers\BaseController;

use App\Models\Front\Sitara_Model;

use Config\Services;


class Sitara extends BaseController
{
    public function index()
    {
        return view('_front/_pages/_sitara/sitara');
    }

    public function data()
    {
        $request = Services::request();
        $datamodel = new Sitara_Model($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];


                $name = "<h5><strong>$list->suspect_name</strong></h5>";

                $btnDetails = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"view('" . $list->id_trial . "')\">
				<i class=\"fas fa-eye\"></i>
            </button>";

                $row[] = $no;
                $row[] = $list->suspect_nik;
                $row[] = $list->id_case;
                $row[] = $name . " " . $list->suspect_ttl . " " . $list->suspect_address;
                $row[] = $list->indictment_article;
                $row[] = $list->case_status;
                $row[] = $btnDetails;
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                // "recordsTotal" => $datamodel->count_all(),
                // "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }

    public function get_data()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'sitara_search' => [
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
                        'sitara_search' => $validation->getError('sitara_search'),

                    ]
                ];
            } else {

                $name = $this->request->getVar('wbs_search');

                $msg = $this->sspct->find($name);

                // var_dump($msg);
            }
            echo json_encode($msg);
        } else {
            exit('Page Not Found');
        }
    }
}
