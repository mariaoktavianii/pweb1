<h3>Buku Tamu</h3>
        <hr>

        <!-- Form Buku Tamu -->
        <div class="container">
            <h4>Isi Buku Tamu</h4>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>

        <!-- PHP untuk Memproses Data -->
        <?php
        include 'Latihan_09_config.php'; // Memuat file konfigurasi database

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = htmlspecialchars(trim($_POST['nama']));
            $pesan = htmlspecialchars(trim($_POST['pesan']));
            $tanggal = date('Y-m-d H:i:s'); // Waktu pengiriman pesan

            if (!empty($nama) && !empty($pesan)) {
                $sql = "INSERT INTO buku_tamu (nama, pesan, tanggal) VALUES ('$nama', '$pesan', '$tanggal')";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success mt-3'>Pesan berhasil ditambahkan.</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-warning mt-3'>Nama dan pesan tidak boleh kosong.</div>";
            }
        }
        ?>

        <!-- Menampilkan Daftar Buku Tamu -->
        <div class="container mt-5">
            <h4>Daftar Buku Tamu</h4>
            <?php
            $sql = "SELECT * FROM buku_tamu ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='border p-3 mb-3'>
                            <h5>" . htmlspecialchars($row['nama']) . "</h5>
                            <small class='text-muted'>Dikirim pada: " . date('d M Y, H:i', strtotime($row['tanggal'])) . "</small>
                            <p>" . htmlspecialchars($row['pesan']) . "</p>
                          </div>";
                }
            } else {
                echo "<p>Belum ada pesan.</p>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
