<?php

namespace App\Controllers;

use App\Models\KeuanganModel;

class Keuangan extends BaseController
{
    protected $keuanganModel;

    public function __construct()
    {
        $this->keuanganModel = new KeuanganModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kas',
            'keuangan' => $this->keuanganModel->getKeuangan()
        ];

        return view('keuangan/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Daftar Kas',
            'keuangan' => $this->keuanganModel->getKeuangan($id)
        ];

        // jika tidak ada ditabel
        if (empty($data['keuangan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Keuangan' . $id . 'Tidak Ditemukan.');
        }

        return view('keuangan/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Kas',
            'validation' => \Config\Services::validation()
        ];

        return view('keuangan/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan Harus Diisi.'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('keuangan/create')->withInput();
        }

        $this->keuanganModel->save([
            'tgl' => $this->request->getVar('tgl'),
            'keterangan' => $this->request->getVar('keterangan'),
            'masuk' => $this->request->getVar('masuk'),
            'keluar' => $this->request->getVar('keluar'),
            'jenis' => $this->request->getVar('jenis'),
        ]);

        session()->setFlashdata('pesan', 'Data Kas berhasil ditambahkan');

        return redirect()->to('/keuangan');
    }

    public function delete($id)
    {
        $this->keuanganModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/keuangan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Kas',
            'validation' => \Config\Services::validation(),
            'keuangan' => $this->keuanganModel->getKeuangan($id)
        ];

        return view('keuangan/edit', $data);
    }

    public function update($id)
    {
        $this->keuanganModel->save([
            'id' => $id,
            'tgl' => $this->request->getVar('tgl'),
            'keterangan' => $this->request->getVar('keterangan'),
            'masuk' => $this->request->getVar('masuk'),
            'keluar' => $this->request->getVar('keluar'),
            'jenis' => $this->request->getVar('jenis'),
        ]);

        session()->setFlashdata('pesan', 'Data Kas berhasil diubah');

        return redirect()->to('/keuangan');
    }
}
