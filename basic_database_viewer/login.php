<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    if ($password === "cwadmin123") {
        $_SESSION["authenticated"] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Hibás jelszó!";
    }
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Bejelentkezés</h2>
        <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
        <form method="post">
            <label for="password">Jelszó:</label>
            <input type="password" name="password" required class="form-control mb-3">
            <button type="submit" class="btn btn-primary">Belépés</button>
        </form>
        
    </div>
</body>
</html>
