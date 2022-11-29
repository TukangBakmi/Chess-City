<?php

    include('../../_dbconfig/dbconfig.php');
    require 'uploadImage.php';

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO news (title,content,author_id,image) VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $content, $author, $image);

    // set parameters
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $nameAuthor = $_POST['nameAuthor'];
    $image = 'default';

    if(isset($_POST['newAuthor'])){
        $conn->query("INSERT INTO authors (name) VALUES('$nameAuthor')");
        $author= $conn->query("SELECT * FROM authors WHERE name='$nameAuthor'")->fetch_assoc()['id'];
    }

    if(isset($_FILES['image']) && $_FILES['image']['error'] !== 4){
        $image = uploadImage($_FILES['image'], '../../images/news/');
        if(!$image){
            echo "<p>Error.</p>";
            echo "<p>Upload image failed.</p>";
            echo "<a href='index.php' class='btn btn-primary'>Try Again</a>";
            return;
        }
    }else{
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO news (title,content,author_id) VALUES(?, ?, ?)");
        $stmt->bind_param("sss", $title, $content, $author);
    }

    if($stmt->execute()){
        echo "<p>Insert data success.</p>";
        echo "<a href='index.php' class='btn btn-primary'>Back to Home</a>";
    } else {
        echo "<p>Insert data failed.</p>";
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<a href='index.php' class='btn btn-primary'>Try Again</a>";
    }
    
    $stmt->close();
    $conn->close();
?>