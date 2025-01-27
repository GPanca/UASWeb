# Aplikasi Berbasis Web Data Kendaraan Bermotor di Jawa Barat

## Gambaran Umum
Aplikasi berbasis web untuk **data kendaraan bermotor di Jawa Barat** adalah sebuah aplikasi yang dibuat menggunakan Laravel. Aplikasi ini dirancang untuk mengelola data kendaraan dengan menyediakan antarmuka dan fungsionalitas yang berbeda untuk dua jenis pengguna: **Admin** dan **Pengguna**. Admin memiliki kontrol penuh atas data, termasuk kemampuan untuk menambah, mengubah, dan menghapus data, sedangkan pengguna hanya memiliki akses untuk melihat data kendaraan.

---

## Fitur

### 1. **Dashboard Admin**
- **Lihat Semua Data:** Admin dapat melihat semua data kendaraan dalam format tabel.
- **Tambah Data Baru:** Formulir dalam modal untuk memasukkan dan menyimpan data kendaraan baru.
- **Edit Data:** Formulir dalam modal untuk memperbarui data kendaraan yang sudah ada.
- **Hapus Data:** Tombol hapus dengan konfirmasi untuk menghapus data dari database.

### 2. **Dashboard Pengguna**
- **Lihat Data:** Pengguna dapat melihat data kendaraan dalam format hanya baca.
- **UI Sederhana dan Informatif:** Tata letak yang bersih memungkinkan pengguna fokus pada data.

### 3. **Autentikasi**
- Autentikasi pengguna memastikan bahwa hanya pengguna yang berwenang dapat mengakses aplikasi.
- Kontrol akses berbasis peran menentukan apakah pengguna melihat dashboard admin atau pengguna.

### 4. **Fungsionalitas CRUD**
Aplikasi ini mengimplementasikan operasi Create, Read, Update, dan Delete untuk mengelola data kendaraan.

### 5. **Fitur Logout**
Pengguna dapat keluar dari aplikasi dengan aman.

---

## Teknologi yang Digunakan

- **Framework Backend:** Laravel
- **Framework Frontend:** Bootstrap (untuk desain antarmuka dan responsivitas)
- **Database:** MySQL
- **Autentikasi:** Autentikasi bawaan Laravel

---

## Instalasi

### Prasyarat
- PHP ≥ 8.0
- Composer
- MySQL
- Server web (misalnya, Apache, Nginx)

### Langkah-langkah
1. Clone repository:
   ```bash
   git clone <repository-url>
   ```
2. Pindah ke direktori proyek:
   ```bash
   cd <project-directory>
   ```
3. Install dependensi:
   ```bash
   composer install
   ```
4. Atur file `.env`:
   ```bash
   cp .env.example .env
   ```
   Konfigurasikan database dan variabel lingkungan lainnya di file `.env`.

5. Jalankan migrasi untuk membuat skema database:
   ```bash
   php artisan migrate
   ```
6. Isi database (opsional, jika tersedia seed):
   ```bash
   php artisan db:seed
   ```
7. Jalankan server pengembangan:
   ```bash
   php artisan serve
   ```

---

## Penggunaan

### Admin
1. Login menggunakan akun admin.
2. Navigasikan ke dashboard admin untuk mengelola data kendaraan:
   - Tambah data kendaraan baru.
   - Edit data yang ada.
   - Hapus data yang tidak diperlukan.

### Pengguna
1. Login menggunakan akun pengguna.
2. Lihat data kendaraan dalam format hanya baca.

---

## Struktur Folder

- **Controllers:** `DashboardController`, `VehicleController` mengelola logika bisnis.
- **Views:**
  - `dashboard/admin.blade.php`: Dashboard admin.
  - `dashboard/user.blade.php`: Dashboard pengguna.
- **Models:** Model `Vehicle` berinteraksi dengan database.
- **Routes:** Didefinisikan di `routes/web.php` untuk routing resource dan autentikasi.

---

## Penulis
Aplikasi ini dibuat sebagai bagian dari proyek pengembangan sistem berbasis web. Kritik dan saran sangat diterima!

