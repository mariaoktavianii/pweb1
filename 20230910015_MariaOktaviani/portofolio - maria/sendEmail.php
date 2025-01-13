<?php
// Konfigurasi Database
$servername = "localhost"; // Ganti dengan host database Anda jika berbeda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "contact_form_db"; // Nama database yang Anda buat

// Koneksi ke Database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Menyimpan data ke database
$sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    // Kirim email
    $to = "your-email@example.com"; // Ganti dengan alamat email tujuan
    $subject = "New Contact Form Submission";
    $body = "<strong>Name:</strong> $name<br><strong>Email:</strong> $email<br><strong>Message:</strong><br>$message";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Kirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
