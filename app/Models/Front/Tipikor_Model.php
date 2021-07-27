<?php

/**
 * Tipikor
 *
 * Tipikor_Model scripts
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

class Tipikor_Model extends Model
{
    protected $table      = 'tb_m_tipikor';
    protected $primaryKey = 'tipikor_id';

    protected $allowedFields = ['subject', 'occurre_time', 'crime_scene', 'report_detail', 'attachment', 'status', 'id_report', 'token'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function noLaporan()
    {

        $kode = $this->db->table($this->table)
            ->select('RIGHT(id_report,4) as nomor', false)
            ->select('Left(id_report,12) as tanggal', false)
            ->orderBy('id_report', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode == null) {
            $no = 1;
        } else {
            $date = "KOR-";
            if ($kode['tanggal'] == $date . date('Ymd')) {
                $no = intval($kode['nomor']) + 1;
            } else {
                $no = 1;
            }
        }

        $tgl = date('Ymd');
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $inisial = 'KOR';
        $id_report = $inisial . "-" . $tgl . "-" . $batas;
        return $id_report;
    }

    public function count_all()
    {
        $complaint = $this->db->table($this->table);
        return $complaint->countAllResults();
    }

    public function search_id($report_id)
    {

        $search = $this->db->table($this->table)
            ->where('id_report', $report_id)->get();


        return $search->getRowArray();
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

            $kode = "KOR";

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
