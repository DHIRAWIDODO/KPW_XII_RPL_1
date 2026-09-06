<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Syarat & Ketentuan</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 40px auto; line-height: 1.6; padding: 0 20px; }
        h1 { font-size: 24px; }
        h2 { font-size: 18px; margin-top: 24px; }
        .btn-back { display: inline-block; margin-top: 30px; padding: 8px 16px; background: #333; color: #fff; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Syarat & Ketentuan</h1>
    <p>Terakhir diperbarui: {{ date('d F Y') }}</p>

    <h2>1. Penggunaan Sistem</h2>
    <p>Sistem ini digunakan untuk mengelola data film, genre, kritik/ulasan, dan pemeran (cast). Pengguna wajib menggunakan akun sesuai dengan hak akses (admin/user) yang diberikan.</p>

    <h2>2. Konten Ulasan/Kritik</h2>
    <p>Pengguna bertanggung jawab atas isi kritik atau ulasan yang ditulis. Konten yang mengandung SARA, kebencian, atau spam tidak diperbolehkan dan dapat dihapus oleh admin.</p>

    <h2>3. Hak Akses</h2>
    <p>Admin memiliki akses penuh untuk mengelola data film, genre, cast, dan pengguna. User biasa hanya dapat melihat data dan menulis kritik/ulasan sesuai profil masing-masing.</p>

    <h2>4. Tanggung Jawab Akun</h2>
    <p>Pengguna bertanggung jawab menjaga kerahasiaan akun dan wajib melaporkan jika terjadi penyalahgunaan.</p>

    <h2>5. Perubahan Ketentuan</h2>
    <p>Ketentuan ini dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya.</p>

    <a href="{{ route('login') }}" class="btn-back">Kembali ke Login</a>
</body>
</html>