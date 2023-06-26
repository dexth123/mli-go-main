<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProductModel;

class Dashboard extends Controller
{
    public function index()
    {
        helper(['form']);
        $data['title'] = 'Dashboard';
        echo view('dashboard/header', $data);
        echo view('dashboard/navbar');
        echo view('dashboard/sidebar');
        echo view('dashboard/mainpage');
        echo view('dashboard/footer');
    }

    public function profile()
{
    helper(['form']);
    $data['title'] = 'Profile';

    // Ambil data pengguna dari model atau sumber data lainnya
    $userModel = new UserModel();

    // Mengambil data NoHp dari session
    $noHp = session()->get('NoHp');

    // Menggunakan Query Builder untuk mengambil data dari tabel User berdasarkan NoHp
    $user = $userModel->where('NoHp', $noHp)->first();

    // Kirim data pengguna ke view
    $data['Profile'] = $user;

    echo view('dashboard/header', $data);
    echo view('dashboard/navbar');
    echo view('dashboard/sidebar');
    echo view('dashboard/profile', $data); // Kirim variabel $data ke view
    echo view('dashboard/footer');
}
public function product()
{
    $produkModel = new ProductModel();
    $data['title'] = 'Product';
    $data['produk'] = $produkModel->findAll(); // Retrieve all rows from the "produk" table

    echo view('dashboard/header', $data);
    echo view('dashboard/navbar');
    echo view('dashboard/sidebar');
    echo view('dashboard/product', $data); // Pass the data to the view
    echo view('dashboard/footer');
}

    
    public function order()
    {
        helper(['form']);
        $data['title'] = 'Order';
        echo view('dashboard/header', $data);
        echo view('dashboard/navbar');
        echo view('dashboard/sidebar');
        echo view('dashboard/order');
        echo view('dashboard/footer');
    }
    
    public function logout()
{
    return redirect()->to('/');
}

    
}
