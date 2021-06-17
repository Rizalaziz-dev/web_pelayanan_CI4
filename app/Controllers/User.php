<?php 


/**
 * User
 *
 * User_Controller scripts
 *
 * @package     Website Pelayanan
 * @category    Controller
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Controllers;

use App\Models\User_model;




class User extends BaseController
{

    public function index()
    {
        $page_tittle = [
            'tittle' => 'Master User'
        ];



        return view('_pages/user');
    }

    public function get_data()
    {
        
        if ($this->request->isAJAX()) {
            $user = new User_model();
            $data = [
                'show_user' => $user->findAll()
            ];
        }
    }




}
