<?php

/**
 * Level
 *
 * Level_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Back;

use CodeIgniter\Model;

class Level_Model extends Model
{
    protected $table      = 'tb_m_level';
    protected $primaryKey = 'level_id';

    protected $allowedFields = ['level_id', 'level_name'];
}
