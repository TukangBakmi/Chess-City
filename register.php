<?php
    session_start();
    include('_dbconfig/dbConfig.php');
    if(isset($_SESSION['userId'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html translate="no">
    <head>
        <?php include('_library/lib-include.php')?>
        <title>Sign Up | Chess City</title>
        <link rel="shortcut icon" href="_library/image/Logo0.png">
    </head>
    <body>
        <div class="login-register" data-aos="fade-up" data-aos-duration="2000">
            <div class="box color left">
                <span></span>
                <div class="content">
                    <h2>Register</h2>
                    <form autocomplete="on" method="POST" id="formRegister">
                        <div class="row mt-4">
                            <label id="nameLabel" class="input-label col-4">Name: </label>
                            <input id="name" name="name" type="text" class="input-text col-8" value="">
                        </div>
                        <div class="row mt-4">
                            <label id="emailLabel" class="input-label col-4">Email: </label>
                            <input id="email" name="email" type="email" class="input-text col-8" value="">
                        </div>
                        <div class="row mt-4">
                            <label id="passwordLabel" class="input-label col-4">Password: </label>
                            <input id="password" name="password" type="password" class="input-text col-8" value="">
                        </div>
                        <div class="row mt-4">
                            <label id="phoneLabel" class="input-label col-4">Phone: </label>
                            <input id="phone" name="phone" type="text" class="input-text col-8" value="">
                        </div>
                        <div class="row mt-4">
                            <label id="addressLabel" class="input-label col-4">Address: </label>
                            <input id="address" name="address" type="text" class="input-text col-8" value="">
                        </div>
                        <div class="row button">
                            <button id="regBack" class="btn btn-red">Back</button>
                            <button id="signUp" type="button" class="btn btn-green">Sign Up</button>
                        </div>
                        <div class="row">
                            <p class="mt-0">Already have an account? <a href="login.php" class="admin">Log In Here!</a></p>
                            <a href="loginAdmin.php" class="admin">Log In Admin</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            AOS.init();
        </script>
    </body>
</html>