<?php
$projects = [
    [
        "title" => "Junior Network Administrator",
        "category" => "network",
        "image" => "image/JNA.jpeg",
        "description" => "Pengelolaan dan Pemeliharaan Jaringan."
    ],
    [
        "title" => "Sekretaris YVC",
        "category" => "organization",
        "image" => "image/YVC.jpeg",
        "description" => "Sekretaris dalam organisasi atau komunitas."
    ],
    [
        "title" => "Pelatihan Dicoding",
        "category" => "training",
        "image" => "image/sertif.png",
        "description" => "Pengembangan keterampilan teknologi."
    ]
];
?>

<section id="portfolio" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">My Projects</h2>

        <!-- Filter Buttons -->
        <div class="text-center mb-4">
            <button class="btn btn-primary filter-btn" data-filter="all">All</button>
            <button class="btn btn-secondary filter-btn" data-filter="network">Network</button>
            <button class="btn btn-secondary filter-btn" data-filter="organization">Organization</button>
            <button class="btn btn-secondary filter-btn" data-filter="training">Training</button>
        </div>

        <!-- Portfolio Items -->
        <div class="row g-4">
            <?php foreach ($projects as $project): ?>
                <div class="col-md-4 portfolio-item" data-category="<?php echo $project['category']; ?>">
                    <div class="card shadow-sm border-0">
                        <img src="<?php echo $project['image']; ?>" class="card-img-top portfolio-img img-fluid zoom" alt="<?php echo $project['title']; ?>" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-image="<?php echo $project['image']; ?>" data-bs-title="<?php echo $project['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $project['title']; ?></h5>
                            <p class="card-text text-center"><?php echo $project['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Modal for Image Detail -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="img-fluid" id="modalImage" alt="Project Image">
            </div>
        </div>
    </div>
</div>

<script>
    // Mengambil elemen modal dan set gambar serta judul dinamis
    var imageModal = document.getElementById('imageModal');
    imageModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Elemen yang memicu modal (gambar yang diklik)
        var imageUrl = button.getAttribute('data-bs-image'); // Gambar
        var title = button.getAttribute('data-bs-title'); // Judul

        var modalTitle = imageModal.querySelector('.modal-title');
        var modalImage = imageModal.querySelector('#modalImage');

        modalTitle.textContent = title;
        modalImage.src = imageUrl;
    });
    
    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.dataset.filter;

            // Highlight the active button
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('btn-primary');
                btn.classList.add('btn-secondary');
            });
            button.classList.add('btn-primary');

            // Show/hide portfolio items
            document.querySelectorAll('.portfolio-item').forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
