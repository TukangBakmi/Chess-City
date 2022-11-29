<?php

    include('../../_dbconfig/dbconfig.php');
    require 'uploadImage.php';

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO gallery (name,image) VALUES(?, ?)");
    $stmt->bind_param("ss", $name, $image);

    // set parameters
    $name = $_POST['name'];
    $image = 'default';

    if(isset($_FILES['image']) && $_FILES['image']['error'] !== 4){
        $image = uploadImage($_FILES['image'], '../../images/gallery/');
        if(!$image){
            echo "<p>Error.</p>";
            echo "<p>Upload image failed.</p>";
            echo "<a href='adminGallery.php' class='btn btn-primary'>Try Again</a>";
            return;
        }
        if($stmt->execute()){
            echo "<p>Insert data success.</p>";
            echo "<a href='adminGallery.php' class='btn btn-primary'>Back to Home</a>";
        } else {
            echo "<p>Insert data failed.</p>";
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<a href='adminGallery.php' class='btn btn-primary'>Try Again</a>";
        }
    }else{
        echo "<p>Insert data failed.</p>";
        echo "<p> Please insert a picture.</p>";
        echo "<a href='adminGallery.php' class='btn btn-primary'>Try Again</a>";
    }

    $stmt->close();
    $conn->close();
?>