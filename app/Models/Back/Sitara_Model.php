<?php

namespace App\Models\Back;

use CodeIgniter\Model;

class Sitara_Model extends Model
{

	protected $table = "tb_m_case";
	protected $allowedFields = ['case_id', 'case_date'];

	// Dates
	protected $useTimestamps        = true;
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
}
