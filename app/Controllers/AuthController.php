<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper('supabase');
    }
    
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('auth/login', $data);
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Validasi input
        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Email dan password harus diisi');
        }
        
        $response = supabase_request('/login', 'POST', [
            'email' => $email,
            'password' => $password
        ]);
        
        if ($response['success']) {
            $session = session();
            $session->set('user_token', $response['data']['session']['access_token']);
            $session->set('user_data', $response['data']['user']);
            
            return redirect()->to('/dashboard');
        } else {
            $errorMessage = isset($response['error']) ? $response['error'] : 'Login gagal';
            
            if (isset($response['details'])) {
                log_message('error', "Login error details: " . json_encode($response['details']));
            }
            
            return redirect()->back()
                ->with('error', $errorMessage)
                ->withInput();
        }
    }

    public function logout()
    {
        $session = session();
        $token = $session->get('user_token');
        
        supabase_request('/logout', 'POST', [], $token);
        
        $session->remove('user_token');
        $session->remove('user_data');
        
        return redirect()->to('/');
    }
}