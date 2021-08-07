<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;

class TipikorDashboard extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Dashboard'

        ];
        return view('_back/_pages/_tipikor/_dashboard/dashboard', $data);
        //
    }
}
