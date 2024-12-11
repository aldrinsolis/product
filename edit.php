<?php
include 'db.php';

$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id=$id";
    $conn->query($sql);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Edit Product</h2>

<form action="" method="post" class="mb-4">
    <div class="form-group">
        <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
    </div>
    <div class="form-group">
        <input type="text" name="description" class="form-control" value="<?= $product['description'] ?>">
    </div>
    <div class="form-group">
        <input type="number" step="0.01" name="price" class="form-control" value="<?= $product['price'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>

<a href="index.php" class="btn btn-secondary">Back</a>

</body>
</html>
