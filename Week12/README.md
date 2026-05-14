## NAMA: RENY AMBARWATI
## NIM: 244107020066
## KELAS:TI-2F
## ABSEN: 25

## Laporan Praktikum: Pertemuan 12 – Implementasi Toggle Column pada Table Filament

# A. Pendahuluan
Praktikum pada pertemuan ke-12 ini membahas implementasi ToggleColumn pada framework Filament. Komponen ini digunakan untuk menampilkan data boolean dalam bentuk sakelar (toggle switch) yang interaktif, memungkinkan pengguna untuk mengubah status data secara langsung dari halaman tabel tanpa harus masuk ke halaman form Edit.

# B. Implementasi Kode & Penyelesaian Latihan
Sesuai dengan instruksi praktikum, implementasi dilakukan pada kolom yang bertipe boolean, seperti status aktif atau status unggulan pada data.
1. Mengubah IconColumn menjadi ToggleColumn
Kolom is_active dan is_featured yang sebelumnya mungkin menggunakan IconColumn atau TextColumn diubah menjadi ToggleColumn di dalam file resource tabel (misalnya ProductResource.php atau PostResource.php).
use Filament\Tables\Columns\ToggleColumn;

// Di dalam array columns()
ToggleColumn::make('is_active')
    ->label('Status Aktif')
    ->sortable(),

ToggleColumn::make('is_featured')
    ->label('Unggulan')
    ->sortable(),


2. Pengujian Interaksi
Setelah diimplementasikan, pengguna dapat langsung mengklik sakelar pada baris data di tabel. Perubahan akan langsung disimpan ke database secara otomatis secara real-time menggunakan AJAX.
(Catatan: Pengujian telah dilakukan. Screenshot keadaan tabel sebelum dan sesudah toggle diubah akan dilampirkan).

# C. Jawaban Analisis & Diskusi
1. Apa keuntungan menggunakan ToggleColumn dibandingkan mengedit lewat form?
Keuntungan utamanya adalah efisiensi waktu dan peningkatan User Experience (UX). Pengguna (seperti admin) sering kali hanya perlu mengubah satu status (misalnya menonaktifkan produk atau mempublikasikan artikel). Membuka form Edit, mencari field status, lalu menyimpannya memakan banyak waktu dan klik. ToggleColumn memungkinkan perubahan instan dengan satu klik langsung di tampilan list.

2. Apakah ToggleColumn memicu perubahan langsung ke database?
Ya. Filament secara bawaan mengirimkan permintaan (request) livewire atau AJAX ke server setiap kali toggle diklik, yang langsung meng-update record tersebut di database tanpa perlu menekan tombol "Simpan" tambahan.

3. Tipe data apa yang didukung oleh ToggleColumn?
ToggleColumn dirancang khusus untuk tipe data boolean (true/false) atau representasi numeriknya (1/0) yang biasa disimpan dalam tipe kolom BOOLEAN atau TINYINT(1) di MySQL.

4. Bagaimana menangani keamanan jika sembarang orang mengklik toggle?
Secara default, jika pengguna memiliki izin (permissions) untuk mengedit resource tersebut (melalui policy), mereka bisa menggunakan toggle. Jika aksi tersebut krusial, sebaiknya menggunakan Actions biasa dengan konfirmasi (requiresConfirmation), atau menyembunyikan toggle untuk pengguna dengan peran (role) tertentu.

# D. Kesimpulan
Implementasi ToggleColumn pada tabel Filament sangat berguna untuk mempercepat proses manajemen data yang melibatkan field berstatus aktif/non-aktif atau true/false. Fitur ini mengurangi jumlah interaksi yang diperlukan untuk melakukan pembaruan sederhana, sehingga membuat panel administrasi menjadi lebih responsif dan efisien digunakan.
