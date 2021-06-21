<?php

/**
 * Login
 *
 * Login_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 20, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Controllers\Back;

use App\Controllers\BaseController;

class Login extends BaseController
{

    public function index()
    {
        return view('_back/_login/index');
    }

    public function check()
    {
        $user_email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $this->Login->get_user($user_email);

        $result = [
            'status' => false,
            'message' => 'invalid Login',
            'data' => []

        ];
    }
}
