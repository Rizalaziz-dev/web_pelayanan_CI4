<?php

/**
 * Lankum
 *
 * Lankum_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 28, 2021
 * @reference   https://bootstrapmade.com/demo/OnePage/
 */


namespace App\Controllers\Front;

use App\Controllers\BaseController;


class Lankum extends BaseController
{
    public function index()
    {
        return view('_front/_pages/_lankum/lankum');
    }
}
