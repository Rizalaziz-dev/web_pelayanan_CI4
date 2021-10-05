<?php

namespace App\Controllers\Back\Sitaraa;

use App\Controllers\BaseController;

use Config\Services;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Dashboard'

        ];
        return view('_back/_pages/_sitara/_dashboard/dashboard', $data);
        //
    }

    public function count_dataTersangka()
    {
        if ($this->request->isAJAX()) {
            $data = $this->sspct->count_all();

            $msg = [
                'success' => $data,
            ];

            echo json_encode($msg);
        }
    }

    public function count_dataPraPenuntutan()
    {
        if ($this->request->isAJAX()) {
            $data = $this->sspct->count_prePro();

            $msg = [
                'success' => $data,
            ];

            echo json_encode($msg);
        }
    }

    public function count_dataPenuntutan()
    {
        if ($this->request->isAJAX()) {
            $data = $this->sspct->count_pro();

            $msg = [
                'success' => $data,
            ];

            echo json_encode($msg);
        }
    }

    public function count_dataEksekusi()
    {
        if ($this->request->isAJAX()) {
            $data = $this->sspct->count_execution();

            $msg = [
                'success' => $data,
            ];

            echo json_encode($msg);
        }
    }

    public function count_done()
    {
        if ($this->request->isAJAX()) {
            $data = $this->sspct->count_done();

            $msg = [
                'success' => $data,
            ];

            echo json_encode($msg);
        }
    }
}
