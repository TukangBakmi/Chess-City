<?php

    include('../../_dbconfig/dbconfig.php');
    require 'uploadImage.php';

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO shop (name,price,picture,description) VALUES(?, ?, ?, ?)");
    $stmt->bind_param("sdss", $name, $price, $image, $description);

    // set parameters
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = 'default';

    if(isset($_FILES['image']) && $_FILES['image']['error'] !== 4){
        $image = uploadImage($_FILES['image'], '../../images/products/');
        if(!$image){
            echo "<p>Error.</p>";
            echo "<p>Upload image failed.</p>";
            echo "<a href='adminShop.php' class='btn btn-primary'>Try Again</a>";
            return;
        }
    }else{
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO shop (name,price,description) VALUES(?, ?, ?)");
        $stmt->bind_param("sds", $name, $price, $description);
    }

    if($stmt->execute()){
        echo "<p>Insert data success.</p>";
        echo "<a href='adminShop.php' class='btn btn-primary'>Back to Home</a>";
    } else {
        echo "<p>Insert data failed.</p>";
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<a href='adminShop.php' class='btn btn-primary'>Try Again</a>";
    }
    
    $stmt->close();
    $conn->close();
?>