<?php
session_start();
// Memulai sesi untuk memungkinkan penyimpanan dan pengelolaan data sesi pengguna.

include 'config.php';
// Mengimpor konfigurasi database untuk memastikan koneksi ke database dapat dilakukan.

$result = $conn->query("SELECT * FROM mahasiswa ORDER BY id DESC LIMIT 1");
// Menjalankan query SQL untuk mengambil data mahasiswa terakhir yang baru saja disubmit.
// Query `ORDER BY id DESC` mengurutkan data berdasarkan `id` dari terbesar ke terkecil.
// `LIMIT 1` memastikan hanya 1 data terakhir yang diambil.

$data = $result->fetch_assoc();
// Mengambil hasil query sebagai array asosiatif sehingga data dapat diakses menggunakan nama kolom.
// Jika tidak ada data, $data akan bernilai `null`.
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      /* Warna latar belakang abu-abu terang untuk tampilan yang bersih. */
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Memberikan efek bayangan lembut pada kartu untuk estetika. */
    }

    .gradient-text {
      background: linear-gradient(to right, #f72585, #7209b7);
      -webkit-background-clip: text;
      /* Efek gradasi pada teks untuk Webkit */
      background-clip: text;
      /* Efek gradasi pada teks untuk standar */
      -webkit-text-fill-color: transparent;
      /* Membuat teks transparan */
    }
  </style>
</head>

<body>
  <!-- Navbar Navigasi -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container">
      <a class="navbar-brand" href="index.php">ScholarEase</a>
      <!-- Judul aplikasi yang juga berfungsi sebagai tautan ke halaman utama -->

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <!-- Navigasi ke halaman Dashboard, Form Daftar, dan Hasil Pendaftaran -->
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'daftar.php' ? 'active' : '' ?>" href="daftar.php">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'hasil.php' ? 'active' : '' ?>" href="hasil.php">Hasil Pendaftaran</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten Data Mahasiswa -->
  <div class="container my-5">
    <!-- Membuat area utama konten dengan margin vertikal (my-5). -->
    <div class="row justify-content-center">
      <!-- Mengatur konten di tengah secara horizontal dengan `justify-content-center`. -->
      <div class="col-md-8">
        <!-- Kolom dengan lebar 8 kolom grid pada layar medium (Bootstrap). -->
        <div class="card">
          <!-- Membuat elemen berbentuk kartu dengan class Bootstrap. -->
          <div class="card-body">
            <!-- Isi utama dari kartu. -->
            <h1 class="text-center gradient-text mb-4">Data Mahasiswa</h1>
            <!-- Judul besar dengan teks berwarna gradasi dan margin bawah sebesar 4. -->

            <!-- Validasi jika data tidak ditemukan -->
            <?php if ($data): ?>
              <!-- Mengecek apakah data mahasiswa tersedia. Jika `$data` tidak kosong, kode berikut akan dijalankan. -->

              <!-- Status Ajuan -->
              <div class="alert alert-danger text-center" role="alert">
                <!-- Menampilkan status pendaftaran dengan kotak peringatan berwarna merah (alert-danger). -->
                <strong>Status Ajuan:</strong> Belum di verifikasi
                <!-- Menunjukkan status pendaftaran mahasiswa. -->
              </div>
              <hr class="mb-4">
              <!-- Garis horizontal dengan margin bawah sebesar 4. -->

              <!-- Informasi Mahasiswa -->
              <div class="row">
                <!-- Area grid untuk menampilkan informasi mahasiswa secara rapi. -->

                <!-- Menggunakan htmlspecialchars untuk mencegah serangan XSS (Cross-Site Scripting).
                    Fungsi ini memastikan data yang ditampilkan di halaman web tidak dianggap sebagai kode HTML atau JavaScript, 
                    sehingga lebih aman dari potensi serangan injeksi. -->

                <div class="col-md-6 mb-3">
                  <p class="text-muted">Nama Mahasiswa</p>
                  <h5><?= htmlspecialchars($data['nama']); ?></h5>
                  <!-- Menampilkan nama mahasiswa dengan aman menggunakan htmlspecialchars. -->
                </div>

                <div class="col-md-6 mb-3">
                  <p class="text-muted">Email Mahasiswa</p>
                  <h5><?= htmlspecialchars($data['email']); ?></h5>
                  <!-- Menampilkan email mahasiswa dengan aman menggunakan htmlspecialchars. -->
                </div>

                <div class="col-md-6 mb-3">
                  <p class="text-muted">No. HP</p>
                  <h5><?= htmlspecialchars($data['no_hp']); ?></h5>
                  <!-- Menampilkan nomor HP mahasiswa dengan aman menggunakan htmlspecialchars. -->
                </div>

                <div class="col-md-6 mb-3">
                  <p class="text-muted">Semester Saat ini</p>
                  <h5><?= htmlspecialchars($data['semester']); ?></h5>
                  <!-- Menampilkan semester mahasiswa dengan aman menggunakan htmlspecialchars. -->
                </div>

                <div class="col-md-6 mb-3">
                  <p class="text-muted">IPK</p>
                  <h5><?= rtrim(rtrim($data['ipk'], '0'), '.'); ?></h5>
                  <!-- Menampilkan nilai IPK mahasiswa tanpa angka nol tambahan di akhir. -->
                  <!-- Contoh: Jika IPK adalah 3.40, maka akan ditampilkan sebagai 3.4. -->
                </div>

                <div class="col-md-6 mb-3">
                  <p class="text-muted">Beasiswa</p>
                  <h5><?= htmlspecialchars($data['beasiswa']); ?></h5>
                  <!-- Menampilkan jenis beasiswa mahasiswa dengan aman menggunakan htmlspecialchars. -->
                </div>

                <div class="col-md-12 mb-4">
                  <p class="text-muted">Berkas</p>
                  <a href="uploads/<?= htmlspecialchars($data['berkas']); ?>" download class="btn btn-outline-primary">
                    <?= htmlspecialchars($data['berkas']); ?> <i class="bi bi-download"></i>
                  </a>
                  <!-- Tautan untuk mengunduh file yang telah diunggah mahasiswa. -->
                  <!-- `htmlspecialchars` digunakan untuk memastikan nama file aman. -->
                  <!-- Tombol ini juga menambahkan ikon download menggunakan class Bootstrap Icons. -->
                </div>
              </div>

              <!-- Tombol Navigasi -->
              <div class="d-flex justify-content-between">
                <!-- Area tombol dengan layout fleksibel untuk menempatkan tombol di kanan dan kiri. -->
                <a href="index.php" class="btn btn-danger">Kembali</a>
                <!-- Tombol merah untuk kembali ke halaman utama. -->
                <a href="mahasiswa.php" class="btn btn-primary">Daftar Mahasiswa</a>
                <!-- Tombol biru untuk membuka halaman daftar semua mahasiswa. -->
              </div>
            <?php else: ?>
              <!-- Jika tidak ada data mahasiswa ditemukan. -->
              <div class="alert alert-warning text-center" role="alert">
                <!-- Kotak peringatan berwarna kuning dengan teks di tengah. -->
                <strong>Data tidak ditemukan!</strong> Tidak ada pendaftaran terbaru.
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>