<?php
    session_start();
    include('_dbconfig/dbconfig.php');
    if(!isset($_SESSION['userId'])){
        header("Location: login.php");
    }
    $userId = $_SESSION['userId'];
    $selectUser = $conn->query("SELECT * FROM user WHERE id = '$userId'")->fetch_assoc();
    $userProfile = $selectUser['profile_picture'];
    $userName = $selectUser['name'];
    $userEmail = $selectUser['email'];
    $userPassword = $selectUser['password'];
    $userPhone = $selectUser['phone'];
    $userAddress = $selectUser['address'];
    $userGender = $selectUser['gender'];
?>

<!DOCTYPE html>
<html translate="no">
    <head>
        <?php include('_library/lib-include.php')?>
        <title>Edit Profile | Chess City</title>
        <link rel="shortcut icon" href="_library/image/Logo0.png">
        <script src="_library/js/editProfile.js"></script>
    </head>
    <body>
        <?php include('_framework/navigation.php') ?>
        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data" id="formEditProfile">
            <div class="row">
                <div class="col-4 d-flex flex-column align-items-center text-center"> 
                    <label for="image">Profile Picture:</label>
                    <div class="mx-auto d-flex justify-content-center position-relative">
                        <img src="administrator/images/profile/<?=$userProfile?>"  alt="image" id="imgPreview" name="image"/>
                    </div>
                    <button id="btnDelProfPict" type="button" class="btn btn-yellow">Delete</button>
                    <input type="file" class="form-control d-none" id="profilePict" name="profilePict">
                </div>
                <div class="col-8">
                    <input type="hidden" name="id">
                    <div class="mb-3">
                        <label class="col-form-label">Name:</label>
                        <input type="text" value="<?=$userName?>" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Email:</label>
                        <input type="text" value="<?=$userEmail?>" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Phone:</label>
                        <input type="text" value="<?=$userPhone?>" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Address:</label>
                        <input type="text" value="<?=$userAddress?>" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Gender:</label>
                        <div class="form-check-inline mx-1">
                            <input type="radio" class="form-check-input" id="male" name="gender" value="male"
                                <?php if($userGender === "male"){echo"checked";}?>>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check-inline mx-1">
                            <input type="radio" class="form-check-input" id="female" name="gender" value="female"
                                <?php if($userGender === "female"){echo"checked";}?>>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check-inline mx-1">
                            <input type="radio" class="form-check-input" id="unknown" name="gender" value="unknown"
                                <?php if($userGender === "unknown"){echo"checked";}?>>
                            <label class="form-check-label" for="unknown">Unknown</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnCloseProfile" type="button" class="btn btn-red">Back</button>
                        <button id="btnSaveProfile" type="button" class="btn btn-blue">Save</button>
                    </div>
                </div>
            </div>
        </form>
        <?php include('_framework/footer.php') ?>
    </body>
</html>