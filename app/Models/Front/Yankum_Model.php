<?php

/**
 * Wbs
 *
 * Wbs_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://bootstrapmade.com/demo/templates/OnePage/
 */

namespace App\Models\Front;

use CodeIgniter\Model;


class Yankum_Model extends Model
{
    protected $table      = 'tb_m_question';
    protected $primaryKey = 'question_id';

    protected $allowedFields = ['question_type', 'question_subject', 'question_detail', 'attachment', 'id_report'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function noLaporan()
    {

        $kode = $this->db->table($this->table)
            ->select('RIGHT(id_report,4) as nomor', false)
            ->select('Left(id_report,15) as tanggal', false)
            ->orderBy('id_report', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode == null) {
            $no = 1;
        } else {
            $date = "YANKUM-";
            if ($kode['tanggal'] == $date . date('Ymd')) {
                $no = intval($kode['nomor']) + 1;
            } else {
                $no = 1;
            }
        }

        $tgl = date('Ymd');
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $inisial = 'YANKUM';
        $id_report = $inisial . "-" . $tgl . "-" . $batas;
        return $id_report;
    }
}
