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
        <script src="_library/js/shop.js"></script>
        <title>Chess City</title>
    </head>
    <body class="bg-secondary">
        <?php include('_framework/navigation.php') ?>
        <div class="container">
            <h3 class="text-center mt-3">PRODUCT LIST</h3>
            <!-- Button trigger modal -->
            <button id="btnNewProduct" type="button" class="btn btn-primary" data-bs-toogle="modal">
                Add Product
            </button>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col" style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody id="product">
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data" id="formAdd">
                            <input type="hidden" name="id">
                            <div class="mb-3">
                                <label class="col-form-label">Name:</label>
                                <input type="text" value="" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Description:</label>
                                <input type="text" value="" class="form-control" id="description" name="description" required>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Price:</label>
                                <input type="text" value="" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3"> 
                                <label for="image">Image:</label>
                                <div class="container-imgpreview mx-auto d-flex justify-content-center position-relative">
                                    <div class="position-absolute w-100 h-100 rounded 
                                    img-overlay d-flex justify-content-around align-items-center" id="imgOverlay">
                                    </div>
                                    <img src="images/products/default.png"  alt="image" id="imgPreview"
                                    class="w-100 h-100 object-fit-cover rounded mb-3"/>
                                </div>
                                <input type="file" class="form-control mt-2 d-none" id="image" name="image">
                            </div>
                            <div class="modal-footer">
                                <button id="btnClose" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button id="btnSave" type="button" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>