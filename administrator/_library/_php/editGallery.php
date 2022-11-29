<?php

    include('../../_dbconfig/dbconfig.php');
    require 'uploadImage.php';

    // prepare and bind
    $stmt = $conn->prepare("UPDATE gallery SET name=?,image=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $image, $id);

    // set parameters
    $id = $_POST['id'];
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
    }else{
        // prepare and bind
        $stmt = $conn->prepare("UPDATE gallery SET name=? WHERE id=?");
        $stmt->bind_param("si", $name, $id);
    }

    
    if($stmt->execute()){
        echo "<p>Edit data success.</p>";
        echo "<a href='adminGallery.php' class='btn btn-primary'>Back to Home</a>";
    } else {
        echo "<p>Edit data failed.</p>";
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<a href='adminGallery.php' class='btn btn-primary'>Try Again</a>";
    }
    
    $stmt->close();
    $conn->close();
?>