<?php
require 'db_connect.php';
$stmt = $pdo->query("SELECT * FROM Categories ORDER BY created DESC");
$categories = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Categories</h2>
    <a href="add_category.php" class="btn btn-primary mb-2">Add Category</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Created</th><th>Actions</th></tr></thead>
        <tbody>
        <?php foreach($categories as $cat): ?>
            <tr>
                <td><?= $cat['id'] ?></td>
                <td><?= htmlspecialchars($cat['name']) ?></td>
                <td><?= htmlspecialchars($cat['description']) ?></td>
                <td><?= $cat['created'] ?></td>
                <td>
                    <a href="edit_category.php?id=<?= $cat['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete_category.php?id=<?= $cat['id'] ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Delete this category?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>