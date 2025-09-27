## Cara Menjalankan Project Ini

1. Pastikan kamu sudah menginstal:
   - PHP 7.4 atau lebih baru
   - MySQL 5.7+ atau MariaDB
   - Composer (opsional, jika pakai autoloader)

2. Clone atau unduh repositori ini ke folder web server kamu (misalnya `htdocs` untuk XAMPP atau `www` untuk Laragon).

3. Buat database baru di MySQL, misalnya `native_php_mysql`.

4. Import file SQL yang tersedia (biasanya `database.sql`) ke database tersebut.

5. Sesuaikan koneksi database di file `config/database.php` (atau file konfigurasi lainnya) dengan:
   - host
   - username
   - password
   - nama database

6. Jalankan server built-in PHP dari root project:
   ```bash
   php -S localhost:8000
   ```
   atau letakkan folder project di dalam `htdocs` lalu akses via:
   ```
   http://localhost/native-php-mysql
   ```

7. Buka browser, akses URL yang sudah kamu tentukan, dan project siap digunakan.
