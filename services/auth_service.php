<?php
require_once '../config/db.php';

class AuthService
{
    private $db;
    
    public function __construct()
    {
        global $conn;
        $this->db = $conn;
    }

    // Fungsi untuk login
    public function login($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = '" . $username . "' LIMIT 1";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                unset($user['password']); // Hapus password dari hasil
                return $user;
            }
        }
        return null;
    }

    // Fungsi untuk registrasi
    public function register($name, $username, $password)
    {
        // Cek apakah username sudah terdaftar
        $checkQuery = "SELECT id FROM users WHERE username = '" . $username . "' LIMIT 1";
        $checkResult = mysqli_query($this->db, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            return ['success' => false, 'message' => 'Username  already registered'];
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user baru
        $insertQuery = "INSERT INTO users (name, username, password) VALUES ('" . $name . "', '" . $username . "', '" . $hashedPassword . "')";

        if (mysqli_query($this->db, $insertQuery)) {
            return ['success' => true, 'message' => 'Registration successful'];
        } else {
            return ['success' => false, 'message' => 'Registration failed'];
        }
    }
}


