<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class AuthController extends Controller
{
    protected $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function register()
    {
        return view('auth/register');
    }

    public function create()
{
    $loginModel = new LoginModel();

    $data = [
        'NoHp'=> $this->request->getPost('NoHp'),
        'Username' => $this->request->getPost('Username'),
        'Password' => $this->request->getPost('Password')
    ];

    $loginModel->insert($data);

    return redirect()->to('/login');
}

    
    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $loginModel = new LoginModel();
        $username = $this->request->getPost('Username');
        $password = $this->request->getPost('Password');
        $user = $loginModel->where('Username', $username)->first();
    
        if ($user && $password === $user->Password) {
            $userData = [
                'NoHp' => $user->NoHp, // Assuming the user ID column is named 'id'
                'Username' => $user->Username
            ];
    
            // Store user data in session
            session()->set('user', $userData);
            // Login success
            return redirect()->to('/');
        } else {
            // Login failed
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }
    public function logout()
{
    session()->destroy();
    return redirect()->to('/');
}


}
