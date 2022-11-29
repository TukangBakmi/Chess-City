<?php
    session_start();
    include('_dbconfig/dbConfig.php');
?>

<!DOCTYPE html>
<html translate="no">
  <head>
    <?php include('_library/lib-include.php')?>
    <title>Chess City</title>
    <link rel="shortcut icon" href="_library/image/Logo0.png">
    <link type="text/css" rel="stylesheet" href="_library/css/index.css">
  </head>
  <body>
    <?php include('_framework/navigation.php') ?>
    <div class="top-wrapper">
      <div class="container">
        <h1>CHESS CITY.</h1>
        <h1>LEARN, PRACTICE, AND PLAY.</h1>
        <p>Chess City is an online platform to help you practice chess for free.</p>
        <p>We provide lots of strategy and puzzles for you to improve your skill in chess.</p>
        <?php
          if(isset($_SESSION['userId'])){
            $userId = $_SESSION['userId'];
            $selectUser = $conn->query("SELECT * FROM user WHERE id = '$userId'")->fetch_assoc();
            $userName = $selectUser['name'];
            echo '<div class="btn-wrapper">
                    <a href="profile.php" class="btn btn-blue">Hello '.$userName.'!</a>
                  </div>';
          }
          else{
            echo '<div class="btn-wrapper">
                    <a href="login.php" class="btn btn-yellow">Log In</a>
                    <p>atau</p>
                    <a href="register.php" class="btn btn-green">Sign Up with Email</a>
                  </div>';
          }
        ?>
        
      </div>
    </div>
    <div class="lesson-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Find out where you want to start!</h2>
        </div>
        <div class="lessons row">
          <a href="basics.php" class="lesson box blue left">
            <span></span>
            <div class="content">
              <h2>Basics</h2>
              <p>If you want to learn to play chess correctly you first need to learn the basics. This section is designed to give you a basic understanding of chess.</p>
            </div>
          </a>
          <a href="strategies.php" class="lesson box red">
            <span></span>
            <div class="content">
              <h2>Strategies</h2>
              <p>Chess strategy is what makes chess such a beautiful game. We have a lot of strategies that will help you to improve your chess skill.</p>
            </div>
          </a>
          <a href="puzzles.php" class="lesson box green right">
            <span></span>
            <div class="content">
              <h2>Puzzles</h2>
              <p>One of the best ways to get better at chess is to practice harder. Let's try some puzzles to help you see more advantages in the game!</p>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="message-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Are you ready to become a professional chess player?</h2>
        </div>
        <a href="basics.php" class="btn message">Learn from basics</a>
      </div>
    </div>
    <?php include('_framework/footer.php') ?>
  </body>
</html>