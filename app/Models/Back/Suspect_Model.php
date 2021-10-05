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
        'id_trial',
        'trial_nomor',
        'decision_id',
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    public function idTrial()
    {

        $kode = $this->db->table($this->table)
            ->select('RIGHT(id_trial,4) as nomor', false)
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
            ->where('suspect_id', $id_suspect)
            ->get();


        return $search->getRowArray();
    }

    public function count_all()
    {
        $complaint = $this->db->table($this->table);
        return $complaint->countAllResults();
    }

    public function count_prePro()
    {
        $complaint = $this->db->table($this->table)
            ->where('case_status', 'New');
        return $complaint->countAllResults();
    }

    public function count_pro()
    {
        $complaint = $this->db->table($this->table)
            ->where('case_status', 'Pra Penuntutan');
        return $complaint->countAllResults();
    }

    public function count_execution()
    {
        $complaint = $this->db->table($this->table)
            ->where('case_status', 'Penuntutan');
        return $complaint->countAllResults();
    }

    public function count_Done()
    {
        $complaint = $this->db->table($this->table)
            ->where('case_status', 'Kekuatan Hukum Tetap');
        return $complaint->countAllResults();
    }
}
