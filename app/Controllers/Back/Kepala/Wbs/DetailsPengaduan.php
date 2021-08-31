<?php

namespace App\Controllers\Back\Kepala\Wbs;

use App\Controllers\BaseController;

use App\Models\Back\DataWbs_Model;

use Config\Services;

class DetailsPengaduan extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Detail Pengaduan'

        ];
        return view('_back/_pages/_kepala/_wbs/detailpengaduan', $data);
        //
    }

    public function data_wbs()
    {
        $request = Services::request();
        $datamodel = new DataWbs_Model($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $row[] = $no;
                $row[] = $list->id_report;
                $row[] = $list->reporter_fullname;
                $row[] = $list->employee_name;
                $row[] = $list->violation_type;
                $row[] = $list->occurre_time;
                $row[] = $list->crime_scene;
                $row[] = $list->report_detail;
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
}
