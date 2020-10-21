<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    // nama tabel
    protected $table = 'paket';
    // nama primary key
    protected $primaryKey = 'id_paket';
    // tipe data return
    protected $returnType = 'object';
    // fields yang dapat diubah
    protected $allowedFields = [
        'id_paket',
        'nama_paket',
        'harga_per_kilo',
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
