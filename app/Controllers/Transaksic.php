<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Transaksi;
 
class Transaksic extends BaseController
{
    public function index()
    {
        $model = new Transaksi();
        $data['profilepenjual'] = $model->getData();
        echo view('dataview',$data);
    }
}