## NAMA: RENY AMBARWATI
## NIM: 244107020066
## KELAS:TI-2F
## ABSEN: 25

## Laporan Jobsheet 1 – Implementasi Wizard Form (Multi Step Form) di Filament

# A. Pendahuluan
Praktikum ini bertujuan untuk mengimplementasikan Wizard Form (Multi Step Form) pada Framework Filament untuk mempermudah pengisian data form yang panjang dan kompleks, seperti form produk pada e-commerce.
# B. Langkah-langkah Praktikum
1. Pembuatan Struktur Database dan Model
Langkah pertama adalah membuat file migration untuk tabel produk, mendefinisikan kolom sesuai kebutuhan (name, sku, description, price, stock, image, is_active, is_featured), menjalankan migrasi database, dan membuat Model Product.
php artisan make:migration create_products_table
php artisan migrate
php artisan make:model Product

2. Membuat Resource Product
Resource product dibuat menggunakan perintah Filament dengan menentukan attribute utama (name) dan tidak meng-generate langsung dari database agar bisa dikustomisasi secara manual.
php artisan make:filament-resource Product
![alt text](image.png)

3. Implementasi Wizard Form
Modifikasi pada file ProductForm.php dilakukan dengan menggunakan komponen Wizard::make() yang membagi form menjadi 3 tahap:
Product Info: Berisi field Name dan SKU dalam 2 kolom, serta Description (MarkdownEditor) dengan ukuran penuh.
Pricing & Stock: Berisi field Price dan Stock dengan validasi tipe data numerik (numeric) dan wajib diisi (required).
Media & Status: Berisi field Image menggunakan FileUpload (menyimpan di public disk), is_active, dan is_featured (Checkbox).
![alt text](image-1.png)

4. Kustomisasi Tombol Submit
Menambahkan action custom untuk submit (Save Product) pada bagian akhir Wizard dan menghilangkan default button pada method getFormActions() di file CreateProduct.php.
![alt text](image-2.png)

5. Menampilkan Data di Tabel
Memodifikasi ProductsTable.php untuk menampilkan kolom data produk seperti nama, sku, harga, stok, dan gambar (menggunakan ImageColumn dengan disk public).
![alt text](image-3.png)

# C. Jawaban Analisis & Diskusi
1. Mengapa Wizard Form lebih baik untuk form panjang?
Wizard form membagi form panjang menjadi beberapa langkah (chunk) kecil yang logis. Hal ini mengurangi beban kognitif pengguna, membuat form tidak terlihat mengintimidasi, dan membantu memandu user menyelesaikan isian secara berurutan.

2. Kapan kita menggunakan skippable()?
Method skippable() digunakan ketika sebuah step bersifat opsional atau informasinya bisa ditunda pengisiannya. Pengguna diizinkan melewati langkah tersebut dan langsung menuju langkah berikutnya tanpa memicu validasi error.

3. Apa kelebihan multi step dibanding single form panjang?
Multi step form meningkatkan tingkat penyelesaian (conversion rate) karena progresnya terukur (menggunakan progress bar/step indikator), validasi error ditangani secara parsial per langkah (mencegah error menumpuk di akhir submit), serta pengelompokan datanya lebih terstruktur.

4. Apakah wizard cocok untuk semua jenis form?
Tidak. Wizard form kurang cocok untuk form yang singkat (misalnya form login, registrasi dasar, atau pencarian) karena justru akan menambah durasi klik dan menurunkan efisiensi antarmuka.

# D. Kesimpulan
Melalui praktikum ini, telah berhasil diimplementasikan Wizard Form pada Filament. Pendekatan ini terbukti sangat efektif untuk mengelola alur input data produk e-commerce yang kompleks. Proses validasi per step dan kustomisasi aksi berjalan dengan lancar, memberikan pemahaman mengenai pembuatan antarmuka aplikasi panel admin yang profesional dan user-friendly.


## Laporan Jobshee 2 – Implementasi Info List Element for View Page

# A. Pendahuluan
Praktikum ini bertujuan untuk mengimplementasikan Info List pada Framework Filament. Penggunaan Info List ini ditujukan untuk mengubah halaman detail (View Page) yang tadinya berbentuk form input menjadi tampilan display informasi yang bersifat read-only dan lebih profesional .
B. Langkah-langkah Praktikum & Implementasi Kode
Implementasi Info List dilakukan dengan menggunakan berbagai komponen Entry dari Filament untuk menyusun layout pada halaman View .
1. Membuat Section: Product Info
Section::make('Product Info')
    ->schema([
        TextEntry::make('name')
            ->label('Product Name')
            ->weight('bold')
            ->color('primary'),
        TextEntry::make('id')
            ->label('Product ID'),
        TextEntry::make('sku')
            ->label('Product SKU')
            ->badge()
            ->color('warning'), 
        TextEntry::make('description')
            ->label('Product Description'),
    ])
    ->columnSpanFull(),

    ![alt text](image-4.png)


2. Membuat Section: Pricing & Stock
Section::make('Pricing & Stock')
    ->schema([
        TextEntry::make('price')
            ->label('Product Price')
            ->icon('heroicon-o-currency-dollar')
            ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')), 
        TextEntry::make('stock')
            ->label('Product Stock')
            ->icon('heroicon-o-cube'), 
    ]),

    ![alt text](image-5.png)


3. Membuat Section: Media & Status
Section::make('Media & Status')
    ->schema([
        ImageEntry::make('image')
            ->label('Product Image')
            ->disk('public'),
        IconEntry::make('is_active')
            ->label('Is Active')
            ->boolean(),
        IconEntry::make('is_featured')
            ->label('Is Featured')
            ->boolean(),
        TextEntry::make('created_at')
            ->label('Product Creation Date')
            ->date('d M Y')
            ->color('info'),
    ]),

    ![alt text](image-6.png)

# D. Jawaban Analisis & Diskusi
1. Mengapa View Page tidak cocok menggunakan form input?
Karena halaman form input membuat field menjadi editable dan kurang informatif. Halaman detail seharunya bersifat read-only untuk menampilkan informasi record dengan lebih rapi, terstruktur, dan profesional

2. Apa perbedaan TextColumn dan TextEntry?
TextColumn digunakan untuk menampilkan teks pada komponen Table (halaman List), sedangkan TextEntry digunakan untuk menampilkan teks pada komponen Info List (halaman View).

3. Kapan kita menggunakan badge?
Badge digunakan ketika kita ingin menampilkan data dalam bentuk badge yang menonjol secara visual. Ini sangat cocok untuk data pendek yang penting seperti kode SKU, status, atau kategori.

4. Apa keuntungan menggunakan IconEntry untuk boolean?
Keuntungannya adalah dapat menampilkan status boolean menjadi representasi visual icon (contohnya icon check jika true, dan icon silang jika false), sehingga informasi dapat dipahami dengan jauh lebih cepat dan intuitif.

# E. Kesimpulan
Pada pertemuan ini, implementasi Info List telah berhasil mengubah View Page menjadi display data yang profesional dan bersifat read-only. Dengan menggunakan elemen seperti TextEntry, ImageEntry, dan IconEntry, serta melakukan formatting data (color, badge, date), tampilan halaman detail produk menjadi jauh lebih rapi dan terstruktur dibandingkan menggunakan form input biasa.

## Laporan Jobsheet 3 – Implementasi Tabs pada Info List di Filament

# A. Pendahuluan
Praktikum ini bertujuan untuk mengimplementasikan komponen Tabs pada Info List dalam Framework Filament. Jika pada pertemuan sebelumnya kita menggunakan Section yang menampilkan semua data sekaligus dan menyebabkan scroll panjang, penggunaan Tabs membagi informasi menjadi beberapa kategori yang dapat diakses dengan klik, sehingga tampilan halaman View menjadi lebih ringkas dan user-friendly.
# B. Implementasi Kode & Penyelesaian Latihan Praktikum
Sesuai dengan instruksi modul dan latihan praktikum, struktur Section pada ProductInfolist.php telah diubah menjadi Tabs. Kode berikut merupakan implementasi lengkap yang sudah mengakomodasi seluruh instruksi latihan (menambahkan badge dinamis, warna badge berbeda, orientasi vertical, dan icon berbeda tiap tab):
use Filament\Infolists\Components\Tabs;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;

Tabs::make('Product Tabs')
    ->vertical() // Latihan 3: Mengubah tampilan menjadi vertical
    ->tabs([
        // Tab 1: Product Info
        Tabs\Tab::make('Product Info')
            ->icon('heroicon-o-academic-cap') // Latihan 4: Icon berbeda
            ->schema([
                TextEntry::make('name')
                    ->label('Product Name')
                    ->weight('bold')
                    ->color('primary'),
                TextEntry::make('sku')
                    ->label('SKU')
                    ->badge()
                    ->color('success'),
                TextEntry::make('description')
                    ->label('Description'),
            ])
            ->columnSpanFull(),
    ![alt text](image-8.png)
    ![alt text](image-7.png)
// Tab 2: Pricing & Stock
        Tabs\Tab::make('Pricing & Stock')
            ->icon('heroicon-o-currency-dollar') // Latihan 4: Icon berbeda
            // Latihan 1 & 2: Badge dinamis berdasarkan stock dan warna yang berbeda
            ->badge(fn ($record) => $record->stock)
            ->badgeColor(fn ($record) => $record->stock < 10 ? 'danger' : 'info')
            ->schema([
                TextEntry::make('price')
                    ->label('Price')
                    ->icon('heroicon-o-currency-dollar')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextEntry::make('stock')
                    ->label('Stock'),
            ]),
    ![alt text](image-9.png)

        // Tab 3: Media & Status
        Tabs\Tab::make('Media & Status')
            ->icon('heroicon-o-photo') // Latihan 4: Icon berbeda
            ->schema([
                ImageEntry::make('image')
                    ->label('Product Image')
                    ->disk('public'),
                IconEntry::make('is_active')
                    ->label('Active')
                    ->boolean(),
                IconEntry::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
            ]),
    ])
    ->columnSpanFull(),

 ![alt text](image-10.png)
        


# C. Jawaban Analisis & Diskusi
1. Kapan kita menggunakan Tabs dibanding Section?
Tabs sangat ideal digunakan ketika data yang ditampilkan cukup banyak dan terdiri dari beberapa kategori yang logis, sehingga bila menggunakan Section akan menyebabkan pengguna harus melakukan scroll yang sangat panjang ke bawah. Tabs merapikan layout dengan menyembunyikan data yang belum diklik.

2. Apa kelebihan Tabs untuk data panjang?
Kelebihan utamanya adalah membagi informasi menjadi halaman-halaman kecil (chunking). Hal ini tidak hanya mengurangi scrolling, tetapi juga meningkatkan user experience karena pengguna bisa langsung melompat (navigasi klik) ke kategori data spesifik yang mereka butuhkan tanpa melihat tumpukan data lain, menjadikan UI terlihat lebih profesional dan bersih.

3. Apakah Tabs bisa digunakan pada Form juga?
Ya, komponen Tabs di Filament juga dapat digunakan secara penuh di dalam struktur Form, bukan hanya pada Info List. Fungsinya serupa, yaitu untuk mengelompokkan input form yang sangat panjang ke dalam beberapa tab agar lebih rapi.

4. Bagaimana jika tab terlalu banyak?
Jika tab terlalu banyak, tampilan bisa menjadi padat dan membingungkan (terutama di layar berukuran kecil). Solusinya, kita bisa mengelompokkan ulang kategori tersebut agar lebih padat, menggunakan navigasi model lain seperti submenu/dropdown, atau memisahkan data-data yang kompleks ke halaman Relation Managers tersendiri alih-alih memaksakannya di satu halaman utama.

# D. Kesimpulan
Melalui pertemuan praktikum ini, implementasi komponen Tabs pada Info List telah berhasil dilakukan. Transformasi dari Section ke Tabs memberikan perubahan signifikan pada user interface halaman View Page, menjadikannya jauh lebih ringkas, interaktif, dan terstruktur. Penambahan badge dinamis, ikon, dan orientasi vertikal juga semakin meningkatkan kualitas pengalaman pengguna.





