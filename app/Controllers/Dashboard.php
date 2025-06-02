<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }

    public function kirim()
    {
        // Ambil data dari POST
        $nama     = $this->request->getPost('name');
        $keluhan  = $this->request->getPost('keluhan');
        $lokasi   = $this->request->getPost('lokasi');
        $bukti    = $this->request->getFile('bukti');

        $buktiData = null;

        if ($bukti && $bukti->isValid() && !$bukti->hasMoved()) {
            // Baca isi file sebagai binary
            $buktiData = file_get_contents($bukti->getTempName());
        }

        // Simpan ke database
        $db = \Config\Database::connect();
        $builder = $db->table('tb_laporan');

        $builder->insert([
            'nama_pelapor' => $nama,
            'keluhan'      => $keluhan,
            'lokasi'       => $lokasi,
            'bukti'        => $buktiData,
        ]);

        // Flash message dan redirect kembali ke dashboard
        session()->setFlashdata('popup_message', 'Laporan berhasil dikirim!');
        return redirect()->to(base_url('/dashboard'));
    }
}
