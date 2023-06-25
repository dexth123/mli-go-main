<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\ProfileModel;

class ProfileController extends BaseController
{
    public function index()
{
    $loginModel = new LoginModel();
    $profileModel = new ProfileModel();

    // Ambil data pengguna dari tabel "Login"
    $user = $loginModel->first();

    // Jika diperlukan, Anda dapat menggunakan $user['NoHp'] sebagai acuan untuk mengambil data profil dari tabel "Profile"
    $profile = $profileModel->where('NoHp', $user['NoHp'])->first();

    $data = [
        'user' => $user,
        'profile' => $profile
    ];

    return view('dashboard/profile', $data);
}
    public function save()
    {
        $userModel = new ProfileModel();
    
        // Mengambil data NoHp dari session
        $noHp = session()->get('NoHp');
    
        // Ambil data dari form
        $data = [
            'NoHp' => $noHp,
            'NamaLengkap' => $this->request->getPost('NamaLengkap') ?: 'Kosong',
            'Alamat' => $this->request->getPost('Alamat') ?: 'Kosong',
        ];
    
        // Simpan data ke dalam tabel Profile
        $userModel->insert($data);
    
        return redirect()->to('/profile');
    }
    
    public function update()
    {
        helper(['form']);

        // Validate input data
        $validationRules = [
            'NamaLengkap' => 'required',
            'Alamat' => 'required',
            'Username' => 'required'
        ];

        if ($this->validate($validationRules)) {
            // Get the input data
            $namaLengkap = $this->request->getPost('NamaLengkap');
            $alamat = $this->request->getPost('Alamat');
            $username = $this->request->getPost('Username');

            // Prepare the data for insertion
            $data = [
                'NamaLengkap' => $namaLengkap,
                'Alamat' => $alamat,
                'Username' => $username
            ];

            // Insert the data into the Profile table
            $profileModel = new ProfileModel();
            $profileModel->insert($data);

            return redirect()->to('/profile')->with('success', 'Data pengguna berhasil disimpan.');
        } else {
            // Validation failed, show error messages
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}    
