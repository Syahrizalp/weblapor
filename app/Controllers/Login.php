<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }
    
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->verifyUser($email, $password);
       
        if ($user === null) {
            return redirect()->back()->with('error', 'Email tidak terdaftar.');
        } 
        elseif ($user === false) {
            return redirect()->back()->with('error', 'Password salah!!');
        } 
        else {
            // Login sukses
            $session->set([
                'user_id'   => $user['id_user'],
                'email'     => $user['email'],
                'logged_in' => true
            ]);
            $this->showMessage(); // Panggil method yang dioverride
            return redirect()->to('/dashboard');
            // return redirect()->to('/dashboard');
        }
    }
    public function showMessage($message = '')
    {
        parent::showMessage('Login berhasil! Selamat datang');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}