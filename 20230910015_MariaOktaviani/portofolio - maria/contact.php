<?php
// Variabel untuk data dinamis
$pageTitle = "Contact Me";
$actionUrl = "sendEmail.php"; // URL untuk memproses data formulir
?>

<section id="contact" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4"><?php echo $pageTitle; ?></h2>
        
        <form action="<?php echo $actionUrl; ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</section>
