<?php
    session_start();
    include('_dbconfig/dbConfig.php');
    if(!isset($_SESSION['adminEmail'])){
        header("Location: ../loginAdmin.php");
    }
?>

<!DOCTYPE html>
<html translate="no">
    <head>
        <?php include('_library/lib-include.php')?>
        <title>Chess City</title>
    </head>
    <body class="bg-secondary">
    <script src="_library/js/history.js"></script>
        <?php include('_framework/navigation.php') ?>
        <div class="container">
            <h3 class="text-center mt-3">HISTORY</h3>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Receipt</th>
                        <th scope="col">Date Purchased</th>
                    </tr>
                </thead>
                <tbody id="bodyHistory">
                </tbody>
            </table>
        </div>
    </body>
</html>