<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [
			'tittle' => 'Dashboard'

		];
		return view('_back/_pages/_dashboard/dashboard', $data);
		//
	}
}
