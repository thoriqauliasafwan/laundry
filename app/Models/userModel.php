<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'user';
    protected $primaryKey = 'username';
    protected $returnType = 'object';
    protected $allowedFields = [
        'username',
        'password',
        'level',
    ];

    public function _get($level = '', $id = ''){
        // level 0 / admin
        if($level == 0){
            $joinedTable = 'admin';
        }
        // level 0 / admin
        else if($level == 1){
            $joinedTable = 'karyawan';
        }
        if(($level != null)&&($id != null)){
            // query starts
            $results = $this->select('*')
            ->join($joinedTable, ''.$joinedTable.'.username = user.username')
            ->where('level', $level)
            ->where('user.username', $id)
            ->get()
            ->getResult();
        }else if($level != null){
            // query starts
            $results = $this->select('*')
            ->join($joinedTable, ''.$joinedTable.'.username = user.username')
            ->where('level', $level)
            ->get()
            ->getResult();
        }
        return $results;
    }

    public function _checkLogin($username, $password)
    {
        $cekUsername = $this->where('username', $username)->countAllResults();
        if ($cekUsername == 0) {
            return [
                'status' => false,
                'message' => 'Username tidak terdaftar',
            ];
        } elseif ($cekUsername == 1) {
            $where = "username = '" . $username . "' && password = '" . $password . "'";
            $cekPassword = $this->where($where)->countAllResults();
            if ($cekPassword == 0) {
                return [
                    'status' => false,
                    'message' => 'Password salah',
                ];
            } elseif ($cekPassword == 1) {
                $result = $this->select('level')->where('username', $username)->get()->getResult()[0];
                if ($result->level == 0) {
                    $query = $this->select('*')->join('admin', 'user.username = admin.username')->where('user.username', $username);
                    $data = $query->get();
                    return [
                        'status' => true,
                        'userData' => $data->getResult(),
                    ];
                } elseif ($result->level == 1) {
                    $query = $this->select('*')->join('karyawan', 'user.username = karyawan.username')->where('user.username', $username);
                    $data = $query->get();
                    return [
                        'status' => true,
                        'userData' => $data->getResult(),
                    ];
                }
                // return $result;
                // return 'cuk';
            }
        }
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