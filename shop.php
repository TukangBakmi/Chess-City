<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header("Location: login.php");
    }
    include('_dbconfig/dbConfig.php');
    $selectProduct = $conn->query("SELECT * FROM shop");
    $payment = $conn->query("SELECT * FROM shop");
    $chkDate = $conn->query("SELECT * FROM shop WHERE date = CAST(CURRENT_TIMESTAMP AS DATE)");
?>

<!DOCTYPE html>
<html translate="no">
    <head>
        <?php include('_library/lib-include.php')?>
        <script src="_library/js/shop.js"></script>
        <title>Shop | Chess City</title>
        <link rel="shortcut icon" href="_library/image/Logo0.png">
        <link type="text/css" href="_library/css/shop.css" rel="stylesheet"/>
    </head>
    <body class="shop-content">
        <?php include('_framework/navigation.php') ?>
        <div class="container">
            <h1 style="color: white; text-align:center">Our Products</h1>
            <div class="row">
                <?php $var=0;?>
                <?php while($product = $selectProduct->fetch_assoc()):?>
                <div class="product-card d-flex flex-column">
                    <?php $product_id = $product['id'];?>
                    <?php $chkDate = $conn->query("SELECT * FROM shop WHERE date = CAST(CURRENT_TIMESTAMP AS DATE) AND id=$product_id")?>
                    <?php if($chkDate->num_rows === 1){
                        echo '<div class="badge" id="newProduct">New Product</div>';
                    }?>
                    <div class="product-image m-2">
                        <img src="administrator/images/products/<?=$product["picture"]?>">
                    </div>
                    <div class="product-details">
                        <h4><?=$product["name"]?></h4>
                        <p><?=$product["description"]?></p>
                        <div class="product-footer-details d-flex justify-content-between mb-3 mx-5">
                            <div class="product-price align-self-center">$<span id="price<?=$var?>"><?=$product["price"]?></span></div>
                            <div class="d-flex">
                                <button class="btn btn-red" id="min<?=$var?>"> - </button>
                                <p class="align-self-center my-2 mx-2 px-2 qty" id="qty<?=$var?>"> 0 </p>
                                <button class="btn btn-blue" id="plus<?=$var?>">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $var++;?>
                <?php endwhile;?>
                <button class="btn btn-green" id="btn-checkout">Check Out</button>
            </div>
        </div>

        <!-- Modal Pay Now -->
        <div class="modal fade" id="modalCheckOut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="page1">
                        <div class="modal-header">
                            <h2 class="modal-title">Payment Details</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ringkasan">
                            <?php $var=0;?>
                            <?php while($product = $payment->fetch_assoc()):?>
                                <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data" id="form<?=$var?>">
                                    <input type="hidden" value="<?=$_SESSION['userId']?>" id="userIdForm<?=$var?>" name="userIdForm">
                                    <input type="hidden" value="<?=$product["id"]?>" id="productIdForm<?=$var?>" name="productIdForm">
                                    <input type="hidden" value="<?=$product["name"]?>" id="nameForm<?=$var?>" name="nameForm">
                                    <input type="hidden" value="<?=$product["price"]?>" id="priceForm<?=$var?>" name="priceForm">
                                    <input type="hidden" value="0" id="qtyForm<?=$var?>" name="qtyForm">
                                    <input type="hidden" value="0" id="totalPriceForm<?=$var?>" name="totalPriceForm">
                                    <input type="hidden" value="0" id="receiptForm<?=$var?>" name="receiptForm">
                                </form>
                                <div class="row" id="detailProductMod<?=$var?>" style="border-bottom: 2px solid black">
                                    <div class="col-6">
                                        <h6 id="prodNameMod<?=$var?>"><?=$product["name"]?></h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>$<span id="priceMod<?=$var?>"><?=$product["price"]?></span></h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>x<span id="qtyMod<?=$var?>"></span></h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>$<span id="priceTotalMod<?=$var?>"></span></h6>
                                    </div>
                                </div>
                            <?php $var++;?>
                            <?php endwhile;?>
                            <div class="row">
                                <span class="col-10"></span>
                                <h5 class="total col-2">Total: $<span id="totalAllProduct"></span></h5>
                            </div>
                        </div>
                        <button id="payNow" type="button" class="btn btn-green">Check Out</button>
                    </div>
                    <div class="page2 d-none">
                        <div class="modal-header">
                            <h5 class="modal-title">Payment Summary</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data" id="formChgPass">
                                <div class="order mb-2">
                                    <h6>Receipt: <span id="receipt"></span></h6>
                                    <h6>Sub-Total: $<span id="nominal"></span></h6>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button id="btnCancelGenerateVA" type="button" class="btn btn-red generateVA">Cancel</button>
                            <button id="btnGenerateVA" type="button" class="btn btn-green generateVA">Check Out</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('_framework/footer.php') ?>
    </body>
</html>