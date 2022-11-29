<?php
    session_start();
    include('../_dbconfig/dbconfig.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkPw = $conn->query("SELECT password FROM user WHERE email = '$email'");

    if ($checkPw->num_rows !== 1) {
        echo "<p>Log In failed.</p>";
        echo "<p>Account not found.<p>";
        echo "<a href='login.php' class='btn btn-primary'>Try Again</a>";
    } else {
        $selectUser = $conn->query("SELECT * FROM user WHERE email = '$email'")->fetch_assoc();
        $userId = $selectUser['id'];
        $userName = $selectUser['name'];
        $userEmail = $selectUser['email'];
        $checkPw = $checkPw->fetch_assoc()['password'];
        if (password_verify($password, $checkPw)) {
            // set session
            $_SESSION['userId'] = $userId;
            echo "<p>Log In success.</p>";
            echo "<p style=\"font-weight: bold\">Welcome back " . $userName . "</p>";
            echo "<a href='index.php' class='btn btn-primary'>Back To Home</a>";
        } else {
            echo "<p>Log In failed.</p>";
            echo "<p>Wrong password.<p>";
            echo "<a href='login.php' class='btn btn-primary'>Try Again</a>";
        }
    }
?>