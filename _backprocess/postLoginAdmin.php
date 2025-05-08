<?php
    session_start();
    include('../_dbconfig/dbconfig.php');

    $name = 'Albert';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkPw = $conn->query("SELECT password FROM admin WHERE email = '$email'");

    if ($checkPw->num_rows !== 1) {
        echo "<p>Log In failed.</p>";
        echo "<p>Account not found.<p>";
        echo "<a href='loginAdmin.php' class='btn btn-primary'>Try Again</a>";
    } else {
        $row = $checkPw->fetch_assoc();
        $storedHash = $row['password'];

        if (password_verify($password, $storedHash)) {
            // set session
            $_SESSION['name'] = $name;
            $_SESSION['adminEmail'] = $email;
            echo "<p>Log In success.</p>";
            echo "<p style=\"font-weight: bold\">Welcome back " . $name . ".</p>";
            echo "<a href='administrator/index.php' class='btn btn-primary'>Go to Admin Page</a>";
        } else {
            echo "<p>Log In failed.</p>";
            echo "<p>Wrong password.<p>";
            echo "<a href='loginAdmin.php' class='btn btn-primary'>Try Again</a>";
        }
    }
?>