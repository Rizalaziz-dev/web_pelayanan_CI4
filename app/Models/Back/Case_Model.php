<?php

/**
 * Case
 *
 * Case_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Back;

use CodeIgniter\Model;

class Case_Model extends Model
{
    protected $table = "tb_m_case";
    protected $allowedFields = ['case_id', 'decision_id'];

    // Dates
    protected $useTimestamps        = true;
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
}
