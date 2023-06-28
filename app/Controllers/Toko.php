<?php 

namespace App\Controllers;

use App\Models\ProductModel;

class Toko extends BaseController
{
    public function toko()
	{
		$produk = new ProductModel();
        $data['produk'] = $produk->orderBy('nama', 'asc')->paginate(10);
		$data['pager'] = $produk->pager;
		echo view('/toko/toko', $data);
	}
    

	public function addp() {
		return view('/toko/addp');
	}

    public function show($idproduk){
        $produk = new ProductModel();
        $detail['show'] = $produk->find($idproduk);
        return view('/toko/show', $detail);
    }
    public function create() {
        $produk = new ProductModel();
  
        $result = $produk->insert([
           'nama'=>$this->request->getPost("nama"),
           'harga'=>$this->request->getPost("harga"),
           'jumlah'=>$this->request->getPost("jumlah")
        ]);
        if($result==true) {
            return redirect()->to("/toko/produk");
        } else {
            return redirect()->back()->with('errors', $produk->errors());
        }
    }
    public function edit($idproduk)
    {
        $produk = new ProductModel();
        $data['edit'] = $produk->find($idproduk);
        return view('/toko/edit', $data);
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
            return redirect()->to("/toko/toko");
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

            return redirect()->to('/toko/toko')->with('info', 'Berhasil menghapus data');
        }

        return view('/toko/delete', $detail);
    }
}