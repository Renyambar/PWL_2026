**Nama:** Reny Ambarwati 
**NIM:** 244107020066
**Kelas:** TI-2F

## Laporan 1: Instalasi Filament

### 1. Tujuan Praktikum
* Memahami konsep dasar Filament sebagai admin panel untuk Laravel.
* Mampu melakukan proses instalasi Filament pada project Laravel yang sudah ada.
* Mampu mengkonfigurasi dan menjalankan Filament panel.

### 2. Langkah Kerja dan Hasil Praktikum
1. **Persiapan Project:** Membuka project Laravel yang sudah ada atau membuat project baru.
2. **Instalasi Paket Filament:** Menjalankan perintah composer untuk menginstal Filament.
   ```bash
   composer require filament/filament:"^3.2" -W
Instalasi Panel: Melakukan instalasi panel admin Filament.

Bash
php artisan filament:install --panels
Pembuatan User Admin: Membuat akun administrator agar bisa login ke dashboard.

Bash
php artisan make:filament-user
(Mengisi Name, Email, dan Password pada terminal)

Pengujian: Menjalankan server php artisan serve dan mengakses http://localhost:8000/admin.

Hasil Screenshot Dashboard:
![Screenshot Dashboard Filament Admin]
(![alt text](Jobsheet5\image.png))

![alt text](Jobsheet5\image1.png)

### Jawaban Analisis & Diskusi: Jobsheet 1 (Instalasi Filament)

1. **Apa kelebihan Filament dibanding membuat admin panel manual?**
   Kelebihan utama Filament adalah efisiensi waktu (*rapid development*). Filament sudah menyediakan UI dashboard, form, tabel, dan sistem autentikasi yang saling terintegrasi. Developer tidak perlu menulis kode *view* (HTML/CSS), *controller*, dan *routing* dari nol untuk setiap fitur, sehingga pengembangan aplikasi menjadi jauh lebih cepat.

2. **Mengapa Filament menggunakan Livewire?**
   Livewire memungkinkan pembuatan antarmuka (UI) yang reaktif dan dinamis hanya dengan menggunakan bahasa PHP, tanpa harus repot mengelola framework JavaScript terpisah (seperti Vue atau React). Ini membuat Filament terasa sangat cepat seperti *Single Page Application* (SPA) namun tetap berjalan murni di ekosistem Laravel.

3. **Apa perbedaan SQLite dan MySQL dalam development?**
   SQLite merupakan database yang sangat ringan dan berbasis file tunggal, sangat cocok untuk tahap awal *development* atau proses instalasi cepat karena tidak memerlukan instalasi *server database* tersendiri. Sedangkan MySQL adalah *Relational Database Management System* (RDBMS) berbasis server yang lebih kuat, tangguh, dan sangat disarankan untuk tahap produksi (*production*) dengan banyak transaksi data.

4. **Apa fungsi Panel Builder?**
    Panel Builder berfungsi untuk menciptakan arsitektur dan struktur dasar dari *admin dashboard*. Panel ini menyediakan kerangka layout, navigasi (*sidebar*), sistem login, dan area utama tempat kita meletakkan fitur CRUD Resource, *widget*, maupun halaman kustom lainnya.

3. Kesimpulan
Proses instalasi Filament berhasil dilakukan dengan lancar. Filament menyediakan kerangka kerja yang sangat cepat untuk membangun antarmuka admin yang terintegrasi dengan ekosistem TALL stack tanpa perlu membuat views secara manual.

## Laporan 2: Membuat CRUD Resource dengan Filament v4 (Jobsheet 2)
1. Tujuan Praktikum
Mampu membuat resource baru di Filament untuk mengelola data dari tabel/Model.

Mampu mengkonfigurasi Form (Create dan Edit) menggunakan komponen Filament.

Mampu mengkonfigurasi Table (List/Read) menggunakan komponen Filament.

2. Langkah Kerja dan Hasil Praktikum
Pembuatan Resource: Menghasilkan file resource berdasarkan Model yang telah dibuat sebelumnya.

Bash
php artisan make:filament-resource NamaModel
Konfigurasi Form Input: Membuka file NamaModelResource.php dan mengatur bagian form(Form $form).

PHP
public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('nama_kolom')->required(),
        Textarea::make('deskripsi'),
    ]);
}
Konfigurasi Tabel: Mengatur bagian table(Table $table) untuk menampilkan data.

PHP
public static function table(Table $table): Table
{
    return $table->columns([
        TextColumn::make('nama_kolom')->searchable()->sortable(),
    ]);
}
Pengujian CRUD: Membuka dashboard admin, masuk ke menu Resource terkait, lalu melakukan uji coba tambah data (Create), lihat data (Read), edit data (Update), dan hapus data (Delete).

Hasil Screenshot Halaman CRUD:
![Screenshot Halaman List Data](![alt text](Jobsheet5\image6.png))

![Screenshot Halaman Create Data](![alt text](Jobsheet5\image-1.png))

![Menampilkan Data User](Jobsheet5\image-2.png)

### Jawaban Analisis & Diskusi: Jobsheet 2 (CRUD Resource)

1. **Mengapa Filament dapat membuat CRUD tanpa banyak coding?**
   Karena Filament bekerja dengan memanfaatkan Model dan sistem ORM bawaan Laravel (Eloquent). Melalui satu perintah `make:filament-resource`, Filament otomatis menghasilkan class PHP terstruktur yang sudah memiliki metode tersembunyi untuk mengeksekusi operasi database (Create, Read, Update, Delete) tanpa mengharuskan developer menulis *query* atau *controller* manual.

2. **Apa perbedaan Form Schema dan Table Schema?**
   - **Form Schema:** Berfungsi untuk mengatur struktur elemen input pada halaman Create dan Edit. Komponennya berupa input field seperti `TextInput`, `Select`, atau `FileUpload`.
   - **Table Schema:** Berfungsi untuk mengatur tampilan antarmuka saat menampilkan daftar data di halaman Read/List. Komponennya berupa kolom tampilan seperti `TextColumn` atau `ImageColumn`.

3. **Bagaimana jika kita ingin menambahkan validasi email unik?**
   Pada pengaturan *Form Schema* di dalam Resource, kita dapat menyisipkan method `->unique()`. Contoh penulisannya: 
   `TextInput::make('email')->email()->unique(ignoreRecord: true)`
   *(Catatan: `ignoreRecord: true` penting agar saat proses Edit data, email yang sama milik user tersebut tidak dianggap duplikat oleh sistem).*

4. **Mengapa password tidak perlu kita hash manual?**
   Laravel versi terbaru sudah memiliki mekanisme otomatis melalui *Casting*. Pada Model User Laravel, biasanya sudah terdapat definisi `protected function casts()` yang mengubah format `'password' => 'hashed'`. Karena Filament menyimpan form secara langsung ke Model, sistem otomatis mengubah input teks biasa (plain text) menjadi kode *Bcrypt* sebelum masuk ke database.

---

3. Kesimpulan
Filament membuat proses pembuatan fitur CRUD menjadi sangat efisien. Konfigurasi formulir (form) dan tabel (table) dilakukan menggunakan metode fluent API di PHP, sehingga menghemat banyak waktu dibandingkan harus menulis kode HTML, form validation, dan controller secara manual.



## Laporan 3: Migrasi dan Model (Jobsheet 3)

1. Tujuan Praktikum
Mampu merancang struktur database menggunakan skema Migrasi Laravel.

Mampu membuat dan menghubungkan Model Eloquent dengan tabel database.

Memahami pengaturan mass assignment ($fillable).

2. Langkah Kerja dan Hasil Praktikum
Pembuatan File: Membuat Model sekaligus file Migration-nya menggunakan perintah Artisan.

Bash
php artisan make:model NamaModel -m
Definisi Skema (Migration): Menulis definisi kolom pada file migrasi di direktori database/migrations/.

PHP
// Contoh isi method up()
$table->string('nama_kolom');
$table->text('deskripsi')->nullable();
Eksekusi Migrasi: Menjalankan migrasi agar tabel terbuat di database MySQL.

Bash
php artisan migrate
Konfigurasi Model: Menambahkan properti $fillable pada Model di app/Models/ agar data dapat diinput.

PHP
protected $fillable = ['nama_kolom', 'deskripsi'];
Hasil Screenshot Struktur Tabel / phpMyAdmin:
![Screenshot Database](![alt text](Jobsheet5\image31.png))

![alt text](Jobsheet5\image32.png)

![alt text](Jobsheet5\image33.png)

![alt text](Jobsheet5\image34.png)

### Jawaban Analisis & Diskusi: Jobsheet 3 (Migrasi dan Model)

1. **Mengapa kita perlu `$fillable`?**
   Properti `$fillable` pada Model adalah mekanisme keamanan Laravel (*Mass Assignment Protection*). Fungsinya adalah menentukan secara spesifik daftar kolom/field mana saja di dalam tabel database yang diizinkan untuk diisi datanya secara bersamaan (massal) melalui formulir aplikasi.

2. **Apa fungsi `$casts` pada Laravel?**
   Fungsinya adalah mengonversi (*casting*) tipe data secara otomatis ketika diambil dari database ke PHP, maupun sebaliknya saat disimpan. Contoh umum: mengubah tipe `JSON` di database menjadi struktur `Array` di PHP, atau mengonversi `TinyInt(0/1)` di MySQL menjadi `Boolean (true/false)`.

3. **Apa perbedaan integer biasa dengan foreign key?**
   Integer biasa murni digunakan untuk menyimpan data angka. Sedangkan *foreign key* adalah kolom angka/ID yang difungsikan untuk merujuk secara paksa ke sebuah ID (*Primary Key*) di tabel lain. *Foreign key* dikawal oleh sistem *constraint* pada database untuk mencegah adanya data referensi yang tidak jelas (siluman) sehingga integritas data antar-tabel tetap terjaga.

4. **Bagaimana jika category dihapus tetapi masih ada post?**
   Hal ini sangat bergantung pada aksi `onDelete` yang didefinisikan pada file *migration* Post. Terdapat tiga skenario umum:
   - Jika `onDelete('cascade')`: Seluruh post yang memiliki category tersebut akan ikut terhapus agar tidak ada data "menggantung".
   - Jika `onDelete('restrict')`: Sistem database akan menolak penghapusan Category dan menampilkan *error* karena masih ada post yang menggunakannya.
   - Jika `onDelete('set null')`: Category akan terhapus, namun pada tabel Post, field `category_id`-nya akan berubah isinya menjadi NULL (data post aman).

3. Kesimpulan
Penggunaan fitur Migration mempermudah pelacakan perubahan struktur database (version control), sementara Model Eloquent mempermudah interaksi dengan database MySQL menggunakan pendekatan Object-Oriented. Keduanya adalah syarat wajib sebelum membuat CRUD Resource.


