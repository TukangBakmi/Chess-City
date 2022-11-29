<?php
    session_start();
    include('_dbconfig/dbconfig.php');
    if(!isset($_SESSION['userId'])){
        header("Location: login.php");
    }
    $userId = $_SESSION['userId'];
    $selectUser = $conn->query("SELECT * FROM user WHERE id = $userId")->fetch_assoc();
?>

<!DOCTYPE html>
<html translate="no">
    <head>
        <?php include('_library/lib-include.php')?>
        <title>Contact | Chess City</title>
        <link rel="shortcut icon" href="_library/image/Logo0.png">
    </head>
    <body id="bgContact">
        <?php include('_framework/navigation.php') ?>
        <div class="contactus d-flex justify-content-center" data-aos="fade-up" data-aos-duration="2400">
            <div class="lesson box color left">
                <span></span>
                <div class="content">
                    <div class="d-flex flex-column align-items-center text-center p-2">
                        <img id="webLogoContact" src="_library/image/Logo0.png"/>
                    </div>
                    <h2 class="mb-3" style="border-bottom: 2px solid white">Contact Us</h2>
                    <div class="d-flex flex-column align-items-center mb-2">
                        <h4>Phone:</h4>
                        <p class="text-center px-2 mt-0">
                        087881003310
                        </p>
                    </div>
                    <div class="d-flex flex-column align-items-center mb-5">
                        <h4>Email:</h4>
                        <p class="text-center px-2 mt-0">
                        chesscity124@gmail.com<br>
                        albert.412020031@civitas.ukrida.id
                        </p>
                    </div>
                    <h2 class="mb-3" style="border-bottom: 2px solid white">Feedback</h2>
                    <form autocomplete="on" method="POST" id="formFeedback">
                        <textarea id="feedbackText" name="feedback" type="text" class="input-text col-8" placeholder="Input your feedback here."></textarea>
                        <div class="d-flex justify-content-center">
                            <button id="submitFeedback" type="button" class="btn btn-yellow">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include('_framework/footer.php') ?>
        <script>
            AOS.init();
        </script>
    </body>
</html>