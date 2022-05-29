<?php

namespace App\Controllers;

use App\Models\KegiatanModel;

class User extends BaseController
{
    protected $kegiatanModel;

    public function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        return view('user/index', $data);
    }
}
