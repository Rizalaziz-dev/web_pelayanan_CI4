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
		$data = [
			'tittle' => 'Yankum'

		];
		return view('_back/_pages/_yankum/yankum', $data);
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

				$file = $list->attachment;
				$path = pathinfo($file, PATHINFO_EXTENSION);
				$url = base_url('assets/uploads/file/' . $file . '');

				$download = base_url('Back/Yankum/download/' . $list->id_report . '');

				if ($path == 'png') {
					$storeImage = "<img src=\"$url\" class=\"img-thumbnail\" width=\"50\" height=\"35\"/>";
				} elseif ($path == 'jpg') {
					$storeImage = "<img src=\"$url\" class=\"img-thumbnail\" width=\"50\" height=\"35\"/>";
				} elseif ($path == 'jpeg') {
					$storeImage = "<img src=\"$url\" class=\"img-thumbnail\" width=\"50\" height=\"35\"/>";
				} else {
					$storeImage = $file;
				}


				$btnEdit = "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id_report . "')\">
                <i class=\"fa fa-tags\"></i>
            </button>";
				$btnRemove = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"view('" . $list->id_report . "')\">
				<i class=\"fas fa-eye\"></i>
            </button>";
				// $storeImage = "<img src=\"$url\" classs=\"img-thumbnail\" width=\"50\" height=\"35\"/>";

				$btnDownload = "<a href=\"$download\" type=\"button\" class=\"btn btn-primary btn-sm\"><i class=\"fa fa-download\"></i>";


				// if ($list->status == 'Diterima') {
				// 	$status = "<span class=\"badge bg-secondary\">$list->status</span>";
				// } else if ($list->status == 'Selesai') {
				// 	$status = "<span class=\"badge bg-success\">$list->status</span>";
				// } else if ($list->status == 'Diproses') {
				// 	$status = "<span class=\"badge bg-warning\">$list->status</span>";
				// } else {
				// 	$status = "<span class=\"badge bg-danger\">$list->status</span>";
				// }

				$row[] = $no;
				$row[] = $list->report_id;
				$row[] = $list->reporter_fullname;
				$row[] = $list->question_type;
				$row[] = $list->question_subject;
				$row[] = $list->question_detail;
				$row[] = $btnDownload;
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

	public function count_pengaduan()
	{
		if ($this->request->isAJAX()) {
			$data = $this->yankum->count_all();

			$msg = [
				'success' => $data,
			];

			echo json_encode($msg);
		}
	}

	public function count_diproses()
	{
		if ($this->request->isAJAX()) {
			$data = $this->tpkr->count_process();

			$msg = [
				'success' => $data,
			];

			echo json_encode($msg);
		}
	}

	public function count_selesai()
	{
		if ($this->request->isAJAX()) {
			$data = $this->tpkr->count_done();

			$msg = [
				'success' => $data,
			];

			echo json_encode($msg);
		}
	}

	public function download($id)
	{
		$row = $this->yankum->search_file($id);

		$url = $row->attachment;

		// $file = base_url('assets/uploads/file/' . $url . '', null);

		return $this->response->download('assets/uploads/file/' . $url . '', null);
	}
}
