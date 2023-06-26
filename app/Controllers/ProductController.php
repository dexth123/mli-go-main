<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['produk'] = $productModel->findAll();

        return view('produk', $data);
    }
}
