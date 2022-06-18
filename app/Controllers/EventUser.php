<?php

namespace App\Controllers;

use App\Models\MEvent;
use App\Models\MPendaftar;

use App\Libraries\Hash;


class EventUser extends BaseController
{
    protected $MEvent;
    protected $MPendaftar;


    public function __construct()
    {
        $this->MEvent = new MEvent();
        $this->MPendaftar = new MPendaftar();

    }
    // menampilkan tampilan user yang berisi daftar event dan pendaftaran
    public function index()
    {
        $event = $this->MEvent->orderBy('tanggal_event','ASC')->findAll();
        $data = [
            'title' => 'Dashboard',
            'daftar_event' => $event,
        ];
        return view('/event-user/index', $data);
    }
    // menyimpan tambah pendaftar event
    public function simpanTambahPendaftar($id_event)
    {
        $nama_pendaftar = $this->request->getPost('nama_pendaftar');
        $tanggal_lahir_pendaftar = $this->request->getPost('tanggal_lahir_pendaftar');
        $email_pendaftar = $this->request->getPost('email_pendaftar');
        $alamat_pendaftar = $this->request->getPost('alamat_pendaftar');
        $pendaftar = [
            'nama_pendaftar' => $nama_pendaftar,
            'tanggal_lahir_pendaftar' => $tanggal_lahir_pendaftar,
            'email_pendaftar' => $email_pendaftar,
            'alamat_pendaftar' => $alamat_pendaftar,
            'id_event' => $id_event,
        ];
        $query = $this->MPendaftar->insert($pendaftar);
        if ($query) {
            session()->setFlashdata('pesan-pendaftar', 'Berhasil Mendaftar.');
        } else {
            session()->setFlashdata('pesan-gagal-pendaftar', 'Terjadi kesalahan saat mendaftar.');
        }
        return redirect()->to('/eventuser/index');
    }
    
}