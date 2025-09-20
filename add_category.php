<?php
require 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stmt = $pdo->prepare("INSERT INTO Categories (name, description) VALUES (?, ?)");
    $stmt->execute([$name, $description]);
    header("Location: categories.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Add Category</h2>
    <form method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button class="btn btn-success">Save</button>
        <a href="categories.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>