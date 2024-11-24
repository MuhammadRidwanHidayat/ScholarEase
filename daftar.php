<?php
include 'config.php';
// Mengimpor file konfigurasi database untuk menghubungkan script ini ke database.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Mengecek apakah request yang diterima menggunakan metode POST.

  $nama = $_POST['nama'];
  // Menangkap data nama mahasiswa dari input form dan menyimpannya ke variabel $nama.
  $email = $_POST['email'];
  // Menangkap data email mahasiswa dari input form dan menyimpannya ke variabel $email.
  $no_hp = $_POST['no_hp'];
  // Menangkap data nomor HP mahasiswa dari input form dan menyimpannya ke variabel $no_hp.
  $semester = $_POST['semester'];
  // Menangkap data semester mahasiswa dari dropdown input form dan menyimpannya ke variabel $semester.
  $ipk = $_POST['ipk'];
  // Menangkap data IPK mahasiswa dari input form dan menyimpannya ke variabel $ipk.
  $beasiswa = $_POST['beasiswa'];
  // Menangkap jenis beasiswa yang dipilih mahasiswa dari input form dan menyimpannya ke variabel $beasiswa.

  $berkas = $_FILES['berkas']['name'];
  // Menangkap nama file yang diunggah melalui input file pada form.
  $berkasTmp = $_FILES['berkas']['tmp_name'];
  // Menangkap lokasi sementara file yang diunggah di server.
  $targetDir = "uploads/";
  // Menentukan folder tujuan untuk menyimpan file yang diunggah.
  $targetFile = $targetDir . basename($berkas);
  // Menentukan path lengkap file yang akan disimpan (gabungan folder tujuan dan nama file).
  move_uploaded_file($berkasTmp, $targetFile);
  // Memindahkan file dari lokasi sementara ke folder tujuan `uploads/`.

  $query = "INSERT INTO mahasiswa (nama, email, no_hp, semester, ipk, beasiswa, berkas, status_ajuan) 
            VALUES ('$nama', '$email', '$no_hp', '$semester', '$ipk', '$beasiswa', '$berkas', 'Belum Diverifikasi')";
  // Membuat query SQL untuk menyimpan data pendaftaran mahasiswa ke tabel `mahasiswa`. Data mencakup nama, email, nomor HP, semester, IPK, jenis beasiswa, nama file berkas, dan status ajuan.

  $conn->query($query);
  // Menjalankan query SQL untuk menyimpan data ke database.

  header("Location: hasil.php");
  // Mengarahkan pengguna ke halaman hasil.php setelah data berhasil disimpan.
  exit;
  // Menghentikan eksekusi script setelah redirect.
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <!-- Mendefinisikan format karakter yang digunakan, yaitu UTF-8 -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Membuat halaman responsif di perangkat mobile -->

  <title>Form Pendaftaran</title>
  <!-- Judul halaman -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Mengimpor CSS Bootstrap untuk gaya antarmuka yang responsif -->

  <style>
    html,
    body {
      height: 100%;
      /* Memastikan HTML dan body memenuhi tinggi layar */
    }

    body {
      display: flex;
      flex-direction: column;
      /* Membuat layout dengan arah kolom */
    }

    .content {
      flex: 1;
      /* Memperluas area konten utama */
    }

    .card {
      border: none;
      border-radius: 12px;
      /* Membuat kartu dengan sudut membulat */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Menambahkan bayangan lembut pada kartu */
    }

    .form-title {
      color: #4e73df;
      /* Memberikan warna biru pada judul form */
    }
  </style>
</head>


<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <!-- Navbar dengan latar putih dan efek bayangan -->
    <div class="container">
      <a class="navbar-brand" href="index.php">ScholarEase</a>
      <!-- Brand atau nama aplikasi -->

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <!-- Navigasi ditempatkan di kanan dengan `ms-auto` -->
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'daftar.php' ? 'active' : '' ?>" href="daftar.php">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'mahasiswa.php' ? 'active' : '' ?>" href="mahasiswa.php">Hasil Pendaftaran</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container my-5 content">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center form-title mb-4">Form Pendaftaran Beasiswa</h3>
            <!-- Judul form -->

            <form method="POST" enctype="multipart/form-data">
              <!-- Form menggunakan metode POST dan mendukung unggahan file -->

              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                <!-- Input teks untuk nama -->
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                <!-- Input email -->
              </div>

              <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP Anda" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                <!-- Input nomor HP hanya menerima angka -->
              </div>

              <div class="mb-3">
                <label for="semester" class="form-label">Semester Saat Ini</label>
                <select class="form-select" id="semester" name="semester" required>
                  <option value="" disabled selected>Pilih Semester</option>
                  <option value="1">Semester 1</option>
                  <option value="2">Semester 2</option>
                  <option value="3">Semester 3</option>
                  <option value="4">Semester 4</option>
                  <option value="5">Semester 5</option>
                  <option value="6">Semester 6</option>
                  <option value="7">Semester 7</option>
                  <option value="8">Semester 8</option>
                </select>
                <!-- Dropdown pilihan semester -->
              </div>

              <div class="mb-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="text" class="form-control" id="ipk" name="ipk" readonly>
                <!-- Input IPK yang otomatis diisi berdasarkan semester -->
              </div>

              <div class="mb-3">
                <label for="beasiswa" class="form-label">Pilih Beasiswa</label>
                <select class="form-select" id="beasiswa" name="beasiswa" required disabled>
                  <option value="" disabled selected>Pilih Beasiswa</option>
                  <option value="Akademik">Beasiswa Akademik</option>
                  <option value="Non-Akademik">Beasiswa Non-Akademik</option>
                </select>
                <!-- Dropdown untuk memilih jenis beasiswa -->
              </div>

              <div class="mb-3">
                <label for="berkas" class="form-label">Upload Berkas Syarat</label>
                <input type="file" class="form-control" id="berkas" name="berkas" required disabled>
                <!-- Input file untuk mengunggah dokumen -->
              </div>

              <button type="submit" class="btn btn-primary w-100" disabled>Daftar</button>
              <!-- Tombol submit -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">&copy; 2024 ScholarEase. All rights reserved.</p>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Event listener ini memastikan bahwa kode hanya dijalankan setelah semua elemen DOM selesai dimuat.

      const semesterSelect = document.getElementById("semester");
      // Mengambil elemen dropdown dengan ID "semester" untuk memilih semester mahasiswa.

      const ipkInput = document.getElementById("ipk");
      // Mengambil elemen input dengan ID "ipk" untuk menampilkan nilai IPK berdasarkan semester.

      const beasiswaSelect = document.getElementById("beasiswa");
      // Mengambil elemen dropdown dengan ID "beasiswa" untuk memilih jenis beasiswa.

      const berkasInput = document.getElementById("berkas");
      // Mengambil elemen input file dengan ID "berkas" untuk mengunggah dokumen syarat pendaftaran.

      const submitButton = document.querySelector("button[type='submit']");
      // Mengambil tombol submit dari form untuk mengirimkan data pendaftaran.

      const ipkValues = {
        // Objek yang menyimpan nilai IPK untuk setiap semester. Kunci (1, 2, 3, dst.) mewakili semester, dan nilainya adalah IPK.
        1: 2.9, // IPK untuk Semester 1.
        2: 3.0, // IPK untuk Semester 2.
        3: 3.1, // IPK untuk Semester 3.
        4: 3.2, // IPK untuk Semester 4.
        5: 3.3, // IPK untuk Semester 5.
        6: 3.4, // IPK untuk Semester 6.
        7: 3.5, // IPK untuk Semester 7.
        8: 3.6 // IPK untuk Semester 8.
      };

      function updateIPK() {
        // Fungsi untuk memperbarui nilai IPK berdasarkan semester yang dipilih.

        const semester = parseInt(semesterSelect.value);
        // Mengambil nilai semester yang dipilih dari dropdown dan mengonversinya menjadi angka.

        const ipk = ipkValues[semester] || 3.0;
        // Mengambil nilai IPK berdasarkan semester yang dipilih. Jika semester tidak ditemukan, nilai default adalah 3.0.

        ipkInput.value = parseFloat(ipk).toString();
        // Mengatur nilai IPK ke input "ipk" dengan format angka dinamis. Misalnya, 3.4 tetap 3.4 (tanpa tambahan desimal).

        if (ipk < 3) {
          // Jika nilai IPK kurang dari 3, maka syarat pendaftaran tidak terpenuhi:
          beasiswaSelect.disabled = true;
          // Dropdown pilihan beasiswa dinonaktifkan.
          berkasInput.disabled = true;
          // Input untuk mengunggah dokumen syarat dinonaktifkan.
          submitButton.disabled = true;
          // Tombol submit dinonaktifkan sehingga pengguna tidak dapat mengirim form.
        } else {
          // Jika nilai IPK sama dengan atau lebih dari 3:
          beasiswaSelect.disabled = false;
          // Dropdown pilihan beasiswa diaktifkan.
          berkasInput.disabled = false;
          // Input untuk mengunggah dokumen syarat diaktifkan.
          submitButton.disabled = false;
          // Tombol submit diaktifkan sehingga form bisa dikirim.
        }
      }

      if (semesterSelect.value) {
        // Jika dropdown semester sudah memiliki nilai saat halaman dimuat:
        updateIPK();
        // Panggil fungsi updateIPK() untuk memperbarui nilai IPK.
      }

      semesterSelect.addEventListener("change", updateIPK);
      // Menambahkan event listener pada elemen dropdown semester. Event ini dijalankan setiap kali pengguna mengganti nilai semester.
    });
  </script>
</body>

</html>