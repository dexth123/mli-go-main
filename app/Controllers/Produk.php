<?php 

namespace App\Controllers;

use App\Models\ProductModel;

class Produk extends BaseController
{
    public function produk()
	{
		$produk = new ProductModel();
        $data['produk'] = $produk->orderBy('nama', 'asc')->paginate(10);
		$data['pager'] = $produk->pager;
		echo view('/produk/produk', $data);
	}

	public function addp() {
		return view('/produk/addp');
	}

    public function show($idproduk){
        $produk = new ProductModel();
        $detail['show'] = $produk->find($idproduk);
        return view('/produk/show', $detail);
    }
    public function create() {
        $produk = new ProductModel();
  
        $result = $produk->insert([
           'nama'=>$this->request->getPost("nama"),
           'harga'=>$this->request->getPost("harga"),
           'jumlah'=>$this->request->getPost("jumlah")
        ]);
        if($result==true) {
            return redirect()->to("/produk/produk");
        } else {
            return redirect()->back()->with('errors', $produk->errors());
        }
    }
    public function edit($idproduk)
    {
        $produk = new ProductModel();
        $data['edit'] = $produk->find($idproduk);
        return view('/produk/edit', $data);
    }

    public function update($idproduk)
    {
        $produk = new ProductModel();

        $data = [
            'nama' => $this->request->getPost("nama"),
            'harga' => $this->request->getPost("harga"),
            'jumlah' => $this->request->getPost("jumlah")
        ];

        if ($produk->update($idproduk, $data)) {
            // Update successful
            return redirect()->to("/produk/produk");
        } else {
            // Update failed
            return redirect()->back()->with('errors', $produk->errors());
        }
    }
    public function delete($idproduk)
    {
        $produk = new ProductModel();
        $detail['delete'] = $produk->find($idproduk);

        if ($this->request->getMethod() === 'post') {
            $produk->delete($idproduk);

            return redirect()->to('/produk/produk')->with('info', 'Berhasil menghapus data');
        }

        return view('/produk/delete', $detail);
    }
}