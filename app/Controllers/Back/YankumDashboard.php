<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;

class YankumDashboard extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Dashboard'

        ];
        return view('_back/_pages/_yankum/_dashboard/dashboard', $data);
        //
    }
}
