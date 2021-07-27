<?php

/**
 * Decision
 *
 * Decision_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Back;

use CodeIgniter\Model;

class Decision_Model extends Model
{
    protected $table = "tb_m_decision";
    protected $allowedFields = ['decision_id', 'decision_nomor', 'decision_pn', 'decision_appeal', 'decision_cassation', 'decision_executiion', 'id_case'];

    // Dates
    protected $useTimestamps        = true;
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
}
