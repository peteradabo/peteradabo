<?php
require 'db_connect.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stmt = $pdo->prepare("UPDATE Categories SET name = ?, description = ? WHERE id = ?");
    $stmt->execute([$name, $description, $id]);
    header("Location: categories.php");
    exit();
} else {
    $stmt = $pdo->prepare("SELECT * FROM Categories WHERE id = ?");
    $stmt->execute([$id]);
    $cat = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Category</h2>
    <form method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($cat['name']) ?>" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= htmlspecialchars($cat['description']) ?></textarea>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="categories.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>