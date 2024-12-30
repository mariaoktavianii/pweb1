<h3>Bursa Kerja</h3>
<hr>

<!-- Form Tambah Lowongan -->
<div class="container">
    <h4>Tambah Lowongan Pekerjaan</h4>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="perusahaan" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" required>
        </div>
        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Lowongan</button>
    </form>
</div>

<!-- PHP untuk Memproses Data -->
<?php
include 'Latihan_09_config.php'; // Memuat file konfigurasi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $perusahaan = htmlspecialchars(trim($_POST['perusahaan']));
    $posisi = htmlspecialchars(trim($_POST['posisi']));
    $deskripsi = htmlspecialchars(trim($_POST['deskripsi']));

    if (!empty($perusahaan) && !empty($posisi) && !empty($deskripsi)) {
        $stmt = $conn->prepare("INSERT INTO bursa_kerja (perusahaan, posisi, deskripsi) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $perusahaan, $posisi, $deskripsi);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success mt-3'>Lowongan berhasil ditambahkan.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . $stmt->error . "</div>";
        }
        $stmt->close();
    } else {
        echo "<div class='alert alert-warning mt-3'>Semua kolom harus diisi.</div>";
    }
}
?>

<!-- Menampilkan Daftar Lowongan Pekerjaan -->
<div class="container mt-5">
    <h4>Daftar Lowongan Pekerjaan</h4>
    <?php
    $sql = "SELECT * FROM bursa_kerja ORDER BY tanggal_posting DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='border p-3 mb-3'>
                    <h5>" . htmlspecialchars($row['perusahaan']) . " - " . htmlspecialchars($row['posisi']) . "</h5>
                    <small class='text-muted'>Diposting pada: " . date('d M Y, H:i', strtotime($row['tanggal_posting'])) . "</small>
                    <p>" . htmlspecialchars($row['deskripsi']) . "</p>
                  </div>";
        }
    } else {
        echo "<p>Belum ada lowongan pekerjaan.</p>";
    }
    ?>
</div>
