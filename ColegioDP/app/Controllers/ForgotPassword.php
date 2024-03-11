<?php

// app/Controllers/ForgotPassword.php
namespace App\Controllers;

use App\Models\ForgotModel;
use CodeIgniter\Controller;

class ForgotPassword extends Controller
{
    public function index()
    {
        return view('forgot_password');
    }
    public function profile()
    {
        return view('dashboard');
    }

    public function sendResetLink()
    {
        $email = $this->request->getPost('email');
        echo "Email: $email"; // Add this line for debugging
    
        // Check if the email exists in the database
        $userModel = new ForgotModel();
        $user = $userModel->where('email', $email)->first();
    
        var_dump($user); // Add this line for debugging
    
        if (!$user) {
            return "Email not found!";
        }

        // Generate a unique token
        $token = bin2hex(random_bytes(32));

        // Store the token in the database
        $userModel->update($user['id'], ['reset_token' => $token]);

        // Send email with reset link
        $this->sendResetEmail($email, $token);

        return "Reset link sent successfully!";
    }

    public function resetPassword($token)
    {
        // Validate the token and load the corresponding user
        $userModel = new ForgotModel();
        $user = $userModel->where('reset_token', $token)->first();

        // Check if the token is valid
        if (!$user) {
            return "Invalid token!";
        }

        // Load the view for resetting the password
        return view('reset_password', ['token' => $token]);
    }

    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');

        // Validate the token and load the corresponding user
        $userModel = new ForgotModel();
        $user = $userModel->where('reset_token', $token)->first();

        // Check if the token is valid
        if (!$user) {
            return "Invalid token!";
        }

        // Update the user's password and reset token
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userModel->update($user['id'], ['password' => $hashedPassword, 'reset_token' => null]);

        return "Password updated successfully!";
    }

    private function sendResetEmail($email, $token)
    {
        // Implement your email sending logic using CodeIgniter's Email library
        $email = \Config\Services::email();
        $email->setTo($email);
        $email->setSubject('Password Reset');
        $email->setMessage('Click on the following link to reset your password: ' . base_url("forgot-password/reset-password/{$token}"));
        
        // Additional configuration settings if needed
        // $email->setMailType('html');
        // $email->setCharset('utf-8');

        // Send the email
        $email->send();
    }
}
