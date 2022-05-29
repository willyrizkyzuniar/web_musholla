<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $allowedFields = ['nama_kegiatan', 'pengisi_acara', 'waktu'];

    public function getKegiatan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();;
    }
    
}
