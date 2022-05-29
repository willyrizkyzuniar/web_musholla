<?php

namespace App\Controllers;

use App\Models\KegiatanModel;

class Kegiatan extends BaseController
{
    protected $kegiatanModel;

    public function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kegiatan',
            'kegiatan' => $this->kegiatanModel->getKegiatan(),
        ];

        return view('kegiatan/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Daftar Kegiatan',
            'kegiatan' => $this->kegiatanModel->getKegiatan($id)
        ];

        // jika tidak ada ditabel
        if (empty($data['kegiatan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kegiatan' . $id . 'Tidak Ditemukan.');
        }

        return view('kegiatan/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Daftar Kegiatan',
            'validation' => \Config\Services::validation()
        ];

        return view('kegiatan/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama_kegiatan' => [
                'rules' => 'required|is_unique[kegiatan.nama_kegiatan]',
                'errors' => [
                    'required' => 'Nama Kegiatan Harus Diisi.',
                    'is_unique' => 'kegiatan sudah terdaftar'
                ]
            ],
            'pengisi_acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pengisi Acara Harus diisi'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('kegiatan/create')->withInput();
        }

        $this->kegiatanModel->save([
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'pengisi_acara' => $this->request->getVar('pengisi_acara'),
            'waktu' => $this->request->getVar('waktu')
        ]);

        session()->setFlashdata('pesan', 'Daftar Kegiatan berhasil ditambahkan');

        return redirect()->to('/kegiatan');
    }

    public function delete($id)
    {
        $this->kegiatanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/kegiatan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Daftar Kegiatan',
            'validation' => \Config\Services::validation(),
            'kegiatan' => $this->kegiatanModel->getKegiatan($id)
        ];

        return view('kegiatan/edit', $data);
    }

    public function update($id)
    {
        $this->kegiatanModel->save([
            'id' => $id,
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'pengisi_acara' => $this->request->getVar('pengisi_acara'),
            'waktu' => $this->request->getVar('waktu')
        ]);

        session()->setFlashdata('pesan', 'Daftar Kegiatan berhasil diubah');

        return redirect()->to('/kegiatan');
    }


}
