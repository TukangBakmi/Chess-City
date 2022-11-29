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
        <script src="_library/js/users.js"></script>
        <title>Chess City</title>
    </head>
    <body class="bg-secondary">
        <?php include('_framework/navigation.php') ?>
        <div class="container">
            <h3 class="text-center mt-3">USERS</h3>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Joined</th>
                        <th scope="col" style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody id="bodyUser">
                </tbody>
            </table>
        </div>
    </body>
</html>