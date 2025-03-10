<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST['identifier'];
    $name = $_POST['name'];
    $productUrl = $_POST['product_url'];
    $price = $_POST['price'];
    $netPrice = $_POST['net_price'];
    $imageUrl = $_POST['image_url'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $deliveryTime = $_POST['delivery_time'];
    $deliveryCost = $_POST['delivery_cost'];
    $eanCode = $_POST['ean_code'];

    $sql = "INSERT INTO products (identifier, name, product_url, price, net_price, image_url, category, description, delivery_time, delivery_cost, ean_code) 
            VALUES ('$identifier', '$name', '$productUrl', '$price', '$netPrice', '$imageUrl', '$category', '$description', '$deliveryTime', '$deliveryCost', '$eanCode')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Hiba: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új Termék Hozzáadása</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Új Termék Hozzáadása</h2>
        <form method="post">
            <div class="mb-3">
                <label for="identifier" class="form-label">Azonosító</label>
                <input type="text" name="identifier" id="identifier" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Név</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="product_url" class="form-label">Termék URL</label>
                <input type="url" name="product_url" id="product_url" class="form-control">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Ár</label>
                <input type="number" name="price" id="price" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="net_price" class="form-label">Nettó Ár</label>
                <input type="number" name="net_price" id="net_price" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Kép URL</label>
                <input type="url" name="image_url" id="image_url" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategória</label>
                <input type="text" name="category" id="category" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Leírás</label>
                <textarea name="description" id="description" class="form-control" rows="3" ></textarea>
            </div>
            <div class="mb-3">
                <label for="delivery_time" class="form-label">Szállítási Idő</label>
                <input type="text" name="delivery_time" id="delivery_time" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="delivery_cost" class="form-label">Szállítási Költség</label>
                <input type="number" name="delivery_cost" id="delivery_cost" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="ean_code" class="form-label">EAN Kód</label>
                <input type="text" name="ean_code" id="ean_code" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Hozzáadás</button>
        </form>
    </div>
</body>
</html>
