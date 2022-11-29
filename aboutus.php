<?php
    session_start();
    include('_dbconfig/dbConfig.php');
    $selectImg=$conn->query('SELECT image FROM gallery');
?>

<!DOCTYPE html>
<html translate="no">
    <head>
        <?php include('_library/lib-include.php')?>
        <title>About Us | Chess City</title>
        <link rel="shortcut icon" href="_library/image/Logo0.png">
    </head>
    <body>
        <?php include('_framework/navigation.php') ?>
        <div id="aboutContent" class="d-flex flex-column align-items-center">
            <h1 class="text-center flex-grow-1 mb-4">About Us</h1>

            <div id="aboutWebContent" class="d-flex flex-column align-items-center">
                <div class="d-flex flex-column align-items-center text-center p-2">
                    <img id="webLogo" src="_library/image/Logo0.png"/>
                </div>
                <h2 class="text-center p-2">Chess City</h2>
                <p class="text-center p-2 aboutWebContent">
                    Chess City is a website that can help improve your chess skills for free.
                    We provide the latest news about chess. We also provide lots of strategies,
                    tactics, and puzzles that will make you even better at playing chess.
                </p>
            </div>



            <div id="aboutGalContent" class="d-none d-flex flex-column align-items-center mb-5" style="width:498px; height:300px;">
                <div id="carouselExampleControls" class="carousel slide gallery-foto d-flex justify-content-center" data-bs-ride="true">
                    <div class="carousel-inner">
                        <?php $var=0;?>
                        <?php while($img = $selectImg->fetch_assoc()):?>
                            <?php if($var == 0){
                                echo'
                                <div class="carousel-item active">
                                    <img src="administrator/images/gallery/'.$img["image"].'" class="d-block w-100" style="width:498px; height:300px;">
                                </div>';
                            } else{
                                echo'
                                <div class="carousel-item" style="width:498px; height:300px;">
                                    <img src="administrator/images/gallery/'.$img["image"].'" class="d-block w-100">
                                </div>';
                            }
                            ?>
                        <?php $var++;?>
                        <?php endwhile;?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>



            <div id="aboutDevContent" class="d-none d-flex flex-column align-items-center">
                <div class="d-flex flex-column align-items-center text-center p-2">
                    <img id="devLogo" src="_library/image/aboutDev.jpeg"/>
                </div>
                <h2 class="text-center p-2">Albert Ardiansyah</h2>
                <p class="text-center p-2 aboutDevContent">
                    Hello! My name is Albert Ardiansyah. I am the developer of this chess
                    website. I am currently studying at Krida Wacana Christian
                    University and majored in Informatics. I was born in Jakarta on August 12, 2002.
                </p>
            </div>

            <div class="d-flex justify-content-center flex-wrap">
                <span class="d-flex align-items-center p-2"><button id="btnAboutWeb" class="btn btn-yellow">Chess City</button></span>
                <span class="d-flex align-items-center p-2"><button id="btnAboutGallery" class="btn btn-blue">Gallery</button></span>
                <span class="d-flex align-items-center p-2"><button id="btnAboutDev" class="btn btn-green">Developer</button></span>
            </div>
        </div>
        <?php include('_framework/footer.php') ?>
    </body>
</html>