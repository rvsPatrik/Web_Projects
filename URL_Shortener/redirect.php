<?php

include 'config.php';

if (isset($_GET['code'])) {
    $short_code = $_GET['code'];


    $sql = "SELECT original_url FROM urls WHERE short_code = '$short_code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header("Location: " . $row['original_url']);
        exit();
}else{
    echo"Invalid short url";
}
}else{
    echo "No short code specified";
}



$conn->close();



?>