<?php

/**
 * Tipikor
 *
 * Tipikor_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 28, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Controllers\Back;

use App\Controllers\BaseController;

use App\Models\Back\DataTipikor_Model;

use Config\Services;


class Tipikor extends BaseController
{
	public function index()
	{


		// $url = 'http://localhost:8080/assets/image/lampiran/KOR-20210806-0001.zip';
		// return $this->response->download($url, null);
		$data = [
			'tittle' => 'Tipikor'


		];
		return view('_back/_pages/_tipikor/tipikor', $data);
	}

	public function data()
	{
		$request = Services::request();
		$datamodel = new DataTipikor_Model($request);
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
				$btnRemove = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"view('" . $list->id_report . "')\">
				<i class=\"fas fa-eye\"></i>
            </button>";


				$storeImage = "<img src=\"$url\" classs=\"img-thumbnail\" width=\"50\" height=\"35\"/>";

				if ($list->status == 'Diterima') {
					$status = "<span class=\"badge bg-secondary\">$list->status</span>";
				} else if ($list->status == 'Selesai') {
					$status = "<span class=\"badge bg-success\">$list->status</span>";
				} else if ($list->status == 'Diproses') {
					$status = "<span class=\"badge bg-warning\">$list->status</span>";
				} else {
					$status = "<span class=\"badge bg-danger\">$list->status</span>";
				}
				$row[] = $no;
				$row[] = $list->id_report;
				$row[] = $list->reporter_fullname;
				$row[] = $list->subject;
				$row[] = $list->occurre_time;
				$row[] = $list->crime_scene;
				$row[] = $list->report_detail;
				// $row[] = $storeImage;
				$row[] = $status;
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
				'show_tipikor' => $this->tpkr->findAll()
			];
			// var_dump($data);

			$msg = [
				'data' => view('_back/_pages/_tipikor/data_tipikor', $data)
			];

			echo json_encode($msg);
		} else {
			exit('Page Not Found');
		}
	}

	public function update_data()
	{
		if ($this->request->isAJAX()) {
			$save_data = [
				'status' => $this->request->getVar('status'),
			];

			$save_data_status = [
				'status' => $this->request->getVar('status'),
				'tokens' => $this->request->getVar('token'),
			];

			$this->status->insert($save_data_status);

			// var_dump($save_data);
			// die();

			$tipikor_id = $this->request->getVar('tipikor_id');


			$this->tpkr->update($tipikor_id, $save_data);

			$msg = [
				'success' => 'Status Laporan Berhasil di Perbarui'
			];
			echo json_encode($msg);
		} else {
			exit('Maaf Permintaan Anda Tidak Dapat di Proses');
		}
	}

	public function edit()
	{
		if ($this->request->isAJAX()) {

			$report_id = $this->request->getVar('report_id');

			$row = $this->tpkr->search_id($report_id);

			$data = [
				'tipikor_id' => $row['tipikor_id'],
				'id_report' => $row['id_report'],
				'subject' => $row['subject'],
				'occurre_time' => $row['occurre_time'],
				'crime_scene' => $row['crime_scene'],
				'report_detail' => $row['report_detail'],
				'attachment' => $row['attachment'],
				'status' => $row['status'],
				'token' => $row['token'],
			];

			$msg = [
				'success' => view('_back/_pages/_tipikor/modal_edit', $data)
			];
			echo json_encode($msg);
		}
	}

	public function view()
	{
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

		// var_dump($data);

		$msg = [
			'success' => view('_back/_pages/_tipikor/modal_view', $data)
		];
		echo json_encode($msg);
	}


	public function count_pengaduan()
	{
		if ($this->request->isAJAX()) {
			$data = $this->tpkr->count_all();

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

	public function download()
	{
		if ($this->request->isAJAX()) {
			$tipikor_id = $this->request->getVar('tipikor_id');

			$row = $this->tpkr->search_file($tipikor_id);

			// var_dump($row);
			// die();
			// $file = $row['attachment'];

			// $data2 = [
			// 	'attachment' => $row['attachment'],
			// ];

			$url = base_url($row->attachment);

			// var_dump($url);
			// die();

			// force_download($url, null);

			$data = $this->response->download($url, null);

			$msg = [
				'success' => $data,
			];

			echo json_encode($msg);
		}
	}
}
