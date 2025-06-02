<?php

namespace App\Models;
use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'email', 'password'];


    public function encrypt($string, $shift = 19)
    {
        $result = "";
        for ($i = 0; $i < strlen($string); $i++) {
            $char = $string[$i];
            
            if (ctype_digit($char)) {
                $result .= chr(48 + (ord($char) - 48 + $shift) % 10);
            } elseif (ctype_upper($char)) {
                $result .= chr(65 + (ord($char) - 65 + $shift) % 26);
            } elseif (ctype_lower($char)) {
                $result .= chr(97 + (ord($char) - 97 + $shift) % 26);
            } else {
                $result .= $char;
            }
        }
        return $result;
    }
    
    public function decrypt($string, $shift = 19)
    {
        $result = "";
        for ($i = 0; $i < strlen($string); $i++) {
            $char = $string[$i];

            // 💡 Cek angka dulu!
            if (ctype_digit($char)) {
                $result .= chr(48 + ((ord($char) - 48 - $shift + 100) % 10));
            } 
            elseif (ctype_upper($char)) {
                $result .= chr(65 + (ord($char) - 65 - $shift + 26) % 26);
            } 
            elseif (ctype_lower($char)) {
                $result .= chr(97 + (ord($char) - 97 - $shift + 26) % 26);
            } 
            else {
                $result .= $char;
            }
        }
        return $result;
    }
    //cek database apakah ada email dan password tersebut
    public function verifyUser($email, $password) 
    {
        $user = $this->where('email', $email)->first();
        
        if (!$user) {
            return null; // Email tidak ditemukan
        }
        // dd($this->decrypt($user['password']));
        $decryptedDbPassword = $this->decrypt($user['password']);
        
        if ($password === $decryptedDbPassword) {
            return $user; // Login sukses
        }
        
        return false; // Password salah
    }
    public function registerUser($data)
    {
        $data['password'] = $this->encrypt($data['password']);
        // return $this->save($data);
        return $this->db->table($this->table)->insert($data);
    }
   
}

