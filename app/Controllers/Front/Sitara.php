<?php

/**
 * Sitara
 *
 * Sitara_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 21, 2021
 * @reference   https://bootstrapmade.com/demo/templates/OnePage/
 */

namespace App\Controllers\Front;

use App\Controllers\BaseController;

class Sitara extends BaseController
{
    public function index()
    {
        return view('_front/_pages/_sitara/sitara');
    }
}
