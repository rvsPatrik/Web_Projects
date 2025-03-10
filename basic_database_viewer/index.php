<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
include 'db.php';
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termékkezelés</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">



<style>
        .scroll-button {
            position: fixed;
            right: 20px;
            z-index: 1000;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s;
        }
        .scroll-button:hover {
            opacity: 1;
        }
        #scroll-down {
            top: 20px;
            background-color: #007bff;
            color: white;
        }
        #scroll-up {
            bottom: 20px;
            background-color: #007bff;
            color: white;
        }
    </style>

    <script>
        function scrollToBottom() {
            window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
        }

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>


</head>
<body>
<a href="logout.php" class="btn btn-danger">Kijelentkezés</a>


<button id="scroll-down" class="scroll-button" onclick="scrollToBottom()">⬇ Lap aljára</button>


    <div class="container mt-5">
        <h2 class="mb-4">Terméklista</h2>
        <a href="add.php" class="btn btn-success mb-3">Új termék hozzáadása</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kép</th>
                    <th>Név</th>
                    <th>Ár</th>
                    <th>Kategória</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                    <td>
                        <a href="<?= $row['product_url'] ?>" target="_blank">
                            <img src="<?= $row['image_url'] ?>" alt="Termék kép" width="100" style="cursor: pointer;">
                        </a>
                        </td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['price'] ?> Ft</td>
                        <td><?= $row['category'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Szerkesztés</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Biztosan törölni szeretné?')">Törlés</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>


    <button id="scroll-up" class="scroll-button" onclick="scrollToTop()">⬆ Lap tetejére</button>
</body>
</html>