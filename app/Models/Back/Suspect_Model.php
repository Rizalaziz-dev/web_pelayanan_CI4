<?php

/**
 * Suspect
 *
 * Suspect_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Back;

use CodeIgniter\Model;

class Suspect_Model extends Model
{
    protected $table = "tb_m_suspect";
    protected $primaryKey = 'suspect_id';
    protected $allowedFields = [
        'suspect_id',
        'suspect_nik',
        'suspect_name',
        'suspect_ttl',
        'suspect_gender',
        'suspect_nationality',
        'suspect_religion',
        'suspect_profession',
        'suspect_education',
        'suspect_address',
        'suspect_email',
        'suspect_phonenumber',
        'case_id',
        'case_status',
        'decision_id',
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    public function search_id($id_suspect)
    {

        $search = $this->db->table($this->table)
            ->where('suspect_id', $id_suspect)->get();


        return $search->getRowArray();
    }
}
