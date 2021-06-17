<?php

/**
 * User
 *
 * User_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table      = 'tb_m_user';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_email', 'user_fullname', 'user_group', 'user_password'];
}
