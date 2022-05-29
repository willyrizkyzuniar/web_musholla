<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    public $table = 'kas';
    public $id = 'id';
    public $jenis = 'jenis';
    public $order = 'DESC';

    protected $allowedFields = ['tgl', 'keterangan', 'masuk', 'keluar', 'jenis'];

    public function __construct()
    {
        parent::__construct();
    }

    public function getKeuangan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
