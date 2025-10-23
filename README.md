🎤 ZefArchive - Mini Katalog

Project ini adalah mini-proyek UTS untuk mata kuliah Pemrograman Web (Laravel).
Website ini menampilkan katalog artis yang dapat diakses oleh penggemar dengan fitur utama login, dashboard berisi profil dan diskografi, serta pengelolaan daftar favorit.

✅ Halaman Utama
Login:
Form untuk masuk sebagai penggemar. Username dikirim via query parameter setelah submit.
Dashboard:
Menampilkan profil artis, diskografi, dan galeri foto.
Album:
Menampilkan detail album seperti judul, cover, daftar lagu, makna lagu, link pembelian merch, link Spotify & YouTube.
Pengelolaan:
Menampilkan dan mengelola daftar lagu/album favorit (berbasis array, tanpa database).
Profile:
Menampilkan data pengguna (username) yang dikirim saat login.

🛠️ Teknologi & Ketentuan yang Digunakan
✅ Framework: Laravel (no starter kit)
✅ Blade Template
✅ Layout Master menggunakan:
@extends, @section, @yield, @include
✅ Komponen Blade:
Navbar (resources/views/components/navbar.blade.php)
Footer (resources/views/components/footer.blade.php)
✅ Routing dan Controller menggunakan PageController
✅ List Data (array) disimpan di Controller
✅ Responsif (opsional — memberikan nilai tambah)
