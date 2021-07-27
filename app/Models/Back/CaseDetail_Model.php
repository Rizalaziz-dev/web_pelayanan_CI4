<?php

/**
 * CaseDetail
 *
 * CaseDetail_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Back;

use CodeIgniter\Model;

class CaseDetail_Model extends Model
{
    protected $table = "tb_m_case_detail";
    protected $allowedFields = [
        'detail_id',
        'id_case',
        'start_investigation',
        'case_position',
        'allegation',
        'stage_one',
        'stage_two',
        'public_prosecutor',
        'indictment_article',
        'indictment',
        'demans',
        'case_status'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
}
