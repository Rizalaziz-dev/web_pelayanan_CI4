<?php

/**
 * DataSitara
 *
 * DataSitara_Model scripts
 *
 * @package     Website Pelayanan
 * @category    Model
 * @author      Muhamad Rizal Nurul Aziz (muhammadrizal323@gmail.com)
 * @date        June 03, 2021
 * @reference   https://adminlte.io/themes/AdminLTE/index.html
 */

namespace App\Models\Front;

use CodeIgniter\HTTP\RequestInterface;

use CodeIgniter\Model;

class Sitara_Model extends Model
{
    protected $table = "tb_m_suspect";
    protected $allowedFields = [
        'suspect_id',
        'suspect_nik',
        'suspect_name',
        'suspect_ttl',
        'suspect_gender',
        'suspect_nationality',
        'suspect_religion',
        'suspect_profession',
        'suspect_education',
        'suspect_address',
        'suspect_email',
        'suspect_phonenumber',
        'case_id',
        'case_status',
        'id_trial',
        'trial_nomor',
        'decision_id',
    ];
    protected $column_order = array(null, 'id_case', 'suspect_name', null);
    protected $column_search = array('suspect_nik', 'suspect_name');
    protected $order = array('id_case' => 'asc');
    protected $db;
    protected $dt;

    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;

        $this->dt = $this->db->table($this->table)
            // ->select('tb_m_suspect.id_case, suspect_name, suspect_ttl, suspect_address, indictment_article, case_status ')
            ->join('tb_m_case_detail', 'tb_m_suspect.case_id=tb_m_case_detail.id_case');
        // ->join('tb_m_decision', 'tb_m_decision.decision_nomor=tb_m_suspect.decision_id');
    }

    private function _get_datatables_query()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }
    public function count_all()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }
}
