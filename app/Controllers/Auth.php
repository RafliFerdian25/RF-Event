<?php

namespace App\Controllers;

use App\Models\MAuth;
use App\Libraries\Hash;
use PhpParser\Builder\FunctionLike;

class Auth extends BaseController
{
    protected $MAuth;

    public function __construct()
    {
        $this->MAuth = new MAuth();
    }
    public function login()
    {
        return view('/auth/login');
    }
    public function register()
    {
        session();
        $validation = \Config\Services::validation();
        $data = [
            'validation' => $validation
        ];
        return view('/auth/register', $data);
    }
    public function save()
    {
        if (! $this->validate([
            'nama' => 'required',
            'password' => 'required|min_length[5]',
            'rePassword' => 'required|matches[password]',
            'email' => 'required|valid_email',
        ])) {
            return redirect()->to('auth/register')->withInput();
        }
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $values = [
            'nama' => $nama,
            'email' => $email,
            'password' => Hash::make($password),
        ];
        // dd($nama);
        $query = $this->MAuth->insert($values);
        if (!$query) {
            return redirect()->back()->with('gagal','Terjadi kesalahan');
        } else {
            return redirect()->to('/auth/login')->with('berhasil','Anda berhasil melakukan pendaftaran');
        }
    }
    public function check(){
        // if (!$this->validate([
        //     'email'    => 'required|valid_email|is_not_unique[auth.email]',
        //     'password'    => 'required|numeric',
        // ])) {
        //     return redirect()->to('')->withInput();
        // }
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        // dd($password);
        $user_info = $this->MAuth->where('email', $email)->first();
        $check_password = Hash::check($password, $user_info['password']);
        if (!$check_password) {
            session()->setFlashdata('gagal','Passwod salah');
            return redirect()->to('/auth/login')->withInput();
        } else {
            $user_id = $user_info['id'];
            session()->set('loggedUser',$user_id);
            return redirect()->to('/admin');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/?access=out')->with('gagal','Anda telah keluar');
        // if (session()->has('loggedUser')) {
        //     session()->remove('loggedUser');
        // }
    } 
}