<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;

class WbsReport extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Report'

        ];
        return view('_back/_pages/_wbs/_report/report', $data);
        //
    }
}
