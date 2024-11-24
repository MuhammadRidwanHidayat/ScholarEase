<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8"> <!-- Encoding karakter UTF-8 untuk mendukung teks multibahasa -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur skala tampilan di perangkat mobile -->
  <title>ScholarEase</title> <!-- Judul halaman -->
  <!-- Menyertakan Bootstrap 5 untuk gaya dan tata letak -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    html,
    body {
      height: 100%;
      /* Pastikan HTML dan body memenuhi tinggi layar */
    }

    body {
      display: flex;
      flex-direction: column;
      /* Tata letak kolom untuk membuat footer sticky */
    }

    .content {
      flex: 1;
      /* Memastikan konten utama meluas untuk mengisi ruang yang tersedia */
    }
  </style>
</head>

<body class="bg-light"> <!-- Latar belakang halaman berwarna abu-abu terang -->

  <!-- Navbar (Navigasi) -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container">
      <a class="navbar-brand" href="index.php">ScholarEase</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">Dashboard</a>
            <!-- Jika halaman yang diakses adalah 'index.php', maka kelas 'active' ditambahkan untuk menyoroti menu Dashboard -->
          </li>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'daftar.php' ? 'active' : '' ?>" href="daftar.php">Daftar</a>
            <!-- Jika halaman yang diakses adalah 'daftar.php', maka kelas 'active' ditambahkan untuk menyoroti menu Daftar -->
          </li>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'mahasiswa.php' ? 'active' : '' ?>" href="mahasiswa.php">Hasil Pendaftaran</a>
            <!-- Jika halaman yang diakses adalah 'mahasiswa.php', maka kelas 'active' ditambahkan untuk menyoroti menu Hasil Pendaftaran -->
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Konten Utama -->
  <div class="container mt-5 content"> <!-- Membuat area konten dengan margin atas -->
    <h1 class="text-center">Informasi Beasiswa</h1> <!-- Judul besar halaman, di tengah -->
    <div class="row mt-4"> <!-- Baris untuk kartu informasi beasiswa -->

      <!-- Informasi Beasiswa Akademik -->
      <div class="col-md-6"> <!-- Kolom berisi informasi beasiswa akademik -->
        <div class="card"> <!-- Membuat kartu -->
          <div class="card-body">
            <h5 class="card-title">Beasiswa Akademik</h5> <!-- Judul kartu -->
            <p class="card-text">Syarat:</p> <!-- Deskripsi syarat -->
            <ul> <!-- Daftar syarat -->
              <li>Mahasiswa aktif semester 1-8.</li> <!-- Syarat 1 -->
              <li>IPK minimal 3.0.</li> <!-- Syarat 2 -->
              <li>Tidak menerima beasiswa lain.</li> <!-- Syarat 3 -->
            </ul>
          </div>
        </div>
      </div>

      <!-- Informasi Beasiswa Non-Akademik -->
      <div class="col-md-6"> <!-- Kolom berisi informasi beasiswa non-akademik -->
        <div class="card"> <!-- Membuat kartu -->
          <div class="card-body">
            <h5 class="card-title">Beasiswa Non-Akademik</h5> <!-- Judul kartu -->
            <p class="card-text">Syarat:</p> <!-- Deskripsi syarat -->
            <ul> <!-- Daftar syarat -->
              <li>Mahasiswa aktif semester 1-8.</li> <!-- Syarat 1 -->
              <li>IPK minimal 3.0.</li> <!-- Syarat 2 -->
              <li>Tidak menerima beasiswa lain.</li> <!-- Syarat 3 -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p class="mb-2">&copy; 2024 ScholarEase. All rights reserved. | Muhammad Ridwan Hidayat - 20102066</p>
    </div>
  </footer>
</body>

</html>