<?php

/**
 * Login
 *
 * Login_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 20, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Back;

use CodeIgniter\Model;

class Login_Model extends Model
{

    protected function get_user()
    {
        $this->table = 'tb_m_user';
        $this->user_email = 'user_email';
    }
}
