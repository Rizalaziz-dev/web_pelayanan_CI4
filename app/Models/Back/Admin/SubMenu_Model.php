<?php

/**
 * SubMenu
 *
 * SubMenu_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Back;

use CodeIgniter\Model;

class SubMenu_Model extends Model
{
    protected $table      = 'tb_m_user_sub_menu';
    protected $primaryKey = 'id_menu';

    protected $allowedFields = ['id_sub', 'menu_id', 'tittle', 'url', 'icon', 'is_active'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
