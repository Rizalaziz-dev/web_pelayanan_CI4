<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;

class WbsDashboard extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Dashboard'

        ];
        return view('_back/_pages/_wbs/_dashboard/dashboard', $data);
        //
    }
}
