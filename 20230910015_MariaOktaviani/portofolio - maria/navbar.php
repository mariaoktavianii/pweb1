<?php
// Menentukan menu aktif
$menu = isset($_GET['menu']) ? $_GET['menu'] : 'home';

// Array navigasi untuk mempermudah pengelolaan menu
$navItems = [
    'home' => 'Home',
    'about' => 'About Me',
    'portofolio' => 'Portofolio',
    'contact' => 'Contact'
];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Maria Oktaviani</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <?php foreach ($navItems as $key => $value) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $menu === $key ? 'active' : ''; ?>" href="?menu=<?php echo $key; ?>">
                            <?php echo $value; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
