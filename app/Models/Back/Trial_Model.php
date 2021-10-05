<?php

/**
 * Trial
 *
 * Trial_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Back;

use CodeIgniter\Model;

class Trial_Model extends Model
{
    protected $table = "tb_m_trial";
    protected $primaryKey = 'trial_id';
    protected $allowedFields = [
        'trial_id',
        'trial_nomor',
        'trial_date',
        'trial_agenda',
        'suspect_nik'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    public function idTrial($trial_id)
    {

        $kode = $this->db->table($this->table)
            ->select('RIGHT(id_trial,4) as nomor', false)
            ->where('trial_id', $trial_id)
            ->orderBy('id_trial', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode == null) {
            $no = 1;
        } else {
            $no = intval($kode['nomor']) + 1;
        }

        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $id_trial = $batas;
        return $id_trial;
    }
    public function search_id($id_suspect)
    {
        $search = $this->db->table($this->table)
            // ->join('tb_m_case_detail', 'case_id=id_case')
            ->where('suspect_id', $id_suspect)
            ->get();


        return $search->getRowArray();
    }
}
