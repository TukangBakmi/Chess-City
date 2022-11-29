<?php

if(isset($_REQUEST['req'])){

    include('../../_dbconfig/dbconfig.php');
    $req = $_REQUEST['req'];


    // ------------------------------------------------ News ------------------------------------------------
    if($req=="rows"){
        $result = $conn->query("SELECT a.id, title, date, content, author_id, b.name AS author, image FROM news a
        LEFT JOIN authors b ON a.author_id = b.id");
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
    }
    if($req=="author"){
        $result = $conn->query("SELECT * FROM authors");
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
    }
    if ($req == 'newsRecord') {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM news WHERE id = $id");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }



    // ------------------------------------------------ Shop ------------------------------------------------
    if($req=="product"){
        $result = $conn->query("SELECT * FROM shop");
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
    }
    if ($req == 'productsRecord') {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM shop WHERE id = $id");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }



    // ------------------------------------------------ Gallery ------------------------------------------------
    if($req=="gallery"){
        $result = $conn->query("SELECT * FROM gallery");
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
    }
    if ($req == 'galleryRecord') {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM gallery WHERE id = $id");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }



    // ---------------------------------------------- Feedback ----------------------------------------------
    if($req=="feedback"){
        $result = $conn->query("SELECT id, name, date, text FROM feedback");
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
    }



    // ---------------------------------------------- History ----------------------------------------------
    if($req=="history"){
        $result = $conn->query("SELECT t.id, u.name AS username, product_name, price, quantity, total_price, receipt, date_purchased FROM transaction t LEFT JOIN user u ON t.user_id=u.id");
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
    }



    // ---------------------------------------------- Receipt ----------------------------------------------
    if($req=="receipt"){
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM transaction WHERE receipt='$id'");
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
    }



    // ---------------------------------------------- User ----------------------------------------------
    if($req=="user"){
        $result = $conn->query("SELECT * FROM user");
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
    }
    echo json_encode($data);
}
?>