<?php

    $xlm_url = "https://www.coderweb.hu/arukereso_product_feed.xml";


    $servername = "sql308.infinityfree.com";
    $username = "if0_38286518";
    $password = "cwadmin123";
    $dbname = "if0_38286518_cw";
    $conn = "";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        echo"Couldn't connect to database! <br>". $conn->connect_error;
    }
    echo"Succesfully connected to database! <br>";
    

    echo"<br>";

    $xml = simplexml_load_file($xlm_url);

    if (!$xml) {
        die("Failed to load XML");
    }

    $countInserted = 0;
    
    foreach($xml->Product as $product){
        $identifier = $conn->real_escape_string($product->Identifier);
        $name = $conn->real_escape_string($product->Name);
        $productUrl = $conn->real_escape_string($product->ProductUrl);
        $price = $conn->real_escape_string($product->Price);
        $netPrice = $conn->real_escape_string($product->NetPrice);
        $imageUrl = $conn->real_escape_string($product->ImageUrl);
        $category = $conn->real_escape_string($product->Category);
        $description = $conn->real_escape_string($product->Description);
        $deliveryTime = $conn->real_escape_string($product->DeliveryTime);
        $deliveryCost = $conn->real_escape_string($product->DeliveryCost);
        $eanCode = $conn->real_escape_string($product->EanCode);

        $sql = "INSERT INTO products (identifier, name, product_url, price, net_price, image_url, category, description, delivery_time, delivery_cost, ean_code) 
        VALUES ('$identifier', '$name', '$productUrl', '$price', '$netPrice', '$imageUrl', '$category', '$description', '$deliveryTime', '$deliveryCost', '$eanCode')";
    
        if($conn->query($sql) == TRUE) {
            echo"Record inserted successfully!<br>";
            $countInserted++;
        }else{
            echo"Error: ".$sql."<br>".$conn->error . "<br>";
        }
    }

    echo "<br><strong>Total records inserted: $countInserted</strong><br>";

    $conn->close()

?>