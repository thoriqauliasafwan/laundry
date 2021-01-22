<?php 
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model {
    protected $table = 'admin';
    protected $primaryKey = 'username';
    protected $returnType = 'object';
    protected $allowedFields = [
        'nomor_hp',
        'nama',
        'alamat',
        'username',
    ];

    
    public function _get(){
        return $this->findAll();
    }

    public function _findById($id){
        return $this->find($id);
    }

    public function _insert($data){
        $this->insert($data);
    }

    public function _update($id, $data){
        $this->update($id, $data);
    }

    public function _delete($username){
        $this->delete($username);
    }
}