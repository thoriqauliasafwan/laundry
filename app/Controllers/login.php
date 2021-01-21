<?php

namespace App\Controllers;


use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->getFlashdata('errorMessage') != null) {
            $errorAlert = "<div class='alert alert-danger'>" . $session->getFlashdata('errorMessage') . "</div>";
        } elseif($session->getFlashdata('alert') != null) {
            $errorAlert = "<div class='alert alert-success'>" . $session->getFlashdata('alert') . "</div>";
        } else{
            $errorAlert = "";
        }
        $data = [
            'errorMessage' => $errorAlert,
        ];
        echo view('loginView', $data);
    }

    public function check()
    {
        $session = session();
        $model = new UserModel;
        if ($this->request->getMethod() === 'post') {
            // get username dan password
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            // cek username dan password
            // return status 0/1, dan message
            // jika username dan password cocok dengan DB
            // maka akan me-return level juga
            $cekLogin = $model->_checkLogin($username, $password);
            // cek login
            // 1 = username dan password ada di DB
            if ($cekLogin['status'] == 1) {
                // mengisi userdata ke session
                // data cekLogin['userData'] berupa array
                // gunakan foreach untuk mendapatkan nilai sebagai objek
                foreach($cekLogin['userData'] as $userData){
                    $session->set('userData', $userData);
                }
                // redirect
                // print_r($session->get('userData'));
                return redirect()->to('/');
            }
            // jika pengecekan gagal, kirim error message
            else {
                $errorMessage = $cekLogin['message'];
                $session->setFlashdata('errorMessage', $errorMessage);
                return redirect()->back();
            }
            // print_r($cekLogin);
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('userData');
        return redirect()->to('/Auth/Login');
    }
}
