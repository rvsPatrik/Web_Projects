<?php

include 'config.php';

if (isset($_POST['original_url']) && !empty($_POST['original_url'])) {
    $original_url = $_POST['original_url'];

    function generateShortCode($length=6) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $short_code = '';
        for ($i = 0; $i < $length; $i++) {
            $short_code .= $chars[rand(0, strlen($chars) -1)];
        }
        return $short_code;
    }

    $short_code = generateShortCode();

    $sql = "INSERT INTO urls (short_code, original_url) VALUES ('$short_code', '$original_url')";
    if ($conn->query($sql)) {
        $shortened_url ="http://localhost/URL_Shortener/$short_code";
        echo"Shortened URL: <a href='$shortened_url'>$shortened_url</a>";





    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    echo"Please enter a valid URL";
}



$conn->close()



?>