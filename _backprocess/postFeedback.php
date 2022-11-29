<?php
    session_start();
    include('../_dbconfig/dbconfig.php');

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO feedback (user_id,name,text) VALUES (?, ?, ?)");
    $stmt->bind_param("dss", $userId, $userName, $text);

    // set parameters
    $userId = $_SESSION['userId'];
    $selectUser = $conn->query("SELECT * FROM user WHERE id='$userId'")->fetch_assoc();
    $userName = $selectUser['name'];
    $text = $_POST['feedback'];
            
    if($stmt->execute()){
        echo "Your feedback has been sent successfully";
    }else{
        echo "Your feedback was not sent";
    }

    $stmt->close();
    $conn->close();
?>