<?php
    session_start();
    include('../_dbconfig/dbconfig.php');

    // prepare and bind
    $stmt = $conn->prepare("UPDATE user SET profile_picture=default WHERE id=?");
    $stmt->bind_param("d", $userId);

    // set parameters
    $userId = $_SESSION['userId'];
    $stmt->execute();

    $stmt->close();
    $conn->close();
?>