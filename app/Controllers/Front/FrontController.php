<?php

/**
 * FrontController
 *
 * FrontController_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 21, 2021
 * @reference   https://bootstrapmade.com/demo/OnePage/      
 */

namespace App\Controllers\Front;

use App\Controllers\BaseController;

class FrontController extends BaseController
{
    public function index()
    {
        return view('_front/welcome_page');
    }
}
