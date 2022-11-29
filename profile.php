<?php
    session_start();
    include('_dbconfig/dbconfig.php');
    if(!isset($_SESSION['userId'])){
        header("Location: login.php");
    }
    $userId = $_SESSION['userId'];
    $selectUser = $conn->query("SELECT * FROM user WHERE id = $userId")->fetch_assoc();
?>

<!DOCTYPE html>
<html translate="no">
    <head>
        <?php include('_library/lib-include.php')?>
        <title>Profile | Chess City</title>
        <link rel="shortcut icon" href="_library/image/Logo0.png">
    </head>
    <body>
        <?php include('_framework/navigation.php') ?>
        <div style="min-height:100vh" id="profileContent">
            <h1 class="text-center m-0 px-2 flex-grow-1">Profile</h1>

            <div class="d-flex flex-column align-items-center text-center p-2">
                <?php
                    $userProfile = $selectUser['profile_picture'];
                    $dateJoin = $selectUser['date_joined'];
                    $userName = $selectUser['name'];
                    $userEmail = $selectUser['email'];
                    echo '<img id="profile-image" src="administrator/images/profile/'.$userProfile.'"/>';
                    echo '<p class="mb-4">Date joined: '.$dateJoin.'</p>';
                    echo '<h2>'.$userName.'</h2>';
                    echo '<h6>'.$userEmail.'</h6>';
                ?>
            </div>

            <div class="d-flex justify-content-center flex-wrap">
                <span class="d-flex align-items-center p-2"><button id="btnEditProf" class="btn btn-blue">Edit Profile</button></span>
                <span class="d-flex align-items-center p-2"><button id="btnChgPass" class="btn btn-green">Change Password</button></span>
                <span class="d-flex align-items-center p-2"><button id="btnTransHist" class="btn btn-yellow">Transaction History</button></span>
                <span class="d-flex align-items-center p-2"><button id="btnLogout" class="btn btn-red">Log Out</button></span>
            </div>
        </div>

        <!-- Modal Change Password -->
        <div class="modal fade" id="modalChgPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data" id="formChgPass">
                            <input type="hidden" name="id">
                            <div id="boxCurrentPass" class="mb-3">
                                <label class="col-form-label">Current Password:</label>
                                <input type="password" value="" class="form-control" id="currentPass" name="currentPass" required>
                            </div>
                            <div id="boxChangePass" class="mb-3 d-none">
                                <label class="col-form-label">New Password:</label>
                                <input type="password" value="" class="form-control" id="changePass" name="changePass" required>
                            </div>
                            <div id="boxConfirmPass" class="mb-3 d-none">
                                <label class="col-form-label">Confirm Password:</label>
                                <input type="password" value="" class="form-control" id="confirmPass" name="confirmPass" required>
                            </div>
                            <div class="form-check-inline m-2 showPassword">
                                <input type="checkbox" class="form-check-input" id="showPassword" name="showPassword">
                                <label class="form-check-label" for="showPassword">Show Password</label>
                            </div>
                            <span id="checkPass"></span>
                        </form>
                        <div class="modal-footer">
                            <button id="btnCloseChgPass" type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button id="btnSaveChgPass" type="button" class="btn btn-primary">Next</button>
                            <button id="btnSaveNewPass" type="button" class="btn btn-primary d-none">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('_framework/footer.php') ?>
    </body>
</html>