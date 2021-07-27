<?php

/**
 * Wbs
 *
 * Wbs_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 28, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Controllers\Back;

use App\Controllers\BaseController;

use App\Models\Back\DataWbs_Model;

use Config\Services;

class Wbs extends BaseController
{
	public function index()
	{
		$data = [
			'tittle' => 'Wbs'

		];
		return view('_back/_pages/_wbs/wbs', $data);
	}

	public function data()
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

				$url = base_url($list->attachment);

				$btnEdit = "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id_report . "')\">
                <i class=\"fa fa-tags\"></i>
            </button>";
				$btnRemove = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"edit('" . $list->id_report . "')\">
                <i class=\"fa fa-trash\"></i>
            </button>";

				$storeImage = "<img src=\"$url\" classs=\"img-thumbnail\" width=\"50\" height=\"35\"/>";

				$row[] = $no;
				$row[] = $list->id_report;
				$row[] = $list->reporter_fullname;
				$row[] = $list->employee_name;
				$row[] = $list->violation_type;
				$row[] = $list->occurre_time;
				$row[] = $list->crime_scene;
				$row[] = $list->report_detail;
				$row[] = $storeImage;
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
				'show_wbs' => $this->wbs->findAll()
			];

			$msg = [
				'data' => view('_back/_pages/_wbs/data_wbs', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Page Not Found');
		}
	}
}
