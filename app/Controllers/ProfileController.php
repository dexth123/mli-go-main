<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        // Mengambil data NoHp dari session
        $noHp = session()->get('NoHp');

        // Mengambil data user berdasarkan NoHp dari tabel "Login"
        $user = $userModel->where('NoHp', $noHp)->first();

        return view('profile', ['user' => $user]);
    }
    public function save()
{
    $userModel = new UserModel();

    // Mengambil data NoHp dari session
    $noHp = session()->get('NoHp');

    // Ambil data dari form
    $data = [
        'NoHp' => $noHp,
        'NamaLengkap' => $this->request->getPost('NamaLengkap') ?: 'Kosong',
        'Alamat' => $this->request->getPost('Alamat') ?: 'Kosong',
        'Username' => $user, // Menggunakan NoHp sebagai Username
    ];

    // Simpan data ke dalam tabel User
    $userModel->insert($data);

    return redirect()->to('/profile');
}

public function update()
{
    $userModel = new UserModel();

    // Mengambil data NoHp dari session
    $noHp = session()->get('NoHp');

    // Ambil data dari form
    $data = [
        'NamaLengkap' => $this->request->getPost('NamaLengkap') ?: 'Kosong',
        'Alamat' => $this->request->getPost('Alamat') ?: 'Kosong',
        'Username' => $noHp, // Menggunakan NoHp sebagai Username
    ];

    // Update data pada tabel User berdasarkan NoHp
    $userModel->where('NoHp', $noHp)->update($data);

    return redirect()->to('/profile');
}

}
