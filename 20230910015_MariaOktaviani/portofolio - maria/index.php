<?php 
$menu = isset($_GET['menu']) ? $_GET['menu'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Maria Oktaviani's personal portfolio showcasing skills, projects, and experiences.">
    <title>Maria Oktaviani - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- jQuery -->
</head>
<body>
    <!-- Navbar -->
<?php include('navbar.php'); ?>

<!-- Konten Halaman -->
<main>
    <?php 
    switch ($menu) {
        case 'about':
            include('about.php');
            break;
        case 'portofolio':
            include('portofolio.php');
            break;
        case 'contact':
            include('contact.php');
            break;
        case 'home':
        default:
            include('home.php');
            break;
    }
    ?>
</main>

<!-- Footer -->
<?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
