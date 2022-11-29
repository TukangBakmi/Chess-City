<?php include('_dbconfig/dbconfig.php'); ?>
<header>
    <div class="container">
        <div class="header-left">
            <img class="logo" src="_library/image/logo2.png" style="height:65px;">
        </div>
        <div class="header-right">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./news.php">News</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="true">Lessons</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./basics.php">Basics</a></li>
                        <li><a class="dropdown-item" href="./strategies.php">Strategies</a></li>
                        <li><a class="dropdown-item" href="./puzzles.php">Puzzles</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About Us</a>
                </li>
                <?php
                    if(isset($_SESSION['userId'])){
                        $userId = $_SESSION['userId'];
                        $selectUser = $conn->query("SELECT * FROM user WHERE id = '$userId'")->fetch_assoc();
                        $userProfile = $selectUser['profile_picture'];
                        echo '<li class="nav-item">
                                <a class="d-flex align-items-center nav-link dropdown-toggle" data-bs-toggle="dropdown" 
                                role="button" aria-expanded="true">
                                <img id="profilImage" src="administrator/images/profile/'.$userProfile.'"/></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="shop.php">Shop</a></li>
                                    <li><a class="dropdown-item" href="contactus.php">Contact Us</a></li>
                                </ul></li>';
                    }
                    else{
                        echo '<li class="nav-item">
                                <a class="nav-link" href="./login.php">Log in</a>
                            </li>';
                    }
                ?>
            </ul>
        </div>
        <ul class="nav nav-pills navDrop" style="float: right; display:none">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="true">Menu</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./index.php">Home</a></li>
                    <li><a class="dropdown-item" href="./news.php">News</a></li>
                    <li><a class="dropdown-item" href="./basics.php">Basics</a></li>
                    <li><a class="dropdown-item" href="./strategies.php">Strategies</a></li>
                    <li><a class="dropdown-item" href="./puzzles.php">Puzzles</a></li>
                    <li><a class="dropdown-item" href="./aboutus.php">About Us</a></li>
                    <?php
                        if(isset($_SESSION['userId'])){
                            $userId = $_SESSION['userId'];
                            $selectUser = $conn->query("SELECT * FROM user WHERE id = '$userId'")->fetch_assoc();
                            $userProfile = $selectUser['profile_picture'];
                            echo '  <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="shop.php">Shop</a></li>
                                    <li><a class="dropdown-item" href="contactus.php">Contact Us</a></li>';
                        }
                        else{
                            echo '<li><a class="dropdown-item" href="./login.php">Log in</a></li>';
                        }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
</header>