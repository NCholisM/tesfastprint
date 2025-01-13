# TES FAST PRINT

## Deskripsi Proyek

Proyek ini adalah implementasi CRUD (Create, Read, Update, Delete) menggunakan framework CodeIgniter 3. Aplikasi ini memanfaatkan data dari API eksternal dan menyimpannya ke dalam database MySQL. Fitur utama aplikasi ini meliputi:

- Menampilkan data produk dari database.
- Menampilkan produk dengan status "bisa dijual".
- CRUD produk (Tambah, Edit, Hapus) dengan validasi input.
- Konfirmasi sebelum menghapus data.

## Fitur Utama

1. **Mengambil Data dari API**: Mengambil data produk, kategori, dan status dari API eksternal.
2. **Menyimpan Data ke Database**: Data produk disimpan ke dalam tabel produk, kategori, dan status.
3. **Menampilkan Data**: Menampilkan semua produk dan memfilter produk dengan status "bisa dijual".
4. **CRUD Produk**:
   - **Tambah**: Tambah produk baru dengan validasi form.
   - **Edit**: Edit produk yang sudah ada dengan validasi form.
   - **Hapus**: Menghapus produk dengan konfirmasi.
5. **Validasi Form**:
   - Nama produk harus diisi.
   - Harga produk harus berupa angka.

## Teknologi yang Digunakan

- **Framework**: CodeIgniter 3
- **Database**: MySQL 
- **Bahasa Pemrograman**: PHP
- **Library**: Bootstrap 5 untuk tampilan

## Struktur Database

### Tabel Produk

| Nama Kolom   | Tipe Data  | Deskripsi                  |
|--------------|------------|----------------------------|
| id_produk    | INT (PK, AUTO) | ID produk                 |
| nama_produk  | VARCHAR(255)   | Nama produk               |
| harga        | FLOAT      | Harga produk               |
| kategori_id  | INT (FK)  | Foreign key ke tabel kategori |
| status_id    | INT (FK)  | Foreign key ke tabel status  |

### Tabel Kategori

| Nama Kolom   | Tipe Data  | Deskripsi              |
|--------------|------------|------------------------|
| id_kategori  | INT (PK)   | ID kategori            |
| nama_kategori| VARCHAR(255) | Nama kategori         |

### Tabel Status

| Nama Kolom   | Tipe Data  | Deskripsi              |
|--------------|------------|------------------------|
| id_status    | INT (PK)   | ID status              |
| nama_status  | VARCHAR(255) | Nama status           |

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/NCholisM/tesfastprint.git
cd tesfastprint
```

### 2. Instalasi Database

- Import file SQL yang telah disediakan: `database.sql`.
- Atur konfigurasi database di `application/config/database.php`:

```php
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'tesfastprint',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
```

### 3. Konfigurasi API

- Pastikan API URL tersedia.
- Sesuaikan endpoint di controller `Produk.php`:

```php
$api_url = 'https://tesfastprint/api/produk';
```

### 4. Jalankan Aplikasi

- Akses aplikasi melalui browser:

```bash
http://localhost/tesfastprint/produk
```

## Cara Penggunaan

### 1. Menampilkan Data Produk

- Halaman utama menampilkan semua produk yang sudah tersimpan.

### 2. Menambah Produk

- Klik tombol Tambah Produk.
- Isi form dengan validasi:
  - Nama produk wajib diisi.
  - Harga harus berupa angka.
- Klik Simpan untuk menyimpan data.

### 3. Mengedit Produk

- Klik tombol Edit pada produk tertentu.
- Ubah data yang diperlukan sesuai validasi.
- Klik Simpan untuk memperbarui data.

### 4. Menghapus Produk

- Klik tombol Hapus pada produk tertentu.
- Muncul dialog konfirmasi, klik OK untuk menghapus data.

## Dokumentasi Video


