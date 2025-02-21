<!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Url Shortener</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class ="container">
        <h1>Url Shortener</h1>
        <form action="shorten.php" method="POST">
            <input type="url" name="original_url" class="form-control" placeholder="Enter a URL" required>
            <button type="submit" class="btn btn-primary">Shorten</button>
        </form>
    </div>
</body>





</html>