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
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Front;

use CodeIgniter\Model;
use DateInterval;

class Tipikor_Model extends Model
{
    protected $table      = 'tb_m_tipikor';
    protected $primaryKey = 'tipikor_id';

    protected $allowedFields = ['subject', 'occurre_time', 'crime_scene', 'report_detail', 'attachment', 'id_report'];



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
}
