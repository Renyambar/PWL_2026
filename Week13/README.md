## NAMA: RENY AMBARWATI
## NIM: 244107020066
## KELAS:TI-2F
## ABSEN: 25

## Laporan Praktikum: Pertemuan 13 – Implementasi Table Actions & Custom Action di Filament

# A. Pendahuluan
Praktikum ini membahas mengenai implementasi Record Actions pada tabel menggunakan framework Filament. Tujuannya adalah untuk meningkatkan efisiensi manajemen data dengan mengelola data (seperti menghapus atau menduplikasi) langsung dari halaman tabel tanpa harus berpindah ke halaman edit.

# B. Implementasi Kode & Latihan Praktikum
Berikut adalah langkah-langkah implementasi sesuai instruksi Latihan Praktikum
1. Menambahkan Delete & Replicate Action
Filament menyediakan action bawaan (predefined actions) yang mudah dipanggil. Pada file PostsTable.php, ditambahkan method DeleteAction::make() dan ReplicateAction::make() pada bagian recordActions.
->recordActions([
    EditAction::make(),
    DeleteAction::make()
        ->icon('heroicon-o-trash'), // Latihan 3: Menambahkan icon
    ReplicateAction::make()
        ->icon('heroicon-o-document-duplicate'), // Latihan 3: Menambahkan icon
])


2. Membuat Custom Action (Toggle Publish/Unpublish)
Dibuat custom action bernama 'status' untuk mengubah status publikasi data secara langsung . Action ini dilengkapi dengan konfirmasi dan ikon khusus.
Action::make('status')
    ->label('Status Change')
    ->icon('heroicon-o-check-circle') // Latihan 3: Menambahkan icon
    ->requiresConfirmation() // Latihan 4: Menambahkan confirmation
    ->schema([
        Checkbox::make('published')
            ->default(fn($record): bool => $record->published),
    ])
    ->action(function ($record, $data) {
        $record->update(['published' => $data['published']]);
    })


# C. Jawaban Analisis & Diskusi
1. Mengapa action di tabel lebih efisien dibanding halaman edit?
Action di tabel menghemat waktu navigasi dan jumlah klik [cite: 1]. Pengguna tidak perlu membuka halaman edit yang memuat keseluruhan form hanya untuk melakukan satu tugas sederhana seperti menghapus (Delete), menyalin (Replicate), atau mengubah satu status [cite: 1]. Hal ini sangat penting untuk meningkatkan efisiensi di admin panel [cite: 1].
2. Apa perbedaan predefined action dan custom action?
Predefined action adalah fungsi bawaan yang sudah disediakan oleh Filament (seperti Create, Edit, View, Delete, Replicate, dll.) dan tidak memerlukan kode logika manual dari pengembang [cite: 1]. Custom action adalah tombol yang dibuat sendiri oleh pengembang (misalnya ubah status Publish/Unpublish) untuk menjalankan aksi spesifik atau query tertentu dengan menambahkan schema form input dan logika update secara manual [cite: 1].
3. Bagaimana cara menambahkan validasi dalam custom action?
Validasi dapat ditambahkan langsung ke dalam komponen input di dalam method ->schema() dari custom action, contohnya dengan merangkai modifier seperti ->required(), ->numeric(), atau aturan validasi kustom lainnya sebelum data diproses dalam ->action().
4. Kapan kita menggunakan Replicate?
Action Replicate digunakan ketika kita ingin membuat record atau data baru yang sebagian besar atributnya sama dengan data yang sudah ada [cite: 1]. Ini berfungsi sebagai fitur "Copy Data" (menduplikasi data) yang mempercepat proses input karena pengguna hanya perlu mengubah beberapa field spesifik tanpa harus mengisi form dari awal [cite: 1].
# D. Kesimpulan
Melalui praktikum ini, telah berhasil diimplementasikan fitur Table Actions di Filament, meliputi penggunaan action bawaan seperti Delete dan Replicate, serta pembuatan Custom Action dengan form input [cite: 1]. Penggunaan fitur-fitur ini beserta penambahan konfirmasi dan label ikon mampu memperbarui data langsung dari tabel secara cepat, sehingga efisiensi manajemen data di panel admin meningkat secara signifikan [cite: 1].


References
13.JOBSHEET PRAKTIKUM-Table Actions in Defth
