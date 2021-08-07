<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class TipikorFilters implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $akses = session('nama_level');
        if ($akses == 'Pidsus') {
            return redirect()->to('/Back/TipikorDashboard');
        }
    }
}
