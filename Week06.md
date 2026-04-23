**Nama:** Reny Ambarwati 
**NIM:** 244107020066
**Kelas:** TI-2F

## Laporan Jobsheet 1: Implementasi Form Elements & Resource Post di Filament1

# 1. Tujuan Praktikum
Setelah mengikuti praktikum ini, mahasiswa diharapkan mampu:
Membuat Resource Post di framework Filament
Mengimplementasikan berbagai komponen formulir (Form Components).
Menghubungkan komponen Select dengan relasi database (Category).
Mengelola unggahan file (File Upload) dan menampilkannya kembali dalam tabel menggunakan Image Column.
Menampilkan data relasi pada tabel admin.

# 2. Langkah Kerja
A. Pembuatan Resource Post
Menjalankan perintah php artisan make:filament-resource Post.
Konfigurasi awal: Model attribute menggunakan title, serta tidak men-generate halaman read-only maupun konfigurasi otomatis dari database.
![alt text](image.png)

B. Implementasi Form Elements (File: PostForm.php)
Berbagai elemen formulir ditambahkan untuk memperkaya input data, antara lain:
Text Input: Digunakan untuk kolom title dan slug.
![alt text](image-1.png)

Select (Relasi Category): Menggunakan relationship('category', 'name') untuk mengambil data dari tabel kategori.
![alt text](image-2.png)

Color Picker: Untuk memilih warna secara visual.
Editor: Menggunakan MarkdownEditor atau RichEditor untuk mengisi konten tubuh (body).
File Upload: Mengatur unggahan gambar ke disk public di direktori posts.
Tags Input: Digunakan untuk input tag (memerlukan casting array pada model).
Checkbox & DateTimePicker: Digunakan untuk status publikasi (published) dan waktu tayang (published_at).
![alt text](image-3.png)

C. Menampilkan Data pada Tabel (File: PostsTable.php)
Untuk menampilkan data yang telah diinput, kolom berikut dikonfigurasi:
TextColumn: Untuk title, slug, dan relasi category.name.
ColorColumn: Menampilkan pratinjau warna.
ImageColumn: Menampilkan pratinjau gambar yang diunggah.
![alt text](image-4.png)

D. Konfigurasi Tambahan
Storage Link: Menjalankan php artisan storage:link agar gambar yang diunggah di folder storage dapat diakses oleh publik/browser.
Redirect: Menambahkan fungsi getRedirectUrl() pada CreatePost.php dan EditPost.php agar pengguna diarahkan kembali ke halaman indeks setelah menyimpan data.

# 3. Analisis & Diskusi

    1. Fungsi storage:link: Diperlukan untuk menghubungkan folder penyimpanan internal (storage/app/public) ke folder yang dapat diakses publik (public/storage) sehingga file seperti gambar dapat ditampilkan di browser.21
    3. Relasi pada Tabel: Penggunaan category.name (bukan category_id) bertujuan untuk menampilkan informasi yang mudah dibaca oleh manusia (nama kategori) daripada sekadar ID angka.22
    3. Casting JSON: Field seperti tags memerlukan $casts ke array agar Filament dapat menyimpan dan membaca format JSON dari database dengan benar.23

## 4. Tugas Praktikum
![alt text](![alt text](image-6.png))

## 5. Kesimpulan
Praktikum ini berhasil mengimplementasikan sistem manajemen postingan yang kompleks menggunakan Filament. Mahasiswa telah menguasai penggunaan elemen formulir tingkat lanjut (seperti editor teks dan pengunggah file), manajemen relasi database dalam UI admin, serta konfigurasi teknis penyimpanan file di Laravel.



