<?php
// Menggunakan AuthService untuk registrasi
require_once '../services/auth_service.php';
class AuthController
{
    private $authService; // null
    // Konstruktor untuk inisialisasi AuthService
    public function __construct()
    {
        $this->authService = new AuthService();
    }

    // Fungsi untuk login
    public function login($username, $password)
    {
        // Ensure session is started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user = $this->authService->login($username, $password);

        if ($user) {
            // Store complete user data that dashboard expects
            $_SESSION['user'] = [
                'name' => $user['name'],
                'email' => $user['username'], // Using username as email
                'login_time' => date('Y-m-d H:i:s')
            ];
            return true;
        }
        return false;
    }

    // Fungsi untuk registrasi
    public function register($name, $username, $password)
    {
        $result = $this->authService->register($name, $username, $password);

        if ($result['success']) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk logout
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        return true;
    }
}
