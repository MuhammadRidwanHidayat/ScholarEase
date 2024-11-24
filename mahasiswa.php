<?php
include 'config.php';
// Mengimpor file konfigurasi database untuk memastikan koneksi ke database dapat dilakukan.

$result = $conn->query("SELECT * FROM mahasiswa");
// Menjalankan query SQL untuk mengambil semua data dari tabel `mahasiswa`.
// Hasil query disimpan dalam variabel `$result`.

$akademik = $conn->query("SELECT COUNT(*) AS total FROM mahasiswa WHERE beasiswa = 'Akademik'")->fetch_assoc()['total'];
// Menjalankan query SQL untuk menghitung jumlah pendaftar yang memilih beasiswa Akademik.
// Hasilnya disimpan dalam variabel `$akademik`.

$nonAkademik = $conn->query("SELECT COUNT(*) AS total FROM mahasiswa WHERE beasiswa = 'Non-Akademik'")->fetch_assoc()['total'];
// Menjalankan query SQL untuk menghitung jumlah pendaftar yang memilih beasiswa Non-Akademik.
// Hasilnya disimpan dalam variabel `$nonAkademik`.
?>


<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <!-- Mengatur encoding karakter menjadi UTF-8 agar mendukung karakter lokal. -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Membuat halaman responsif agar dapat ditampilkan dengan baik di perangkat mobile. -->

  <title>Hasil Pendaftaran</title>
  <!-- Judul halaman yang akan muncul di tab browser. -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Mengimpor pustaka CSS Bootstrap untuk styling elemen. -->

  <style>
    .chart-container {
      width: 100%;
      max-width: 500px;
      margin: 0 auto;
    }

    /* Container untuk grafik agar lebar maksimalnya 500px dan dipusatkan. */

    .chart-title {
      text-align: center;
      margin-top: 20px;
      font-size: 16px;
      color: #333;
    }

    /* Styling untuk judul grafik agar terlihat lebih menarik. */

    .statistik {
      text-align: center;
      margin-top: 20px;
      font-size: 18px;
    }

    /* Styling untuk bagian statistik agar teksnya terpusat dan terlihat rapi. */

    .statistik .biru {
      color: #4e73df;
      font-weight: bold;
    }

    /* Styling untuk jumlah pendaftar Akademik dengan warna biru dan teks tebal. */

    .statistik .hijau {
      color: #1cc88a;
      font-weight: bold;
    }

    /* Styling untuk jumlah pendaftar Non-Akademik dengan warna hijau dan teks tebal. */
  </style>
</head>


<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <!-- Navbar dengan latar belakang putih dan efek bayangan. -->
    <div class="container">
      <a class="navbar-brand" href="index.php">ScholarEase</a>
      <!-- Nama aplikasi ScholarEase yang berfungsi sebagai tautan ke halaman utama. -->

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

  <div class="container my-5">
    <h1 class="text-center mb-4">Hasil Pendaftaran</h1>
    <!-- Judul halaman -->

    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th> <!-- Nomor urut -->
              <th>Nama</th> <!-- Nama mahasiswa -->
              <th>Email</th> <!-- Email mahasiswa -->
              <th>No. HP</th> <!-- Nomor HP mahasiswa -->
              <th>Semester</th> <!-- Semester -->
              <th>IPK</th> <!-- IPK -->
              <th>Beasiswa</th> <!-- Jenis beasiswa -->
              <th>Berkas</th> <!-- Berkas pendaftaran -->
              <th>Status Ajuan</th> <!-- Status verifikasi -->
            </tr>
          </thead>
          <tbody>
            <?php if ($result->num_rows > 0): ?>
              <!-- Jika terdapat data, tampilkan baris-baris tabel. -->
              <?php $no = 1; ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?= $no++ ?></td> <!-- Nomor urut -->
                  <td><?= htmlspecialchars($row['nama']); ?></td> <!-- Nama mahasiswa -->
                  <td><?= htmlspecialchars($row['email']); ?></td> <!-- Email mahasiswa -->
                  <td><?= htmlspecialchars($row['no_hp']); ?></td> <!-- Nomor HP mahasiswa -->
                  <td><?= htmlspecialchars($row['semester']); ?></td> <!-- Semester -->
                  <td><?= htmlspecialchars($row['ipk']); ?></td> <!-- IPK -->
                  <td><?= htmlspecialchars($row['beasiswa']); ?></td> <!-- Jenis beasiswa -->
                  <td><a href="uploads/<?= htmlspecialchars($row['berkas']); ?>" download><?= htmlspecialchars($row['berkas']); ?></a></td>
                  <!-- Tautan untuk mengunduh berkas pendaftaran -->
                  <td><?= htmlspecialchars($row['status_ajuan']); ?></td> <!-- Status verifikasi -->
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="9" class="text-center text-muted">Belum ada pendaftar.</td>
                <!-- Jika tidak ada data, tampilkan pesan ini. -->
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Statistik Jumlah Pendaftar -->
  <div class="statistik">
    <p>Jumlah Pendaftar Beasiswa:</p>
    <p><span class="biru">Akademik: <?= $akademik ?></span> | <span class="hijau">Non-Akademik: <?= $nonAkademik ?></span></p>
    <!-- Menampilkan jumlah pendaftar Akademik dan Non-Akademik. -->
  </div>



  <!-- Grafik Statistik -->
  <div class="chart-container">
    <h3 class="chart-title">Statistik Pendaftar Berdasarkan Jenis Beasiswa</h3>
    <canvas id="pendaftarChart"></canvas>
    <!-- Canvas untuk menampilkan grafik menggunakan Chart.js. -->
  </div>


  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p class="mb-0">&copy; 2024 ScholarEase. All rights reserved.</p>
    </div>
  </footer>

  <!-- CDN Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Mengimpor pustaka Chart.js dari CDN untuk membuat grafik statistik. -->

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Event listener untuk memastikan semua elemen DOM telah dimuat sebelum skrip dijalankan.

      const ctx = document.getElementById('pendaftarChart').getContext('2d');
      // Mengambil elemen canvas dengan id 'pendaftarChart' dan mendapatkan konteks 2D untuk menggambar grafik.

      const data = {
        labels: ['Akademik', 'Non-Akademik'],
        // Label pada sumbu X, yaitu jenis beasiswa yang tersedia.

        datasets: [{
          label: 'Jumlah Pendaftar',
          // Label dataset yang akan ditampilkan pada tooltip.

          data: [<?= $akademik ?>, <?= $nonAkademik ?>],
          // Data jumlah pendaftar dari variabel PHP ($akademik dan $nonAkademik).

          backgroundColor: ['#4e73df', '#1cc88a'],
          // Warna batang: biru untuk Akademik dan hijau untuk Non-Akademik.

          borderColor: ['#2e59d9', '#17a673'],
          // Warna garis border batang.

          borderWidth: 1
          // Ketebalan border batang.
        }]
      };

      const config = {
        type: 'bar',
        // Jenis grafik yang akan ditampilkan adalah bar chart (grafik batang).

        data: data,
        // Data yang digunakan untuk grafik berasal dari konstanta `data`.

        options: {
          responsive: true,
          // Grafik secara otomatis menyesuaikan ukuran layar.

          plugins: {
            legend: {
              display: false
            },
            // Tidak menampilkan legenda pada grafik.

            title: {
              display: false
            }
            // Tidak menampilkan judul bawaan dari Chart.js di atas grafik.
          },

          scales: {
            y: {
              beginAtZero: true,
              // Skala sumbu Y dimulai dari angka 0.

              ticks: {
                stepSize: 1,
                // Setiap langkah nilai pada sumbu Y berjarak 1.

                callback: function(value) {
                  return Number.isInteger(value) ? value : '';
                  // Menampilkan hanya angka bulat pada sumbu Y.
                }
              }
            }
          }
        }
      };

      new Chart(ctx, config);
      // Membuat dan merender grafik berdasarkan konfigurasi yang telah didefinisikan.
    });
  </script>



</body>

</html>