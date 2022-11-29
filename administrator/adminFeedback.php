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
        <?php include('_framework/navigation.php') ?>
        <div class="container">
            <h3 class="text-center mt-3">FEEDBACK LIST</h3>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Text</th>
                    </tr>
                </thead>
                <tbody id="bodyFeedback">
                </tbody>
            </table>
        </div>
    </body>
</html>