<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";
    $conn->query($sql);
}

$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product CRUD</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2 class="mb-4">Product CRUD</h2>

<form action="" method="post" class="mb-4">
    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Product Name" required>
    </div>
    <div class="form-group">
        <input type="text" name="description" class="form-control" placeholder="Product Description">
    </div>
    <div class="form-group">
        <input type="number" step="0.01" name="price" class="form-control" placeholder="Product Price" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($product = $products->fetch_assoc()): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['description'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['created_at'] ?></td>
            <td>
                <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="delete.php?id=<?= $product['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
