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

use function PHPUnit\Framework\returnSelf;

class Tipikor extends BaseController
{
	public function index()
	{


		// $url = 'http://localhost:8080/assets/image/lampiran/KOR-20210806-0001.zip';
		// return $this->response->download($url, null);
		$data = [
			'tittle' => 'Master Pengaduan'


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


				$file = $list->attachment;
				$path = pathinfo($file, PATHINFO_EXTENSION);
				$url = base_url('assets/uploads/file/' . $file . '');

				$download = base_url('Back/Tipikor/download/' . $list->id_report . '');

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
				$row[] = $btnDownload;
				$row[] = $storeImage;
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

			$validation = \Config\Services::validation();
			$valid = $this->validate([
				'status' => [
					'label' => 'Status ',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} tidak boleh kosong',
						'is_unique' => '{field} tidak boleh ada yang sama'
					]
				],
				'note' => [
					'label' => 'Status ',
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
						'status' => $validation->getError('status'),
						'note' => $validation->getError('note')
					]
				];
			} else {
				$save_data = [
					'status' => $this->request->getVar('status'),
				];

				$save_data_status = [
					'status' => $this->request->getVar('status'),
					'tokens' => $this->request->getVar('token'),
					'note' => $this->request->getVar('note'),
				];

				$this->status->insert($save_data_status);

				// var_dump($save_data);
				// die();

				$tipikor_id = $this->request->getVar('tipikor_id');


				$this->tpkr->update($tipikor_id, $save_data);

				$msg = [
					'success' => 'Status Laporan Berhasil di Perbarui'
				];
			}
			// var_dump($msg);
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

			// var_dump($data);

			$msg = [
				'success' => view('_back/_pages/_tipikor/modal_view', $data)
			];
			echo json_encode($msg);
		}
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

	public function download($id)
	{
		// if ($this->request->isAJAX()) {

		// $tipikor_id = $this->request->getVar('report_id');

		$row = $this->tpkr->search_file($id);

		// var_dump($row);

		// $file = $row['attachment'];

		// $data2 = [
		// 	'attachment' => $row['attachment'],
		// ];

		$url = $row->attachment;


		// var_dump($url);
		// die();

		// force_download($url, null);
		// $file = $this->response->download(base_url('assets/uploads/file/' . $url . '', null));
		$file = base_url('assets/uploads/file/' . $url . '', null);
		var_dump($file);

		// $data = [
		// 	'file' => $file
		// ];

		// $this->response->download(base_url('assets/uploads/file/' . $url . '', null));
		// var_dump($data);
		// die();


		return $this->response->download('assets/uploads/file/' . $url . '', null);

		// 	$msg = [
		// 		'success' => $data
		// 	];

		// 	echo json_encode($msg);
		// }
	}
}
