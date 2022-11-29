<?php
    session_start();
    include('../_dbconfig/dbconfig.php');

    // prepare and bind
    $stmt = $conn->prepare("UPDATE user SET password=? WHERE id = ?");
    $stmt->bind_param("sd", $passwordHash, $userId);

    // set parameters
    $userId = $_SESSION['userId'];
    $passwordHash = password_hash($_POST['changePass'], PASSWORD_DEFAULT);

    if ($stmt->execute()) {
        echo "<p>Password Updated.</p>";
        echo "<a href='profile.php' class='btn btn-primary'>Back to Profile</a>";
        echo "<script>$('#btnSaveNewPass').addClass('d-none');</script>";
        echo "<script>$('#btnCloseChgPass').addClass('d-none');</script>";
    } else {
        echo "<p>Update Password failed.</p>";
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<a href='profile.php' class='btn btn-primary'>Try Again</a>";
    }

    $stmt->close();
    $conn->close();
?>