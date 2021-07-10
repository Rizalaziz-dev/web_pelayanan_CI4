<?php

namespace App\Models\Back;

use CodeIgniter\Model;

class Tipikor_Model extends Model
{
	function get_data()
	{

		if ($_POST['length'] != -1);
		$db = db_connect();
		$builder = $db->table('tb_m_tipikor');
		$query = $builder->select('*')
			->limit($_POST['length'], $_POST['start'])
			->get();
		return $query->getResult();
	}
}
