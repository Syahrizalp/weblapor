<?php

namespace App\Controllers;
use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function save()
    {
        //mengambil data dari views
        $nama     = $this->request->getPost('nama');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirm  = $this->request->getPost('confirm');
        //konfirmasi password
        if ($password !== $confirm) {
            return redirect()->back()->withInput()->with('error', 'Konfirmasi password tidak cocok.');
        }
        //memasukan data ke dalam database
        $userModel = new UserModel();
        $userModel->registerUser([
            'nama'     => $nama,
            'email'    => $email,
            'password' => $password
        ]);
        //mengambil encrypted password
        $encryptedPassword = $userModel->encrypt($password);
        //mengubah value override
        $this->showMessage('Berhasil membuat akun! Password terenkripsi: ' . $encryptedPassword);
        return redirect()->to('/login');
    }
    //override dari base controller
    public function showMessage($message='')
    {
        // Panggil method showMessage dari parent dengan menampilkan pesan
        parent::showMessage($message);
    }
}