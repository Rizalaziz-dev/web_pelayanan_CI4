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

use CodeIgniter\HTTP\RequestInterface;

use CodeIgniter\Model;

class Login_Model extends Model
{
    protected $table      = 'tb_m_user';
    protected $primaryKey = 'user_email';

    protected $allowedFields = ['user_email', 'user_level', 'user_password'];
    protected $db;
    protected $dt;
}
