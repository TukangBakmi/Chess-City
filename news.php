<?php
    session_start();
    include('_dbconfig/dbConfig.php');
    $selectNews = $conn->query("SELECT n.title,n.date,n.content,n.image,a.name FROM news n LEFT JOIN authors a ON a.id = n.author_id") or die($conn->error);
?>

<!DOCTYPE html>
<html translate="no">
    <head>
        <?php include('_library/lib-include.php')?>
        <title>News | Chess City</title>
        <link rel="shortcut icon" href="_library/image/Logo0.png">
        <link type="text/css" href="_library/css/news.css" rel="stylesheet"/>
    </head>
    <body class="news-content">
        <?php include('_framework/navigation.php') ?>
        <div class="container">
            <h1 style="color: white; text-align:center">News</h1>
            <div class="row">
                <?php $var=0;?>
                <?php while($news = $selectNews->fetch_assoc()):?>
                <div class="news-card d-flex flex-column">
                    <div class="news-image m-2">
                        <img style="width: 80%" src="administrator/images/news/<?=$news["image"]?>">
                    </div>
                    <div class="news-details">
                        <div class="d-flex justify-content-between mb-3 mx-5">
                            <p style="border: none"> Date Published: <?=$news["date"]?></p>
                            <p style="border: none"> Authors: <?=$news["name"]?></p>
                        </div>
                    </div>
                    <h2 style="border-bottom: 1px solid black"><?=$news["title"]?></h2>
                    <p><?=$news["content"]?></p>
                </div>
                <?php $var++;?>
                <?php endwhile;?>
            </div>
        </div>
        <?php include('_framework/footer.php') ?>
    </body>
</html>