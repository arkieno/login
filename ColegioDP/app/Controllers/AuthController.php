<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\ForgotPassword;


class AuthController extends BaseController
{
    public function register()
    {
        helper(['form']); // Load the form helper

        $data = [];

        if ($this->request->getMethod() === 'post') {
            $userModel = new UserModel();

            $user = [
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            $userModel->insert($user);

            // Redirect to login page or do something else after registration
            return redirect()->to('/login');
        }

        return view('register', $data);
    }

    public function login()
    {
        helper(['form']); // Load the form helper
    
        $data = [];
    
        if ($this->request->getMethod() === 'post') {
            $userModel = new UserModel();
    
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
    
            $user = $userModel->where('email', $email)->first();
            if ($user && password_verify($password, $user['password'])) {
                // Successful login, set user session here
                $response = [
                    'UserID' => $user['id'],
                    'Username' => $user['username'],
                    'Email' => $user['email'],
                ];
    
                $session = session();
                $session->set('user_data', $response);
    
                // Redirect to the dashboard
                return redirect()->to('/dashboards');
            } else {
                // Set error and return to the login page
                $data['error'] = 'Invalid email or password';
    
                return view('login', $data);
            }
        }
    
        return view('login', $data);
    }
    
    public function testSession()
{
    $session = session();

    // Check if the 'user_data' session variable is set
    if ($session->has('user_data')) {
        // Session variable is set, retrieve and return the data
        $userData = $session->get('user_data');
        return "UserID: {$userData['UserID']}, Username: {$userData['Username']}, Email: {$userData['Email']}";
    } else {
        // Session variable is not set
        return "User not logged in.";
    }
}


    public function index()
    {
        // Your login logic here
        // Validate user credentials and set session if login is successful
        $userModel = new UserModel();
        $user = $userModel->where('username', $this->request->getPost('username'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            // Set user data in the session
            $session = session();
            $userData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                // Add other user data as needed
            ];
            $session->set($userData);

            // Redirect to profile setting or any other page
            return redirect()->to('/profile-setting');
        } else {
            // Redirect back to login with an error message
            return redirect()->to('/login')->with('error', 'Invalid login credentials');
        }
    }
    public function getToken()
    {
        // This is a simple example; you should implement proper token generation logic here
        $data = ['token' => 'your_generated_token'];

        return $this->response->setJSON($data);
    }

    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/register');
    }
        
}
