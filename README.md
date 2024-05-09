# transportation_management
Sekawan Media Technical Test, Website developed using Laravel and PostgreSQL

## Daftar Pengguna

### Admin
- Username: admin@example.com
- Password: password

### Manajer
- Username: manager1@example.com
- Password: password
- Username: manager2@example.com
- Password: password

## Versi Database
- PostgreSQL 14.9

## Versi PHP
- PHP 8.3.4

## Framework
- Laravel 11.7.0

## Panduan Penggunaan Aplikasi
1. Salin file `.env.example` dan buat salinan dengan nama `.env`. Atur sesuai username dan password database lokal anda.
2. Masuk ke directory dengan perintah `cd sekawan-media-test` di terminal anda.
3. Jalankan migrasi menggunakan perintah: `php artisan migrate`.
4. Jalankan seeder menggunakan perintah: `php artisan db:seed`.
5. Pastikan Anda telah menginstal Composer di sistem Anda `composer require maatwebsite/excel`.
6. Jalankan `php artisan migrate`.
7. Masuk ke aplikasi menggunakan salah satu akun yang terdaftar.
8. Di halaman utama, Anda dapat melihat dashboard statistik pemakaian kendaraan.
9. Jika Anda login sebagai admin, Anda akan memiliki akses untuk menambahkan pemesanan kendaraan dan melihat grafik pemakaian kendaraan per bulan.
10. Jika Anda login sebagai manajer, Anda akan dapat melihat daftar booking yang diajukan oleh admin dan menyetujui booking tersebut.

