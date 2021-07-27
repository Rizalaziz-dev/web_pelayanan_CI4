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
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Controllers\Back;

use App\Controllers\BaseController;

use Pusher\Pusher;

use App\Models\Back\DataSitara_Model;

use Config\Services;

class Sitara extends BaseController
{
	public function index()
	{
		$data = [
			'tittle' => 'Sitara'

		];
		return view('_back/_pages/_sitara/sitara', $data);
	}

	public function data()
	{
		$request = Services::request();
		$datamodel = new DataSitara_Model($request);
		if ($request->getMethod(true) == 'POST') {
			$lists = $datamodel->get_datatables();
			$data = [];
			$no = $request->getPost("start");
			foreach ($lists as $list) {
				$no++;
				$row = [];

				$btnEdit = "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->case_id . "')\">
                <i class=\"fa fa-tags\"></i>
            </button>";
				$btnRemove = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"edit('" . $list->case_id . "')\">
                <i class=\"fa fa-trash\"></i>
            </button>";

				$row[] = $no;
				$row[] = $list->case_id;
				$row[] = $list->suspect_name;
				// $row[] = $list->decision_id;
				$row[] = $list->start_investigation;
				$row[] = $list->allegation;
				$row[] = $list->stage_one;
				$row[] = $list->public_prosecutor;
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

	public function form_create()
	{
		if ($this->request->isAJAX()) {
			$msg = [
				'data' => view('_back/_pages/_sitara/modal_create')
			];

			echo json_encode($msg);
		} else {
			exit('Page Not Found');
		}
	}

	public function get_data()
	{
		if ($this->request->isAJAX()) {
			$data = [
				'show_sitara' => $this->case->findAll()
			];

			$msg = [
				'data' => view('_back/_pages/_sitara/data_sitara', $data)
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
				'case_nomor' => [
					'label' => 'Case Nomor',
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
					]
				];
			} else {

				$case_nomor = $this->request->getVar('case_nomor');
				$case_date = $this->request->getVar('case_date');
				$decision_nomor = $this->request->getVar('decision_nomor');
				$case_id = $case_nomor . '/' . $case_date;

				$save_data_case = [
					'case_id' => $case_id,
					'decision_id' => $decision_nomor
				];
				$save_data_case_detail = [
					'id_case' => $case_id,
					'start_investigation' => $this->request->getVar('start_investigation'),
					'case_position' => $this->request->getVar('case_position'),
					'allegation' => $this->request->getVar('allegation'),
					'stage_one' => $this->request->getVar('stage_one'),
					'stage_two' => $this->request->getVar('stage_two'),
					'public_prosecutor' => $this->request->getVar('public_prosecutor'),
					'indictment_article' => $this->request->getVar('indictment_article'),
					'indictment' => $this->request->getVar('indictment'),
					'demans' => $this->request->getVar('demans'),
					'case_status' => $this->request->getVar('case_status'),
				];
				$save_data_suspect = [
					'id_case' => $case_id,
					'suspect_nik' => $this->request->getVar('suspect_nik'),
					'suspect_name' => $this->request->getVar('suspect_name'),
					'suspect_ttl' => $this->request->getVar('suspect_ttl'),
					'suspect_gender' => $this->request->getVar('suspect_gender'),
					'suspect_nationality' => $this->request->getVar('suspect_nationality'),
					'suspect_religion' => $this->request->getVar('suspect_religion'),
					'suspect_profession' => $this->request->getVar('suspect_profession'),
					'suspect_address' => $this->request->getVar('suspect_address'),
					'suspect_email' => $this->request->getVar('suspect_email'),
					'suspect_phonenummber' => $this->request->getVar('suspect_phonenummber')
				];
				$save_data_decision = [
					'decision_nomor' => $decision_nomor,
					'decision_date' => $this->request->getVar('decision_date'),
					'decision_pn' => $this->request->getVar('decision_pn'),
					'decision_appeal' => $this->request->getVar('decision_appeal'),
					'decision_cassation' => $this->request->getVar('decision_cassation'),
					'decision_execution' => $this->request->getVar('decision_execution')
				];

				$this->case->insert($save_data_case);
				$this->csdet->insert($save_data_case_detail);
				$this->sspct->insert($save_data_suspect);
				$this->dcsn->insert($save_data_decision);

				$msg = [
					'success' => 'Data Sitara Berhasil Terkirim'
				];
			}

			echo json_encode($msg);
		} else {
			exit('Page Not Found');
		}
	}
}
