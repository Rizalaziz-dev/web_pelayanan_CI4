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
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Front;

use CodeIgniter\Model;

class Reporter_Model extends Model
{
    protected $table      = 'tb_m_reporter';
    // protected $primaryKey = 'report_id';

    protected $allowedFields = ['report_id', 'reporter_fullname', 'reporter_nik', 'reporter_address', 'reporter_email', 'reporter_phonenumber', 'report_type'];
}
