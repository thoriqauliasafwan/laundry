<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisCuciModel extends Model
{
    // nama tabel
    protected $table = 'jenis_cuci';
    // nama primary key
    protected $primaryKey = 'id_jenis';
    // tipe data return
    protected $returnType = 'object';
    // fields yang dapat diubah
    protected $allowedFields = [
        'id_jenis',
        'pilihan_cuci',
        'harga_cuci',
    ];

    // method untuk get data
    // jika ID ada isinya, maka get data sesuai ID
    public function _get($id = null){
        if($id == null){
            return $this->findAll();
        }else{
            return $this->find($id);
        }
    }

    // method untuk insert data
    public function _insert($data){
        $this->insert($data);
    }

    // method untuk update data
    public function _update($id, $data){
        $this->update($id, $data);
    }

    // method untuk delete data
    public function _delete($id){
        $this->delete($id);
    }
}
