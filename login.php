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
        <title>Log In | Chess City</title>
        <link rel="shortcut icon" href="_library/image/Logo0.png">
    </head>
    <body>
        <div class="login-register" data-aos="fade-up" data-aos-duration="2400">
            <div href="basics.php" class="lesson box color left">
                <span></span>
                <div class="content">
                    <h2>Login</h2>
                    <form autocomplete="on" method="POST" id="formLogin">
                        <div class="row my-5">
                            <label id="emailLabel" class="input-label col-4">Email: </label>
                            <input id="email" name="email" type="email" class="input-text col-8" required>
                        </div>
                        <div class="row my-5">
                            <label id="passwordLabel" class="input-label col-4">Password: </label>
                            <input id="password" name="password" type="password" class="input-text col-8" required>
                        </div>
                        <div class="row">
                            <button id="logBack" class="btn btn-red">Back</button>
                            <button id="login" type="button" class="btn btn-yellow">Log In</button>
                        </div>
                        <p class="mt-0">Don't have an account? <a href="register.php" class="admin">Register Here!</a></p>
                        <a href="loginAdmin.php" class="admin">Log In Admin</a>
                    </form>
                </div>
            </div>
        </div>
        <script>
            AOS.init();
        </script>
    </body>
</html>