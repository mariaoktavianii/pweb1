<?php
// Data dinamis untuk halaman Home
$nama = "Maria Oktaviani";
$universitas = "Universitas Kuningan";
$jurusan = "Sistem Informasi";
$fakultas = "Fakultas Ilmu Komputer";
$semester = 3;

// Deskripsi tentang portofolio
$deskripsi = [
    "Hai! Nama saya <strong>$nama</strong>, seorang mahasiswa di <strong>$universitas</strong> dengan jurusan <strong>$jurusan</strong> di <strong>$fakultas</strong>. Saat ini saya sedang menjalani pendidikan di semester $semester.",
    "Portofolio ini dibuat untuk memperkenalkan diri saya dan menunjukkan keterampilan serta proyek-proyek yang telah saya kerjakan.",
    "Tujuan dari pelatihan ini adalah untuk memberikan gambaran tentang keterampilan teknis dan manajerial saya dalam bidang jaringan, pengembangan perangkat lunak, dan organisasi, serta untuk menunjukkan dedikasi saya dalam memberikan solusi yang efektif dan inovatif di dunia teknologi dan administrasi."
];

// Gambar untuk jumbotron
$jumbotron_gambar = "image/portofolio pribadi.jpg";
?>

<header class="jumbotron-bg text-white text-center" style="background-image: url('<?php echo $jumbotron_gambar; ?>'); background-size: cover; background-position: center; height: 100vh; width: 100%; position: relative;">
    <!-- Jumbotron content (optional) -->
    <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
        <!-- Jika ingin menambahkan konten pada jumbotron, bisa ditambahkan di sini -->
    </div>
</header>

<section id="home" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Welcome to My Portfolio</h2>
        
        <?php foreach ($deskripsi as $paragraf) : ?>
            <p class="text-center mb-4"><?php echo $paragraf; ?></p>
        <?php endforeach; ?>
    </div>
</section>
