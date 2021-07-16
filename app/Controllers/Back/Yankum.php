<?php

/**
 * Lankum
 *
 * Lankum_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 28, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Controllers\Back;

use App\Controllers\BaseController;

use App\Models\Back\DataYankum_Model;

use Config\Services;

class Yankum extends BaseController
{
	public function index()
	{
		return view('_back/_pages/_yankum/yankum');
	}

	public function data()
	{
		$request = Services::request();
		$datamodel = new DataYankum_Model($request);
		if ($request->getMethod(true) == 'POST') {
			$lists = $datamodel->get_datatables();
			$data = [];
			$no = $request->getPost("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];

				$url = base_url($list->attachment);


				$btnEdit = "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->report_id . "')\">
                <i class=\"fa fa-tags\"></i>
            </button>";
				$btnRemove = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"edit('" . $list->report_id . "')\">
                <i class=\"fa fa-trash\"></i>
            </button>";

				$storeImage = "<img src=\"$url\" classs=\"img-thumbnail\" width=\"50\" height=\"35\"/>";


				$row[] = $no;
				$row[] = $list->report_id;
				$row[] = $list->reporter_fullname;
				$row[] = $list->question_type;
				$row[] = $list->question_subject;
				$row[] = $list->question_detail;
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
				'show_yankum' => $this->yankum->findAll()
			];

			$msg = [
				'data' => view('_back/_pages/_yankum/data_yankum', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Page Not Found');
		}
	}
}
