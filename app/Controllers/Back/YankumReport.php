<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;

class YankumReport extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Report'

        ];
        return view('_back/_pages/_yankum/_report/report', $data);
        //
    }
}
