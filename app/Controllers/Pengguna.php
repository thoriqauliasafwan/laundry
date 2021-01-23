<?php

namespace App\Controllers;

use App\Models\userModel;
use App\Models\adminModel;
use App\Models\BidanModel;
use App\Models\KaryawanModel;
use App\Models\PetugasDinkesModel;
use App\Models\PetugasPoliGiziModel;

class Pengguna extends BaseController
{

    public function index()
    {
        $userModel = new userModel;
        $level = $this->request->uri->getSegment(2);
        $data = [
            'userData' => $this->userData,
            'pengguna' => $userModel->_get($level),
            'alert' => $this->session->getFlashdata('alert'),
        ];
        if ($level == 0) {
            echo view('admin/pengguna/index/admin', $data);
        } else if ($level == 1) {
            echo view('admin/pengguna/index/karyawan', $data);
        }
    }

    // method halaman tambah pengguna
    public function newForm()
    {
        $userModel = new userModel;
        $level = $this->request->uri->getSegment(3);
        $data = [
            'userData' => $this->userData,
            'pengguna' => $userModel->_get($level),
            'alert' => $this->session->getFlashdata('alert'),
            'errors' => $this->session->getFlashdata('errors')
        ];
        if ($level == 0) {
            echo view('admin/pengguna/new/admin', $data);
        } else if ($level == 1) {
            echo view('admin/pengguna/new/karyawan', $data);
        }
    }

    // Method insert data
    public function insert()
    {
        $userModel = new userModel;
        $level = $this->request->uri->getSegment(3);
        // print_r($level);
        // Get data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama = $this->request->getPost('nama');
        $nomor_hp = $this->request->getPost('nomor_hp');
        $alamat = $this->request->getPost('alamat');
        // =================================
        // Validation Rules and Messages
        $validationRules = [
            'username' => 'required|is_unique[user.username]|max_length[20]',
            'password' => 'required|max_length[16]',
            'nama' => 'required|alpha_space',
            'nomor_hp' => 'required|max_length[13]|numeric',
            'alamat' => 'required|max_length[50]',
        ];
        $validationMessages = [
            'username' => [
                'required' => 'username wajib diisi',
                'is_unique' => 'username sudah terdaftar',
                'max_length' => 'username terlalu panjang'
            ],
            'password' => [
                'required' => 'username wajib diisi',
                'max_length' => 'password terlalu panjang'
            ],
            'nama' => [
                'required' => 'username wajib diisi',
                'alpha_space' => 'nama harus berupa huruf'
            ],
            'nomor_hp' => [
                'required' => 'username wajib diisi',
                'max_length' => 'nomor hp terlalu panjang',
                'numeric' => 'nomor hp harus berupa angka'
            ],
            'alamat' => [
                'required' => 'username wajib diisi',
                'max_length' => 'alamat terlalu panjang'
            ],
        ];
        // =================================
        if ($level == 0) {
            $adminModel = new AdminModel;
            $level = 0;
            // validate
            if (!$this->validate($validationRules, $validationMessages)) {
                $this->session->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back();
            } else {
                $dataUser = [
                    'username' => $username,
                    'password' => $password,
                    'level' => $level,
                ];
                $dataAdmin = [
                    'nomor_hp' => $nomor_hp,
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'username' => $username,
                ];
                $userModel->_insert($dataUser);
                $adminModel->_insert($dataAdmin);
                return redirect()->to('/Pengguna/0');
            }
        } else if ($level == 1) {
            $karyawanModel = new KaryawanModel;
            $level = 1;
            // validate
            if (!$this->validate($validationRules, $validationMessages)) {
                $this->session->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back();
            } else {
                $dataUser = [
                    'username' => $username,
                    'password' => $password,
                    'level' => $level,
                ];
                $dataKaryawan = [
                    'nomor_hp' => $nomor_hp,
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'username' => $username,
                ];
                $userModel->_insert($dataUser);
                $karyawanModel->_insert($dataKaryawan);
                return redirect()->to('/Pengguna/1');
            }
        }
    }

    // Method delete form
    public function deleteForm()
    {
        $userModel = new userModel;
        $level = $this->request->uri->getSegment(3);
        $data = [
            'userData' => $this->userData,
            'pengguna' => $userModel->_get($level),
            'alert' => $this->session->getFlashdata('alert'),
        ];
        if ($level == 0) {
            echo view('admin/pengguna/delete/admin', $data);
        } else if ($level == 1) {
            echo view('admin/pengguna/delete/karyawan', $data);
        }
    }

    public function updateForm()
    {
        $userModel = new userModel;
        $nip = $this->request->uri->getSegment(4);
        $level = $this->request->uri->getSegment(3);
        $data = [
            'userData' => $this->userData,
            'pengguna' => $userModel->_get($level, $nip)[0],
            'alert' => $this->session->getFlashdata('alert'),
            'errors' => $this->session->getFlashdata('errors')
        ];
        if ($level == 0) {
            echo view('admin/pengguna/update/admin', $data);
        } else if ($level == 1) {
            echo view('admin/pengguna/update/karyawan', $data);
        }
    }

    // Method insert data
    public function update()
    {
        $userModel = new userModel;
        $level = $this->request->uri->getSegment(3);
        // print_r($level);
        // Get data dari form
        // get username lama dan username baru
        // dibutuhkan bila mengganti username
        $usernameLama = $this->request->getPost('usernameLama');
        $usernameBaru = $this->request->getPost('username');
        
        $password = $this->request->getPost('password');
        $nama = $this->request->getPost('nama');
        $nomor_hp = $this->request->getPost('nomor_hp');
        $alamat = $this->request->getPost('alamat');
        // =================================
        // Validation Rules and Messages
        $validationRules = [
            // 'username' => 'required|is_unique[user.username]|max_length[20]',
            'password' => 'required|max_length[16]',
            'nama' => 'required|alpha_space',
            'nomor_hp' => 'required|max_length[13]|numeric',
            'alamat' => 'required|max_length[50]',
        ];
        $validationMessages = [
            'password' => [
                'required' => 'username wajib diisi',
                'max_length' => 'password terlalu panjang'
            ],
            'nama' => [
                'required' => 'username wajib diisi',
                'alpha_space' => 'nama harus berupa huruf'
            ],
            'nomor_hp' => [
                'required' => 'username wajib diisi',
                'max_length' => 'nomor hp terlalu panjang',
                'numeric' => 'nomor hp harus berupa angka'
            ],
            'alamat' => [
                'required' => 'username wajib diisi',
                'max_length' => 'alamat terlalu panjang'
            ],
        ];
        // =================================
        if ($level == 0) {
            $adminModel = new AdminModel;
            $level = 0;
            // validate
            if (!$this->validate($validationRules, $validationMessages)) {
                $this->session->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back();
            } else {
                // cek apakah username baru sama dengan username lama
                if($usernameBaru != $usernameLama){
                    $dataUser = [
                        'username' => $usernameBaru,
                        'password' => $password,
                        'level' => $level,
                    ];
                    $dataAdmin = [
                        'nomor_hp' => $nomor_hp,
                        'nama' => $nama,
                        'alamat' => $alamat,
                        'username' => $usernameBaru,
                    ];
                }else if($usernameBaru == $usernameLama){
                    $dataUser = [
                        // 'username' => $username,
                        'password' => $password,
                        'level' => $level,
                    ];
                    $dataAdmin = [
                        'nomor_hp' => $nomor_hp,
                        'nama' => $nama,
                        'alamat' => $alamat,
                        // 'username' => $username,
                    ];
                }
                
                $userModel->_update($usernameLama, $dataUser);
                $adminModel->_update($usernameLama, $dataAdmin);
                return redirect()->to('/Pengguna/0');
            }
        } else if ($level == 1) {
            $karyawanModel = new KaryawanModel;
            $level = 1;
            // validate
            if (!$this->validate($validationRules, $validationMessages)) {
                $this->session->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back();
            } else {
                // cek apakah username baru sama dengan username lama
                if($usernameBaru != $usernameLama){
                    $dataUser = [
                        'username' => $usernameBaru,
                        'password' => $password,
                        'level' => $level,
                    ];
                    $dataKaryawan = [
                        'nomor_hp' => $nomor_hp,
                        'nama' => $nama,
                        'alamat' => $alamat,
                        'username' => $usernameBaru,
                    ];
                }else if($usernameBaru == $usernameLama){
                    $dataUser = [
                        // 'username' => $username,
                        'password' => $password,
                        'level' => $level,
                    ];
                    $dataKaryawan = [
                        'nomor_hp' => $nomor_hp,
                        'nama' => $nama,
                        'alamat' => $alamat,
                        // 'username' => $username,
                    ];
                }
                $userModel->_update($usernameLama, $dataUser);
                $karyawanModel->_update($usernameLama, $dataKaryawan);
                return redirect()->to('/Pengguna/1');
            }
        }
    }

    // Method view by id
    public function viewById()
    {
        $userModel = new userModel;
        $username = $this->request->uri->getSegment(3);
        $level = $this->request->uri->getSegment(2);
        $data = [
            'userData' => $this->userData,
            'pengguna' => $userModel->_get($level, $username)[0],
            'alert' => $this->session->getFlashdata('alert'),
        ];
        // print_r($data['pengguna']);
        if ($level == 0) {
            echo view('admin/pengguna/view/admin', $data);
        } else if ($level == 1) {
            echo view('admin/pengguna/view/karyawan', $data);
        }
    }

    // Method delete
    public function delete()
    {
        $userModel = new userModel;
        // jika delete berupa POST berarti delete beberapa item
        if ($this->request->getMethod() === 'post') {
            // mendapatkan ID balita
            // split menjadi array setiap ada tanda koma ","
            $level = $this->request->uri->getSegment(4);
            $username = explode(",", $this->request->getPost('deleteID'));
            // cek level
            if ($level == 0) {
                $adminModel = new adminModel;
                $adminModel->_delete($username);
                $userModel->_delete($username);
                $this->session->setFlashdata('alert', 'Berhasil menghapus <i class="fa fa-check"></i>');
                // print_r($level);
            } else if ($level == 1) {
                $karyawanModel = new karyawanModel;
                $karyawanModel->_delete($username);
                $userModel->_delete($username);
                $this->session->setFlashdata('alert', 'Berhasil menghapus <i class="fa fa-check"></i>');
            }
            return redirect()->back();
        } else {
            $level = $this->request->uri->getSegment(3);
            $username = $this->request->uri->getSegment(4);
            // cek level
            if ($level == 0) {
                $adminModel = new adminModel;
                $adminModel->_delete($username);
                $userModel->_delete($username);
                $this->session->setFlashdata('alert', 'Berhasil menghapus <i class="fa fa-check"></i>');
                // print_r($username);
            } else if ($level == 1) {
                $karyawanModel = new karyawanModel;
                $karyawanModel->_delete($username);
                $userModel->_delete($username);
                $this->session->setFlashdata('alert', 'Berhasil menghapus <i class="fa fa-check"></i>');
            }
            return redirect()->to('/Pengguna/'.$level.'/');
        }
    }
}
