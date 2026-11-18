# My Money Records

## Deskripsi Aplikasi

My Money Records merupakan aplikasi berbasis web yang digunakan untuk membantu pengguna mencatat dan mengelola pengeluaran keuangan sehari-hari. Aplikasi ini dibuat untuk memudahkan pengguna dalam menyimpan data pengeluaran serta melihat ringkasan pengeluaran berdasarkan periode tertentu.

## Tujuan

Tujuan pengembangan aplikasi My Money Records adalah membantu pengguna mengelola pencatatan pengeluaran secara lebih terstruktur, praktis, dan mudah digunakan.

## Fitur Aplikasi

- **Tambah Pengeluaran**: Menambahkan data pengeluaran baru.
- **Lihat Pengeluaran**: Menampilkan daftar pengeluaran yang telah dicatat.
- **Edit Pengeluaran**: Mengubah data pengeluaran.
- **Hapus Pengeluaran**: Menghapus data pengeluaran.
- **Kategori Pengeluaran**: Mengelompokkan pengeluaran berdasarkan kategori.
- **Filter Bulanan**: Menampilkan pengeluaran berdasarkan bulan yang dipilih.
- **Ringkasan Pengeluaran**: Menampilkan total pengeluaran berdasarkan periode tertentu.

## Teknologi yang Digunakan

- PHP
- CodeIgniter 4
- MySQL
- Bootstrap
- HTML dan CSS
- JavaScript

## Database

Aplikasi ini menggunakan database MySQL dengan nama `catatuang_db`.

File database tersedia pada repository dengan nama `catatuang_db.sql`.

## Cara Instalasi dan Menjalankan Aplikasi

1. Pastikan sudah menginstal XAMPP dan Composer.
2. Clone repository berikut:

   ```bash
   git clone https://github.com/musyarrofah23/my_money_records.git
   ```

3. Pindahkan folder project ke direktori `htdocs` pada XAMPP.
4. Buka phpMyAdmin melalui `http://localhost/phpmyadmin`.
5. Buat database dengan nama `catatuang_db`.
6. Import file `catatuang_db.sql` ke database tersebut.
7. Buka folder project dan salin file `env` menjadi `.env` jika belum tersedia.
8. Sesuaikan konfigurasi database pada file `.env`:

   ```ini
   database.default.hostname = localhost
   database.default.database = catatuang_db
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   ```

9. Buka terminal pada folder project, kemudian jalankan:

   ```bash
   composer install
   ```

10. Jalankan aplikasi menggunakan perintah:

    ```bash
    php spark serve
    ```

11. Buka browser dan akses:

    `http://localhost:8080`

## Struktur Database

Tabel utama yang digunakan dalam aplikasi ini adalah `pengeluaran`, dengan beberapa kolom berikut:

| Nama Kolom | Keterangan |
|---|---|
| id_pengeluaran | ID pengeluaran |
| tanggal | Tanggal pengeluaran |
| kategori | Kategori pengeluaran |
| keterangan | Deskripsi pengeluaran |
| nominal | Jumlah pengeluaran |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

## Penggunaan AI

Dalam proses pengembangan aplikasi ini, AI digunakan sebagai alat bantu untuk memperoleh referensi, memahami konsep pemrograman, dan membantu proses penyelesaian kendala teknis. Seluruh kode dan hasil pengembangan tetap diperiksa serta disesuaikan dengan kebutuhan aplikasi.
