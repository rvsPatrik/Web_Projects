<?php
include 'db.php';
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

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

    $sql = "UPDATE products SET 
                identifier='$identifier', 
                name='$name', 
                product_url='$productUrl', 
                price='$price', 
                net_price='$netPrice', 
                image_url='$imageUrl', 
                category='$category', 
                description='$description', 
                delivery_time='$deliveryTime', 
                delivery_cost='$deliveryCost', 
                ean_code='$eanCode' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termék Szerkesztése</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Termék Szerkesztése</h2>
        <form method="post">
            <div class="mb-3">
                <label for="identifier" class="form-label">Azonosító</label>
                <input type="text" name="identifier" id="identifier" class="form-control" value="<?= htmlspecialchars($product['identifier']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Név</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="product_url" class="form-label">Termék URL</label>
                <input type="url" name="product_url" id="product_url" class="form-control" value="<?= htmlspecialchars($product['product_url']) ?>" >
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Ár</label>
                <input type="number" name="price" id="price" class="form-control" value="<?= htmlspecialchars($product['price']) ?>" >
            </div>
            <div class="mb-3">
                <label for="net_price" class="form-label">Nettó Ár</label>
                <input type="number" name="net_price" id="net_price" class="form-control" value="<?= htmlspecialchars($product['net_price']) ?>" >
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Kép URL</label>
                <input type="url" name="image_url" id="image_url" class="form-control" value="<?= htmlspecialchars($product['image_url']) ?>" >
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategória</label>
                <input type="text" name="category" id="category" class="form-control" value="<?= htmlspecialchars($product['category']) ?>" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Leírás</label>
                <textarea name="description" id="description" class="form-control" rows="3" ><?= htmlspecialchars($product['description']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="delivery_time" class="form-label">Szállítási Idő</label>
                <input type="text" name="delivery_time" id="delivery_time" class="form-control" value="<?= htmlspecialchars($product['delivery_time']) ?>" >
            </div>
            <div class="mb-3">
                <label for="delivery_cost" class="form-label">Szállítási Költség</label>
                <input type="number" name="delivery_cost" id="delivery_cost" class="form-control" value="<?= htmlspecialchars($product['delivery_cost']) ?>" >
            </div>
            <div class="mb-3">
                <label for="ean_code" class="form-label">EAN Kód</label>
                <input type="text" name="ean_code" id="ean_code" class="form-control" value="<?= htmlspecialchars($product['ean_code']) ?>" >
            </div>
            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>
    </div>
</body>
</html>
