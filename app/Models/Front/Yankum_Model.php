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

    protected $allowedFields = ['question_type', 'question_subject', 'question_detail', 'attachment', 'id_report', 'token'];

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

    public function search_id($report_id)
    {

        $search = $this->db->table($this->table)
            ->where('id_report', $report_id)->get();


        return $search->getRowArray();
    }

    public function search_file($tipikor_id)
    {

        $search = $this->db->table($this->table)
            ->where('id_report', $tipikor_id)->get();


        return $search->getRowObject();
    }

    public function count_all()
    {
        $complaint = $this->db->table($this->table);
        return $complaint->countAllResults();
    }

    public function count_process()
    {
        $complaint = $this->db->table($this->table)
            ->where('status', 'Diproses');
        return $complaint->countAllResults();
    }

    public function count_done()
    {
        $complaint = $this->db->table($this->table)
            ->where('status', 'Selesai');
        return $complaint->countAllResults();
    }

    public function checkTokens($randstr)
    {
        $check = $this->db->table($this->table)
            ->select('token as tokens')
            ->where('token', $randstr)
            ->countAllResults();

        return $check;
    }

    public function generateToken()
    {
        $keylength = 10;
        $str = "1234567890";

        $i = 0;

        do {
            $randstr = substr(str_shuffle($str), 0, $keylength);

            $kode = "YANKUM";

            $keyFinal = $kode . $randstr;
            $checkToken = $this->checkTokens($keyFinal);

            if ($checkToken == 0) {
                $output =  $keyFinal;
                $i = 0;
            } else {
                $i = 1;

                $output = $checkToken;
            }
        } while ($i == 1);


        return $output;
    }
}
