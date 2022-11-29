<?php
    session_start();
    include('../_dbconfig/dbconfig.php');
    require '../administrator/_library/_php/uploadImage.php';

    // prepare and bind
    $stmt = $conn->prepare("UPDATE user SET name=?,email=?,phone=?,
                            address=?,gender=?, profile_picture=? WHERE id=?");
    $stmt->bind_param("sssssss", $name, $email, $phone, $address, $gender, $image, $userId);

    // set parameters
    $userId = $_SESSION['userId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $image = 'default';

    $chkEmail = $conn->query("SELECT * FROM user WHERE email = '$email' AND NOT id = '$userId'");

    if(isset($_FILES['profilePict']) && $_FILES['profilePict']['error'] !== 4){
        $image = uploadImage($_FILES['profilePict'], '../administrator/images/profile/');
        if(!$image){
            echo "Upload image failed.";
            return;
        }
    }else{
        // prepare and bind
        $stmt = $conn->prepare("UPDATE user SET name=?,email=?,phone=?,
        address=?,gender=? WHERE id=?");
        $stmt->bind_param("sssssd", $name, $email, $phone, $address, $gender, $userId);    
    }

    if($chkEmail->num_rows !== 1){
        if($stmt->execute()){
            echo "Edit profile success.";
        } else {
            echo "Edit data failed.";
        }
    } else{
        echo "Email is already used.";
    }
    
    $stmt->close();
    $conn->close();
?>