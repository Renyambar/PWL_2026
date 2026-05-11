## NAMA: RENY AMBARWATI
## NIM: 244107020066
## KELAS:TI-2F
## ABSEN: 25

## Laporan Praktikum: Pertemuan 11 – Implementasi Search & Filter pada Table Filament

# A. Pendahuluan
Praktikum pada pertemuan ke-11 ini berfokus pada implementasi fitur Search (Pencarian) dan Filter pada tabel menggunakan framework Filament. Fitur ini sangat penting dalam manajemen data berskala besar untuk memudahkan pengguna mencari data berdasarkan teks spesifik (seperti judul atau kategori) maupun memfilter data berdasarkan parameter tertentu seperti tanggal dan relasi.

# B. Implementasi Kode & Penyelesaian Latihan

1. Mengaktifkan Search pada 3 Kolom
Untuk mengaktifkan pencarian, method searchable() ditambahkan pada tiga kolom teks di file PostsTable.php.
TextColumn::make('title')
    ->searchable(),
TextColumn::make('slug')
    ->searchable(),
TextColumn::make('category.name')
    ->searchable(),



2. Membuat Filter Tanggal (Created At)
Filter tanggal dibuat menggunakan komponen DatePicker dengan query kustom whereDate() agar dapat menyaring data secara spesifik pada hari tertentu.
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;

// Di dalam array filters()
Filter::make('created_at')
    ->label('Creation Date')
    ->schema([
        DatePicker::make('created_at')
            ->label('Select Date'),
    ])
    ->query(function ($query, $data) {
        return $query->when(
            $data['created_at'],
            fn ($query, $date) => $query->whereDate('created_at', $date)
        );
    }),



3. Membuat Filter Kategori (SelectFilter)
Filter berbasis relasi dibuat menggunakan SelectFilter yang akan otomatis mengambil data dari tabel kategori.
use Filament\Tables\Filters\SelectFilter;

// Di dalam array filters()
SelectFilter::make('category_id')
    ->label('Select Category')
    ->relationship('category', 'name')
    ->preload(),


(Catatan: Pengujian kombinasi Search dan Filter telah dilakukan. Screenshot untuk Search Title, Filter Tanggal, dan Filter Kategori dilampirkan secara terpisah).

# C. Jawaban Analisis & Diskusi
1. Mengapa search tidak cocok untuk filter tanggal?
Search biasanya menggunakan pencarian string (LIKE %...%) yang bekerja secara real-time saat diketik. Format tanggal memiliki aturan spesifik (YYYY-MM-DD), sehingga menggunakan input teks biasa rawan memicu error penulisan format. Tanggal jauh lebih efektif menggunakan komponen DatePicker yang menjamin format yang seragam dan pencarian yang eksak (pasti).

2. Apa fungsi relationship() pada SelectFilter?
Fungsi relationship('category', 'name') adalah untuk memberi tahu Filament agar secara otomatis melakukan query ke tabel relasi (dalam hal ini model category) dan mengambil kolom name untuk ditampilkan sebagai opsi pilihan pada menu dropdown filter, tanpa perlu kita membuat query manual.

3. Mengapa kita perlu whereDate() pada query filter?
Tipe data created_at pada database umumnya adalah TIMESTAMP atau DATETIME yang menyimpan tanggal sekaligus waktu (misal: 2026-05-04 14:30:00). Jika kita hanya menggunakan where('created_at', $date), pencarian akan gagal karena input tanggal hanya berisi 2026-05-04 00:00:00. Perintah whereDate() memastikan query hanya membandingkan bagian tanggalnya saja dengan mengabaikan bagian waktunya.

4. Apa perbedaan searchable() dan filters()?
searchable() digunakan untuk pencarian berbasis teks (string matching) secara global maupun per kolom yang diinput bebas oleh pengguna lewat kolom pencarian. Sedangkan filters() menyediakan UI interaktif (seperti kalender atau dropdown) untuk menyaring data berdasarkan kondisi eksak, kategori tertentu, atau batasan spesifik.

# D. Kesimpulan
Melalui praktikum pertemuan 11 ini, telah berhasil diimplementasikan fitur Search dan Filter pada tabel Filament. Penggunaan searchable() mempermudah pencarian berbasis teks, sementara penggunaan Filter (DatePicker) dan SelectFilter (relasi) memungkinkan penyaringan data yang jauh lebih akurat dan terstruktur. Penggabungan kedua fitur ini secara signifikan meningkatkan efisiensi pengguna dalam mengelola dan mencari data pada panel admin.
