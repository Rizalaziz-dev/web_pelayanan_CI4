<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class TipikorFilters implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('login')) {
            return redirect()->to('/Back/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session('nama_level' == 'Pidsus')) {
            return redirect()->to('/Back/TipikorDashboard');
        }
    }
}
