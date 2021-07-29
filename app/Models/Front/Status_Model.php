<?php

/**
 * Status
 *
 * Status_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://bootstrapmade.com/demo/templates/OnePage/
 */

namespace App\Models\Front;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\Null_;

class Status_Model extends Model
{
    protected $table      = 'tb_m_status';
    protected $primaryKey = 'id_status';

    protected $allowedFields = ['tokens', 'status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function search_id($token)
    {

        $search = $this->db->table($this->table)
            ->where('tokens', $token)
            ->get();


        return $search->getResultArray();
    }
}
