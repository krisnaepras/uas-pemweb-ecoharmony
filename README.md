# UAS Pemweb EcoHarmony

EcoHarmony adalah proyek akhir untuk mata kuliah Pengembangan Web. Proyek ini bertujuan untuk menciptakan platform yang mendukung kesadaran lingkungan dengan berbagai fitur seperti berita, tips, dan manajemen bank sampah.

## Daftar Isi
- [Fitur](#fitur)
- [Screenshoot](#screenshoot)
- [Instalasi](#instalasi)
- [Penggunaan](#penggunaan)


## Fitur
- **Manajemen Pengguna**: CRUD untuk pengguna.
- **Manajemen Bank Sampah**: Fitur untuk mengelola data bank sampah.
- **Berita dan Tips**: Fitur untuk menambahkan berita dan tips terkait lingkungan.
- **Manajemen Transaksi**: Mengelola transaksi yang dilakukan oleh pengguna.

## Screenshot

### Admin (sebagian)
![Admin Screenshot 1](https://ik.imagekit.io/epras/Screenshot%202025-01-04%20020946.png?updatedAt=1735931802004)
![Admin Screenshot 2](https://ik.imagekit.io/epras/Screenshot%202025-01-04%20021008.png?updatedAt=1735931802128)
![Admin Screenshot 3](https://ik.imagekit.io/epras/Screenshot%202025-01-04%20021042.png?updatedAt=1735931801988)

### User (sebagian)
![User Screenshot 1](https://ik.imagekit.io/epras/Screenshot%202025-01-04%20021221.png?updatedAt=1735931801383)
![User Screenshot 2](https://ik.imagekit.io/epras/Screenshot%202025-01-04%20021358.png?updatedAt=1735931802453)
![User Screenshot 3](https://ik.imagekit.io/epras/Screenshot%202025-01-04%20021419.png?updatedAt=1735931802100)

## Instalasi

### Prasyarat
- PHP >= 8.1
- Composer
- Node.js dan npm/yarn
- MySQL Database

### Langkah - langkah
1. Clone repositori ini:
   ```bash
   git clone https://github.com/krisnaepras/laravel-category-product.git
2. Masuk ke direktori proyek:
   ```bash
   cd laravel-category-product
   ```
3. Instal dependensi menggunakan Composer:
   ```bash
   composer install
   ```
4. Instal dependensi menggunakan Composer:
   ```bash
   npm install && npm run build
   ```
5. Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database:
   ```bash
   cp .env.example .env
   ```
6. Buat kunci aplikasi:
   ```bash
   php artisan key:generate
   ```
7. Migrasi database:
   ```bash
   php artisan migrate
   ```
## Penggunaan
Setelah server dijalankan, Anda dapat mengakses aplikasi di http://localhost:8000. Berikut adalah beberapa fitur utama yang dapat digunakan:
- Manajemen Pengguna: Tambah, edit, dan hapus pengguna.
- Manajemen Bank Sampah: Tambah, edit, dan hapus data bank sampah.
- Berita dan Tips: Tambah berita dan tips tentang lingkungan.
- Manajemen Transaksi: Kelola transaksi yang dilakukan oleh pengguna.
