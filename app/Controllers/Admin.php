<?php

namespace App\Controllers;

use App\Models\MAuth;
use App\Models\MEvent;
use App\Models\MPendaftar;
use App\Libraries\Hash;


class Admin extends BaseController
{
    protected $MAuth;
    protected $MEvent;
    protected $MPendaftar;

    public function __construct()
    {
        $this->MAuth = new MAuth();
        $this->MEvent = new MEvent();
        $this->MPendaftar = new MPendaftar();
    }
    // menampilkan daftar event
    public function index()
    {
        $loggedUserID = session()->get('loggedUser');
        $user_info = $this->MAuth->find($loggedUserID);
        $event = $this->MEvent->orderBy('tanggal_event','ASC')->findAll();
        // dd($user_info);
        $data = [
            'title' => 'Admin Event - Beranda',
            'user_info' => $user_info,
            'event' => $event,
        ];
        return view('/admin/index', $data);
    }
    // menampilkan tampilan form tambah event
    public function tambahEvent()
    {
        $data = [
            'title' => 'Admin Event - Tambah Event',
        ];
        return view('/admin/tambah-event', $data);
    }
    // menyimpan data event yang akan ditambahkan
    public function simpanTambahEvent()
    {
        $nama_event = $this->request->getPost('nama_event');
        $tanggal_event = $this->request->getPost('tanggal_event');
        $informasi_event = $this->request->getPost('informasi_event');
        $event = [
            'nama_event' => $nama_event,
            'tanggal_event' => $tanggal_event,
            'informasi_event' => $informasi_event,
        ];
        $query = $this->MEvent->insert($event);
        if ($query) {
            session()->setFlashdata('pesan-event', 'Data event berhasil ditambahkan.');
        } else {
            session()->setFlashdata('pesan-gagal-event', 'Terjadi kesalahan menambahkan event.');
        }
        return redirect()->to('/admin/index');
    }
    // menampilkan tampilan edit event
    public function editEvent($id_event)
    {
        $event = $this->MEvent->find($id_event);
        $data = [
            'title' => 'Admin Event - Tambah Event',
            'event' => $event,
        ];
        return view('/admin/edit-event', $data);
    }
    // menyimpan edit data event
    public function simpanEditEvent($id_event)
    {
        $nama_event = $this->request->getPost('nama_event');
        $tanggal_event = $this->request->getPost('tanggal_event');
        $informasi_event = $this->request->getPost('informasi_event');
        $event = [
            'nama_event' => $nama_event,
            'tanggal_event' => $tanggal_event,
            'informasi_event' => $informasi_event,
        ];
        $query = $this->MEvent->update($id_event, $event);
        if ($query) {
            session()->setFlashdata('pesan-event', 'Data event berhasil diubah.');
        } else {
            session()->setFlashdata('pesan-gagal-event', 'Terjadi kesalahan dalam mengubah data event.');
        }
        return redirect()->to('/admin/index');
    }
    // menampilkan data pendaftar event tertentu
    public function daftarPendaftarEvent($id_event)
    {
        $event = $this->MEvent->find($id_event);
        $pendaftar = $this->MPendaftar->where('id_event', $id_event)->findAll();
        $data = [
            'title' =>'Admin Event - Daftar Pendaftar Event',
            'pendaftar' => $pendaftar,
            'event' => $event
        ];
        return view('/admin/daftar-pendftar-event',$data);
    }
    // menghapus event
    public function hapusEvent($id_event)
    {
        $this->MEvent->delete($id_event);
        return redirect()->to('/admin/index');
    }
    
}