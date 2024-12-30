<h3>Penelusuran Alumni</h3>
<hr>

<!-- Form Penelusuran Alumni -->
<div class="container">
    <h4>Cari Alumni</h4>
    <form method="GET" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Alumni</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
            <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus">
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan">
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
</div>

<!-- Menampilkan Hasil Penelusuran Alumni -->
<div class="container mt-5">
    <h4>Hasil Penelusuran Alumni</h4>
    <?php
    include 'Latihan_09_config.php'; // Memuat file konfigurasi database

    // Awal query SQL untuk mencari alumni
    $sql = "SELECT * FROM alumni WHERE 1"; 

    // Memeriksa jika ada input untuk nama alumni
    if (!empty($_GET['nama'])) {
        $nama = htmlspecialchars(trim($_GET['nama']));
        $sql .= " AND nama LIKE '%$nama%'"; // Menambahkan kondisi nama
    }

    // Memeriksa jika ada input untuk tahun lulus
    if (!empty($_GET['tahun_lulus'])) {
        $tahun_lulus = (int) $_GET['tahun_lulus'];
        $sql .= " AND tahun_lulus = $tahun_lulus"; // Menambahkan kondisi tahun lulus
    }

    // Memeriksa jika ada input untuk jurusan
    if (!empty($_GET['jurusan'])) {
        $jurusan = htmlspecialchars(trim($_GET['jurusan']));
        $sql .= " AND jurusan LIKE '%$jurusan%'"; // Menambahkan kondisi jurusan
    }

    // Eksekusi query
    $result = $conn->query($sql);

    // Memeriksa hasil query
    if ($result->num_rows > 0) {
        // Menampilkan hasil jika ditemukan
        while ($row = $result->fetch_assoc()) {
            echo "<div class='border p-3 mb-3'>
                    <h5>" . htmlspecialchars($row['nama']) . "</h5>
                    <small class='text-muted'>Tahun Lulus: " . $row['tahun_lulus'] . "</small>
                    <p>Jurusan: " . htmlspecialchars($row['jurusan']) . "</p>
                  </div>";
        }
    } else {
        echo "<p>Alumni tidak ditemukan.</p>";
    }
    ?>
</div>
