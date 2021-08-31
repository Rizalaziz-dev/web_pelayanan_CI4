<?php

namespace App\Controllers\Back\Kepala\Wbs;

use App\Controllers\BaseController;

use App\Models\Back\Kepala\Wbs\Selesai_Models;

use Config\Services;

class DetailsSelesai extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Detail Selesai'

        ];
        return view('_back/_pages/_kepala/_wbs/detailSelesai', $data);
        //
    }

    public function data_wbs()
    {
        $request = Services::request();
        $datamodel = new Selesai_Models($request);
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
