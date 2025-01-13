<?php
// Data dinamis menggunakan PHP
$nama = "Maria Oktaviani";
$prodi = "Sistem Informasi";
$universitas = "Universitas Kuningan";
$semester = 3;
$foto = "image/foto biodata.jpeg";

// Data pendidikan
$pendidikan = [
    "Mahasiswa, $prodi, $universitas (2023 - Sekarang)",
    "Lulus SMK, SMKN 2 KUNINGAN (2023)"
];

// Data keterampilan
$keterampilan = [
    "Pengembangan Perangkat Lunak (C++, Java)",
    "Pengelolaan Basis Data (MySQL)",
    "Desain Web (HTML, CSS, JavaScript, Bootstrap)",
    "Pengelolaan dan Pemeliharaan Jaringan"
];

// Tujuan karier
$tujuan_karier = "Saya berkomitmen untuk mengembangkan keterampilan saya dalam pengembangan perangkat lunak dan dalam bidang jaringan.";
?>

<section id="about" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Tentang Saya</h2>

        <!-- Profile Image -->
        <div class="d-flex justify-content-center mb-4">
            <img src="<?php echo $foto; ?>" alt="<?php echo $nama; ?>" class="profile-img me-4 shadow-sm" style="max-width: 200px; border-radius: 50%; object-fit: cover;">
        </div>

        <!-- Biografi Singkat -->
        <p class="text-center mb-4">
            Hai! Nama saya <strong><?php echo $nama; ?></strong>, seorang mahasiswa Prodi <strong><?php echo $prodi; ?></strong> di <strong><?php echo $universitas; ?></strong>. Saat ini, saya berada di semester <?php echo $semester; ?> dan sangat tertarik dengan dunia teknologi, khususnya dalam bidang pengembangan perangkat lunak dan analisis sistem informasi.
        </p>

        <!-- Pendidikan Section -->
        <div class="mb-4">
            <h4 class="text-primary">Pendidikan</h4>
            <ul>
                <?php foreach ($pendidikan as $edu) : ?>
                    <li><?php echo $edu; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Keterampilan Section -->
        <div class="mb-4">
            <h4 class="text-primary">Keterampilan</h4>
            <ul>
                <?php foreach ($keterampilan as $skill) : ?>
                    <li><?php echo $skill; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Tujuan Karier Section -->
        <div>
            <h4 class="text-primary">Tujuan Karier</h4>
            <p>
                <?php echo $tujuan_karier; ?>
            </p>
        </div>
    </div>
</section>
