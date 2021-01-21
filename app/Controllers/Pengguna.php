<?php

namespace App\Controllers;

use App\Models\userModel;
use App\Models\adminModel;
use App\Models\BidanModel;
use App\Models\KaryawanModel;
use App\Models\PetugasDinkesModel;
use App\Models\PetugasPoliGiziModel;

class Pengguna extends BaseController{
    
    public function index(){
        $userModel = new userModel;
        $level = $this->request->uri->getSegment(2);
        $data = [
            'userData' => $this->userData,
            'pengguna' => $userModel->_get($level),
            'alert' => $this->session->getFlashdata('alert'),
        ];
        if($level == 0){
            echo view('admin/pengguna/index/admin', $data);
        }else if($level == 1){
            echo view('karyawan/pengguna/index/karyawan', $data);
        }
    }

    // method halaman tambah pengguna
    public function newForm(){
        $userModel = new userModel;
        $level = $this->request->uri->getSegment(2);
        $data = [
            'userData' => $this->userData,
            'pengguna' => $userModel->_findByLevel($level),
            'alert' => $this->session->getFlashdata('alert'),
        ];
        if($level == 0){
            echo view('admin/pengguna/new/admin', $data);
        }else if($level == 1){
            echo view('karyawan/pengguna/new/karyawan', $data);
        }
    }

    // Method insert data
    public function insert(){
        $userModel = new userModel;
        $level = $this->request->uri->getSegment(2);
        if($level == 0){
            $adminModel = new AdminModel;
        }else if($level == 1){
            $petugasDinkesModel = new KaryawanModel;
        }
    }

    // Method delete form
    public function deleteForm(){
        $userModel = new userModel;
        $level = $this->request->uri->getSegment(3);
        $data = [
            'userData' => $this->userData,
            'pengguna' => $userModel->_get($level),
            'alert' => $this->session->getFlashdata('alert'),
        ];
        if($level == 0){
            echo view('admin/pengguna/delete/admin', $data);
        }else if($level == 1){
            echo view('karyawan/pengguna/delete/karyawan', $data);
        }
    }

    public function updateForm(){
        $userModel = new userModel;
        $nip = $this->request->uri->getSegment(4);
        $level = $this->request->uri->getSegment(3);
        $data = [
            'userData' => $this->userData,
            'pengguna' => $userModel->_findByLevel($level, $nip)[0],
            'alert' => $this->session->getFlashdata('alert'),
        ];
        if($level == 0){
            echo view('admin/pengguna/update/admin', $data);
        }else if($level == 1){
            echo view('karyawan/pengguna/update/karyawan', $data);
        }
    }

    // Method view by id
    public function viewById(){
        $userModel = new userModel;
        $nip = $this->request->uri->getSegment(3);
        $level = $this->request->uri->getSegment(2);
        $data = [
            'userData' => $this->userData,
            'pengguna' => $userModel->_findByLevel($level, $nip)[0],
            'alert' => $this->session->getFlashdata('alert'),
        ];
        if($level == 0){
            echo view('admin/pengguna/view/admin', $data);
        }else if($level == 1){
            echo view('karyawan/pengguna/view/karyawan', $data);
        }
    }
}