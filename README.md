# Sistem Manajemen HRD

Aplikasi berbasis web untuk mengelola data karyawan, absensi, cuti, dan penggajian dalam suatu perusahaan. Dibangun menggunakan framework Laravel di sisi backend dan Vue.js di sisi frontend.

## Persyaratan Sistem

*   **Server:**
    *   PHP >= 8.1
    *   Composer
    *   Database (MySQL, PostgreSQL, dll. yang didukung oleh Laravel)
*   **Klien (Browser):**
    *   Browser web modern seperti Chrome, Firefox, Safari, atau Edge.
    *   Node.js dan NPM (untuk pengembangan frontend)

## Fungsi dan Fitur Utama

1.  **Manajemen Karyawan:**
    *   Menambah, mengubah, dan menghapus data karyawan.
    *   Melihat daftar semua karyawan beserta detailnya (nama, email, posisi, gaji, dll.).
    *   Pencarian dan filter data karyawan.
    *   Mencatat riwayat pergerakan karyawan (mutasi, promosi, resign, perpanjangan kontrak).
2.  **Manajemen Absensi:**
    *   Mencatat absensi harian karyawan (check-in dan check-out).
    *   Melihat riwayat absensi per karyawan.
    *   Mengelola status absensi (hadir, sakit, izin, dll.).
3.  **Manajemen Cuti:**
    *   Karyawan dapat mengajukan cuti.
    *   Admin HRD dapat menyetujui atau menolak pengajuan cuti.
    *   Melihat riwayat cuti karyawan.
4.  **Manajemen Penggajian (Payroll):**
    *   Menghasilkan slip gaji untuk setiap karyawan.
    *   Menghitung gaji kotor, potongan, dan gaji bersih.
    *   Melihat riwayat penggajian.

## Role Akses dan Hak Akses

Aplikasi ini memiliki sistem manajemen peran yang fleksibel. Peran dan izin dapat dikonfigurasi secara dinamis oleh Super Admin.

Beberapa contoh peran default:
1.  **Super Admin:** Memiliki semua izin dan dapat mengelola peran dan izin lainnya.
2.  **HRD:** Mengelola tugas-tugas terkait SDM.
3.  **Manager:** Mengelola tim karyawan.
4.  **Employee:** Pengguna biasa dengan akses terbatas.

## Tahapan Instalasi Secara Detail

1.  **Clone Repository:**
    ```bash
    git clone <URL_repositori>
    ```
2.  **Masuk ke Direktori Proyek:**
    ```bash
    cd <nama_direktori_proyek>
    ```
3.  **Instal Dependensi PHP:**
    ```bash
    composer install
    ```
4.  **Instal Dependensi JavaScript:**
    ```bash
    npm install
    ```
5.  **Konfigurasi Lingkungan:**
    *   Salin file `.env.example` menjadi `.env`.
      ```bash
      cp .env.example .env
      ```
    *   Buka file `.env` dan konfigurasikan koneksi database Anda (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
6.  **Generate Kunci Aplikasi:**
    ```bash
    php artisan key:generate
    ```
7.  **Jalankan Migrasi Database:**
    ```bash
    php artisan migrate
    ```
8.  **Compile Aset Frontend:**
    *   Untuk pengembangan:
      ```bash
      npm run dev
      ```
    *   Untuk produksi:
      ```bash
      npm run build
      ```
9.  **Jalankan Server Pengembangan:**
    ```bash
    php artisan serve
    ```
10. **Akses Aplikasi:**
    *   Buka browser Anda dan kunjungi `http://127.0.0.1:8000/hrd` untuk melihat aplikasi.

## Pengembangan Lebih Lanjut yang Mungkin Dilakukan

*   Implementasi sistem otentikasi dan otorisasi untuk peran Admin dan Karyawan.
*   Membangun antarmuka pengguna (UI) yang lebih lengkap dan interaktif untuk setiap fitur menggunakan komponen Vue yang telah dibuat.
*   Menambahkan fungsionalitas CRUD (Create, Read, Update, Delete) yang lengkap pada setiap komponen Vue dengan menghubungkannya ke API yang sudah ada.
*   Menambahkan fitur notifikasi (misalnya, notifikasi email untuk pengajuan cuti).
*   Membuat dasbor analitik untuk HRD.
*   Menambahkan unit test dan feature test untuk memastikan kualitas kode.
