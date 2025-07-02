<?php
include 'includes/config.php';
include 'includes/header.php';

$sql = "SELECT * FROM images ORDER BY upload_date DESC";
$stmt = $pdo->query($sql);
$images = $stmt->fetchAll();
?>

<style>
/* Body CSS */
body {
    background: linear-gradient(135deg, #ffffff, #e6e6e6);
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}


.page-title {
    font-size: 3rem;
    font-weight: 700;
    letter-spacing: -1px;
    transition: transform 0.3s ease;
    display: inline-block;
    color: #000;
    margin-top: 2rem;
}
.page-title:hover {
    transform: scale(1.03);
    
}

/* Card Hover */
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
    background: rgba(255, 255, 255, 0.6);
    backdrop-filter: blur(8px);
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}
.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}
.card-img-top {
   /* height: 200px; */
    object-fit: cover;
    border-radius: 16px 16px 0 0;
    transition: transform 0.3s ease;
}

</style>

<!-- Title Section -->
<div class="text-center my-5">
    <h1 class="page-title">Photo Gallery</h1>
    <p class="text-muted">Browse the latest uploaded images</p>
</div>

<!-- Image Cards -->
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($images as $image): ?>
        <div class="col">
            <div class="card h-100">
                <img src="assets/images/<?php echo htmlspecialchars($image['filename']); ?>" class="card-img-top"
                    alt="<?php echo htmlspecialchars($image['title']); ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo htmlspecialchars($image['title']); ?></h5>
                    <p class="text-muted small mb-1">
                        <?php echo date("F j, Y", strtotime($image['upload_date'])); ?>
                    </p>
                    <p class="card-text mt-auto"><?php echo htmlspecialchars($image['description']); ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- Footer  -->
<?php include 'includes/footer.php'; ?>
