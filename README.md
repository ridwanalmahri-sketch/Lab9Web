# Lab9Web — Aplikasi Pengelolaan Data Barang

**Praktikum 9 | Pemrograman Web | PHP Modular**

## 1. Gambaran Umum

Lab9Web merupakan aplikasi web sederhana untuk mengelola informasi barang menggunakan PHP dan MySQL. Project ini dikembangkan sebagai bagian dari Praktikum 9 dengan menerapkan konsep pemrograman modular.

Dalam pengembangannya, kode aplikasi dipisahkan ke beberapa direktori agar setiap bagian mempunyai tugas yang lebih terarah. Dengan cara ini, pengelolaan tampilan, koneksi database, fungsi pendukung, dan proses pengolahan data dapat dilakukan secara terpisah.

Fitur yang dikembangkan meliputi:

- Menampilkan daftar barang.
<img width="1919" height="990" alt="Screenshot 2026-11-24 013800" src="https://github.com/user-attachments/assets/3953a3fe-25bc-48e0-b6c9-19a264d9dc64" />

- Menambahkan barang baru.
<img width="1919" height="1002" alt="Screenshot 2026-11-24 013821" src="https://github.com/user-attachments/assets/839d44ef-a066-4a00-8844-fe6e8aab2685" />

- Mengubah informasi barang.
<img width="1913" height="1003" alt="Screenshot 2026-11-24 014714" src="https://github.com/user-attachments/assets/cf2432f4-d406-4823-ab5c-a31cfb182956" />

- Menghapus data barang.
<img width="1919" height="985" alt="Screenshot 2026-11-24 014804" src="https://github.com/user-attachments/assets/c01f2a71-cfcc-42ab-ad61-4558f702a785" />

- Menampilkan gambar produk.
<img width="1919" height="990" alt="Screenshot 2026-11-24 013800" src="https://github.com/user-attachments/assets/c3e320a3-715c-4bd3-9fbd-3d8c0a660544" />

- Login dan logout administrator.
<img width="1912" height="983" alt="Screenshot 2026-11-24 013905" src="https://github.com/user-attachments/assets/1c3d2273-528f-4d75-86cb-e47375fa1eeb" />

- Mengatur perpindahan halaman melalui routing.


## 2. Tujuan Pembuatan

Pengerjaan project ini bertujuan untuk:

1. Menerapkan konsep modularisasi pada aplikasi PHP.
2. Memahami penggunaan `include`, `require`, dan `require_once`.
3. Membuat template yang dapat digunakan oleh beberapa halaman.
4. Mengelola fungsi PHP melalui file helper.
5. Mengelompokkan file berdasarkan kegunaannya.
6. Membuat sistem routing dengan parameter URL.
7. Menghubungkan aplikasi modular dengan database MySQL.

## 3. Teknologi dan Perangkat

Perangkat yang digunakan dalam pengembangan aplikasi:

| Teknologi | Kegunaan |
|---|---|
| PHP | Bahasa pemrograman aplikasi |
| MySQL | Penyimpanan data |
| MySQLi | Penghubung PHP dengan database |
| XAMPP | Lingkungan server lokal |
| Apache | Menjalankan aplikasi web |
| phpMyAdmin | Mengelola database |
| Visual Studio Code | Menulis dan mengedit kode |
| Google Chrome | Menguji aplikasi |

## 4. Susunan Direktori

Project disusun dengan pembagian folder sebagai berikut:

<img width="402" height="748" alt="Screenshot 2026-11-24 014255" src="https://github.com/user-attachments/assets/e12613e7-8556-46b8-bbe7-ee5ed5af5e47" />


### Kegunaan setiap bagian

- `assets/`: tempat menyimpan file pendukung seperti CSS, JavaScript, dan gambar produk.
- `config/`: menyimpan pengaturan koneksi database.
- `helpers/`: berisi fungsi umum yang dapat dipanggil oleh beberapa halaman.
- `modules/auth/`: menangani autentikasi administrator.
- `modules/user/`: menangani pengelolaan data barang.
- `views/`: menyimpan template dan halaman utama aplikasi.
- `index.php`: menjadi pusat pengaturan halaman melalui routing.
- `.htaccess`: menyediakan aturan URL rewrite Apache.
- `data_barang.sql`: berkas SQL untuk kebutuhan data barang.

## 5. Tahapan Pengembangan

### A. Persiapan lingkungan kerja

Pengembangan dilakukan menggunakan XAMPP sebagai server lokal. Apache dan MySQL dijalankan sebelum aplikasi diakses melalui browser.

### B. Pembuatan template

Bagian tampilan dipisahkan menjadi header dan footer. Kedua komponen tersebut digunakan kembali agar halaman aplikasi mempunyai susunan antarmuka yang konsisten.

### C. Pengelolaan fungsi PHP

Fungsi yang sering digunakan ditempatkan dalam `helpers/functions.php`. Tujuannya untuk mengurangi pengulangan kode dan memudahkan pemeliharaan aplikasi.

### D. Pengaturan database

Konfigurasi koneksi database diletakkan pada `config/database.php`. Aplikasi menggunakan MySQLi untuk berkomunikasi dengan database MySQL.

Database project yang digunakan adalah `db_lab9web`.

### E. Pembuatan routing

File `index.php` digunakan untuk menentukan halaman berdasarkan parameter `page`.

Daftar halaman yang diperbolehkan ditentukan melalui whitelist. Dengan demikian, aplikasi hanya memuat file yang sudah didaftarkan.

### F. Pengembangan modul barang

Fitur pengelolaan barang dikelompokkan dalam direktori `modules/user/`. Setiap file mempunyai tanggung jawab tersendiri, mulai dari menampilkan hingga mengolah data barang.

### G. Pengelolaan autentikasi

Fitur login dan logout ditempatkan di direktori `modules/auth/`. Session PHP digunakan untuk mengelola status pengguna yang sedang masuk ke aplikasi.

## 6. Cara Menjalankan Aplikasi

Untuk menjalankan project secara lokal, ikuti langkah berikut:

1. Pastikan XAMPP telah terpasang di komputer.
2. Salin folder `Lab9Web` ke direktori `htdocs`.
3. Buka XAMPP Control Panel.
4. Aktifkan Apache dan MySQL.
5. Buka phpMyAdmin melalui browser.
6. Pastikan database `db_lab9web` tersedia.
7. Periksa konfigurasi koneksi pada `config/database.php`.
8. Buka browser dan masukkan alamat:

```text
http://localhost/Lab9Web/
```

9. Lakukan login administrator apabila diminta.
10. Setelah berhasil masuk, gunakan menu navigasi untuk membuka fitur aplikasi.

## 7. Daftar Alamat Halaman

Aplikasi menggunakan parameter `page` untuk mengakses setiap modul.

| Halaman | Alamat |
|---|---|
| Dashboard | `index.php` |
| Login | `index.php?page=auth/login` |
| Logout | `index.php?page=auth/logout` |
| Daftar barang | `index.php?page=user/list` |
| Tambah barang | `index.php?page=user/add` |
| Edit barang | `index.php?page=user/edit&id=1` |
| Hapus barang | `index.php?page=user/delete&id=1` |

Alamat edit dan hapus memerlukan ID barang yang sesuai. Penghapusan data harus dilakukan melalui proses POST, bukan sekadar membuka URL.

## 8. Pengujian Aplikasi

Pengujian dilakukan secara bertahap untuk memeriksa fungsi setiap bagian aplikasi.

| No. | Bagian yang diuji | Keterangan |
|---|---|---|
| 1 | Dashboard | Memeriksa tampilan halaman utama |
| 2 | Login | Memeriksa proses autentikasi |
| 3 | Logout | Memastikan session berakhir |
| 4 | Daftar barang | Memeriksa data dari database |
| 5 | Tambah barang | Menguji penyimpanan data baru |
| 6 | Edit barang | Menguji perubahan data |
| 7 | Hapus barang | Menguji penghapusan data |
| 8 | Routing | Memeriksa perpindahan halaman |
| 9 | Halaman 404 | Memeriksa rute yang tidak terdaftar |

Hasil setiap pengujian akan didokumentasikan menggunakan screenshot setelah fitur terkait berhasil dijalankan.

## 9. Kendala Selama Pengembangan

Beberapa kendala yang ditemukan dan perlu diperhatikan selama pengerjaan:

1. **Kesalahan koneksi database**

   Periksa kembali nama database, username, password, dan konfigurasi koneksi MySQLi.

2. **Fungsi PHP tidak ditemukan**

   Pastikan nama fungsi yang dipanggil sama dengan nama fungsi yang dideklarasikan dalam file helper.

3. **Gambar barang tidak tampil**

   Periksa nama file gambar, ekstensi, lokasi penyimpanan, dan alamat pemanggilannya.

4. **Halaman tidak dapat diakses**

   Periksa daftar whitelist pada `index.php` serta kesesuaian nilai parameter `page`.

5. **File helper dimuat berulang**

   Gunakan `require_once` untuk mencegah pemuatan file inti lebih dari satu kali.

## 10. Kesimpulan

Melalui Praktikum 9, konsep PHP Modular diterapkan dengan membagi aplikasi ke dalam beberapa bagian sesuai kegunaannya. Pemisahan konfigurasi, helper, template, dan modul fitur membuat susunan program lebih terorganisasi.

Penggunaan routing juga membantu mengatur akses halaman melalui satu file utama. Sementara itu, integrasi dengan MySQL memungkinkan aplikasi melakukan pengelolaan informasi barang.

Project ini menjadi latihan untuk memahami bagaimana sebuah aplikasi PHP dapat disusun secara modular sehingga lebih mudah diperiksa, dikembangkan, dan dipelihara.

---

**Praktikum 9 — Pemrograman Web**


