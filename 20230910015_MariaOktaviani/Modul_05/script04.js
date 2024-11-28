$(document).ready(function () {
  // Ketika gambar diklik, buka modal dengan ukuran penuh
  $(".gallery img").click(function () {
    const imgSrc = $(this).attr("src"); // Ambil sumber gambar
    $(".modal-content").attr("src", imgSrc); // Masukkan gambar ke modal
    $(".modal").fadeIn(300); // Tampilkan modal
  });

  // Tutup modal ketika tombol "Close" diklik
  $(".close-btn").click(function () {
    $(".modal").fadeOut(300); // Sembunyikan modal
  });

  // Tutup modal ketika area di luar gambar diklik
  $(".modal").click(function (e) {
    if (!$(e.target).is(".modal-content")) {
      $(".modal").fadeOut(300); // Sembunyikan modal
    }
  });
});
