<?php

namespace App\Controllers\Back\Sitaraa;

use App\Controllers\BaseController;

use App\Models\Back\Sitara\Suspect_Model;

use Config\Services;

class Prosecution extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Daftar Tersangka'

        ];
        return view('_back/_pages/_sitara/_prosecution/prosecution', $data);
        //
    }
}
