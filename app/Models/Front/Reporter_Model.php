<?php

/**
 * Reporter
 *
 * Reporter_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://bootstrapmade.com/demo/templates/OnePage/
 */

namespace App\Models\Front;

use CodeIgniter\Model;

class Reporter_Model extends Model
{
    protected $table      = 'tb_m_reporter';
    protected $primaryKey = 'report_id';

    protected $allowedFields = ['report_id', 'reporter_fullname', 'reporter_nik', 'reporter_address', 'reporter_email', 'reporter_phonenumber', 'report_type'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function search_id($report_id)
    {

        $search = $this->db->table($this->table)
            ->select('*')
            ->join('tb_m_question', 'report_id=id_report')
            ->where('id_report', $report_id)->get();


        return $search->getRowArray();
    }
}
