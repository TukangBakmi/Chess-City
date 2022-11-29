<?php

    include('../../_dbconfig/dbconfig.php');
    require 'uploadImage.php';

    // prepare and bind
    $stmt = $conn->prepare("UPDATE shop SET name=?,price=?,
                            picture=?,description=? WHERE id=?");
    $stmt->bind_param("sdssi", $name, $price, $picture, $description, $id);

    // set parameters
    $id = $_POST['id'];
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
        $stmt = $conn->prepare("UPDATE shop SET name=?,price=?,
                            description=? WHERE id=?");
        $stmt->bind_param("sdsi", $name, $price, $description, $id);
    }

    
    if($stmt->execute()){
        echo "<p>Edit data success.</p>";
        echo "<a href='adminShop.php' class='btn btn-primary'>Back to Home</a>";
    } else {
        echo "<p>Edit data failed.</p>";
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<a href='adminShop.php' class='btn btn-primary'>Try Again</a>";
    }
    
    $stmt->close();
    $conn->close();
?>