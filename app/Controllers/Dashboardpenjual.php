<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboardpenjual extends Controller
{
    public function index()
    {
        helper(['form']);
        $data['title'] = 'Dashboardpenjual';
        echo view('dashboardpenjual/header', $data);
        echo view('dashboardpenjual/navbar');
        echo view('dashboardpenjual/sidebar');
        echo view('dashboardpenjual/mainpage');
        echo view('dashboardpenjual/footer');
    }

    public function profilepenjual()
    {
        helper(['form']);
        $data['title'] = 'Profilepenjual';
        echo view('dashboardpenjual/header', $data);
        echo view('dashboardpenjual/navbar');
        echo view('dashboardpenjual/sidebar');
        echo view('dashboardpenjual/profile');
        echo view('dashboardpenjual/footer');
    }
    
    public function productpenjual()
    {
        helper(['form']);
        $data['title'] = 'Productpenjual';
        echo view('dashboardpenjual/header', $data);
        echo view('dashboardpenjual/navbar');
        echo view('dashboardpenjual/sidebar');
        echo view('dashboardpenjual/product');
        echo view('dashboardpenjual/footer');
    }
    
    public function orderpenjual()
    {
        helper(['form']);
        $data['title'] = 'Orderpenjual';
        echo view('dashboardpenjual/header', $data);
        echo view('dashboardpenjual/navbar');
        echo view('dashboardpenjual/sidebar');
        echo view('dashboardpenjual/order');
        echo view('dashboardpenjual/footer');
    }
    
    public function logoutpenjual()
{
    return redirect()->to('/login');
}

    
}
