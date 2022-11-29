<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header("Location: login.php");
    }
    include('_dbconfig/dbConfig.php');
    $user = $_SESSION['userId'];
    $selectReceipt=$conn->query("SELECT DISTINCT receipt FROM transaction WHERE user_id='$user'");
?>

<!DOCTYPE html>
<html translate="no">
    <head>
        <?php include('_library/lib-include.php')?>
        <script src="_library/js/history.js"></script>
        <title>About Us | Chess City</title>
        <link rel="shortcut icon" href="_library/image/Logo0.png">
    </head>
    <body>
        <?php include('_framework/navigation.php') ?>
        <div id="historyContent" class="d-flex flex-column align-items-center">
            <h1 class="text-center flex-grow-1 my-5 py-5">Transaction History</h1>
            <?php $var=0?>
            <?php while($rec = $selectReceipt->fetch_assoc()):?>
                <?php $r = $rec["receipt"]?>
                <?php $selectTrans=$conn->query("SELECT * FROM transaction WHERE receipt='$r'")->fetch_assoc();?>
                    <div class="transaction">
                        <h6>Receipt: <span><?=$rec["receipt"]?></span></h6>
                        <h6>Date Purchased: <span><?=$selectTrans["date_purchased"]?></span></h6>
                        <button id="detailHistory<?=$var?>" onclick="showDetails(this)" data-id="<?=$rec["receipt"]?>" data-date="<?=$selectTrans["date_purchased"]?>" class="btn btn-yellow">View Details</button>
                    </div>
            <?php $var++?>
            <?php endwhile;?>
        </div>


        <!-- Modal Detail History -->
        <div class="modal fade" id="modalDtlHist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Transaction Details</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 style="font-weight: bold">Receipt: <span id="receiptMod"></span></h5>
                        <h5 style="font-weight: bold">Date Purchased: <span id="datePurcMod"></span></h5>
                        <div class="row" id="productMod"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('_framework/footer.php') ?>
    </body>
</html>