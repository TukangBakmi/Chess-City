<?php
    include('../_dbconfig/dbconfig.php');

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO user (email,name,password,phone,address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $email, $name, $passwordHash, $phone, $address);

    // set parameters
    $name = $_POST['name'];
    $email = $_POST['email'];
    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $chkEmail = $conn->query("SELECT * FROM user WHERE email='$email'");
    
            
    if($chkEmail->num_rows === 1){
        echo "<p>Registration failed.</p>";
        echo "<p>Email is already used.</p>";
        echo "<a href='register.php' class='btn btn-primary'>Try Again</a>";
    } else {
        if($stmt->execute()){
            echo "<p>Registration success.</p>";
            echo "<p style=\"font-weight: bold\">Hello " . $name . "</p>";
            echo "<a href='login.php' class='btn btn-primary'>Log In</a>";
        }else{
            echo "<p>Registration failed.</p>";
            echo "<a href='register.php' class='btn btn-primary'>Try Again</a>";
        }
    }

    $stmt->close();
    $conn->close();
?>