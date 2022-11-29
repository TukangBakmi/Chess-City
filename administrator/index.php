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
        <script src="_library/js/news.js"></script>
        <title>Chess City</title>
    </head>
    <body class="bg-secondary">
        <?php include('_framework/navigation.php') ?>
        <div class="container">
            <h3 class="text-center mt-3">NEWS LIST</h3>
            <!-- Button trigger modal -->
            <button id="btnNew" type="button" class="btn btn-primary" data-bs-toogle="modal">
                Add News
            </button>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date Published</th>
                        <th scope="col">Content</th>
                        <th scope="col">Author</th>
                        <th scope="col">Image</th>
                        <th scope="col" style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody id="news">
                </tbody>
            </table>
        </div>

        <!-- Modal Add -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Add News</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data" id="formAdd">
                            <input type="hidden" name="id">
                            <div class="mb-3">
                                <label class="col-form-label">Title:</label>
                                <input type="text" value="" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Content:</label>
                                <input type="text" value="" class="form-control" id="content" name="content" required>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Author:</label>
                                <div class="form-check-inline mx-1 newAuthor">
                                    <input type="checkbox" class="form-check-input" id="newAuthor" name="newAuthor">
                                    <label class="form-check-label" for="newAuthor">New Author</label>
                                </div>
                                <select class="form-select" id="author" name="author">
                                </select>
                                <input type="text" value="" class="form-control d-none" id="nameAuthor" name="nameAuthor" required>
                            </div>
                            <div class="mb-3"> 
                                <label for="image">Image:</label>
                                <div class="container-imgpreview mx-auto d-flex justify-content-center position-relative">
                                    <div class="position-absolute w-100 h-100 rounded 
                                    img-overlay d-flex justify-content-around align-items-center" id="imgOverlay">
                                    </div>
                                    <img src="images/default.png"  alt="image" id="imgPreview"
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