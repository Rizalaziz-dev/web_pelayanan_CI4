<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;

class TipikorReport extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Report'

        ];
        return view('_back/_pages/_tipikor/_report/report', $data);
        //
    }
}
