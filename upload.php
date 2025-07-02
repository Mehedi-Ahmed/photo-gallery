<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<h2 class="text-center mb-4" style="margin-top: 20%">Upload New Image</h2>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $desc = trim($_POST['description']);
    $image = $_FILES['image'];

    if ($image['size'] > 5000000) {
        echo "<div class='alert alert-danger'>File size must be under 5MB.</div>";
    } elseif ($image['error'] !== 0) {
        echo "<div class='alert alert-danger'>Image upload failed.</div>";
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $newName = uniqid() . "." . $ext;
        $target = "assets/images/" . $newName;

        if (move_uploaded_file($image['tmp_name'], $target)) {
            $stmt = $pdo->prepare("INSERT INTO images (title, description, filename) VALUES (?, ?, ?)");
            $stmt->execute([$title, $desc, $newName]);
            echo "<div class='alert alert-success'>Image uploaded successfully.</div><a href='index.php' class='btn btn-dark'>View Gallery</a>";
        } else {
            echo "<div class='alert alert-danger'>Failed to save image.</div>";
        }
    }
}
?>

<form method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 500px;">
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" required class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Image File</label>
        <input type="file" name="image" accept="image/*" required class="form-control">
    </div>
    <button type="submit" class="btn btn-dark">Upload</button>
</form>
<!--  Footer -->
<?php include 'includes/footer.php'; ?>
