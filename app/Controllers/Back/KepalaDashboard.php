<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Dashboard'

        ];
        return view('_back/_pages/_kepala/_dashboard/dashboard', $data);
        //
    }
}
