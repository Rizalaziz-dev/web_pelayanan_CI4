<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class YankumFilters implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $akses = session('nama_level');
        if ($akses == 'Datun') {
            return redirect()->to('/Back/YankumDashboard');
        }
    }
}
