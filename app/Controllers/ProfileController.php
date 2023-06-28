<?php 

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function produk()
	{
		$profile = new UserModel();
        $data['profile'] = $profile->orderBy('nama', 'asc')->findAll();
		echo view('profile', $data);
	}
}