<?php
    session_start();
    include('../_dbconfig/dbconfig.php');
    $userId = $_SESSION['userId'];

    $password = $_POST['currentPass'];
    $checkPw = $conn->query("SELECT password FROM user WHERE id = '$userId'");
    $checkPw = $checkPw->fetch_assoc()['password'];
    
    if (password_verify($password, $checkPw)) {
        $_SESSION['checkPass'] = true;
        echo "<script>$('#boxCurrentPass').addClass('d-none');</script>";
        echo "<script>$('#boxChangePass').removeClass('d-none');</script>";
        echo "<script>$('#boxConfirmPass').removeClass('d-none');</script>";
        echo '<script>$("#btnSaveChgPass").addClass("d-none");</script>';
        echo '<script>$("#btnSaveNewPass").removeClass("d-none");</script>';
    } else {
        echo "<p style='color:red'>Wrong password.<p>";
    }
?>