<?php

/**
 * Menu
 *
 * Menu_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Back;

use CodeIgniter\Model;

class Menu_Model extends Model
{
    protected $table      = 'tb_m_user_menu';
    protected $primaryKey = 'id_menu';

    protected $allowedFields = ['id_menu', 'menu'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getMenu($role_id)
    {
        $query = $this->db->table($this->db)
            ->select('*')
            ->join('tb_m_user_access_menu', 'id_menu=menu_id')
            ->where('role_id', $role_id)
            ->orderBy('tb_m_user_access_menu', 'menu_id', 'ASC')
            ->get();

        return $query->getResultArray();
    }
}
