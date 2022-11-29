<?php
    include('../_dbconfig/dbconfig.php');

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO transaction (user_id,product_id,product_name,price,quantity,total_price,receipt) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisiiis", $userid, $productid,$productname, $price, $quantity, $totalprice, $receipt);

    // set parameters
    $userid = $_POST['userIdForm'];
    $productid = $_POST['productIdForm'];
    $productname = $_POST['nameForm'];
    $price = $_POST['priceForm'];
    $quantity = $_POST['qtyForm'];
    $totalprice = $_POST['totalPriceForm'];
    $receipt = $_POST['receiptForm'];
    
    $stmt->execute();

    $stmt->close();
    $conn->close();
?>