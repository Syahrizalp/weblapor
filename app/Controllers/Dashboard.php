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

        $buktiFileName = null;

        if ($bukti && $bukti->isValid() && !$bukti->hasMoved()) {
            // Generate nama file acak untuk mencegah konflik
            $buktiFileName = $bukti->getRandomName();

            // Pindahkan file ke folder public/uploads
            $bukti->move(ROOTPATH . 'public/uploads', $buktiFileName);
        }

        // Simpan hanya nama file ke database
        $db = \Config\Database::connect();
        $builder = $db->table('tb_laporan');

        $builder->insert([
            'nama_pelapor' => $nama,
            'keluhan'      => $keluhan,
            'lokasi'       => $lokasi,
            'bukti'        => $buktiFileName, // hanya nama file
        ]);

        // Flash message dan redirect kembali ke dashboard
        session()->setFlashdata('popup_message', 'Laporan berhasil dikirim!');
        return redirect()->to('/dashboard');
    }

    public function laporanKeluhan()
    {
        $db = \Config\Database::connect();
        $laporan = $db->table('tb_laporan')->get()->getResultArray();

        return view('laporan_keluhan', ['laporan' => $laporan]);
    }
    
}
