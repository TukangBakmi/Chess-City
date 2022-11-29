$(function(){

    var price = [];
    var text = [];
    var subTotalPrice = 0;
    $(".product-card").each(function( index ) {
        // harga masing-masing produk
        price[index] = parseInt($("#price"+index).html());
        // jika tombol min ditekan
        $('#min'+index).on('click', function(){
            // mengambil kuantiti saat ini
            text[index] = parseInt($("#qty"+index).html());
            // menguranginya dengan 1
            if(text[index] === 0){
                $("[id='qty"+index+"']").text(0);
            }else{
                $("[id='qty"+index+"']").text(text[index] - 1);
            }
        });
        // jika tombol plus ditekan
        $('#plus'+index).on('click', function(){
            // mengambil kuantiti saat ini
            text[index] = parseInt($("#qty"+index).html());
            // menambahnya dengan 1
            $("[id='qty"+index+"']").text(text[index] + 1);
        });
    });





    // Menampilkan modal add
    $('#btn-checkout').click(function(){
        const genRand = (len) => {
            return Math.random().toString(36).substring(2,len+5);
        }
        $("#receipt").text(genRand(8));
        // page 1
        var qty = [];
        var pricePc = [];
        var allProductPrice = 0;
        $(".product-card").each(function( index ) {
            // mengambil kuantiti setiap barang
            qty[index] = parseInt($('#qty'+index).html());
            pricePc[index] = parseInt($('#priceMod'+index).html());
            // Jika user tidak membeli produk, display none
            if(parseInt($("#qty"+index).html()) <= 0){
                $('#detailProductMod'+index).addClass('d-none');
            }else{
                $('#qtyForm'+index).val(qty[index]);    //mengisi form
                $('#totalPriceForm'+index).val(qty[index]*pricePc[index]);    //mengisi form
                $('#detailProductMod'+index).removeClass('d-none');
            }
            // menampilkan kuantiti di modal
            $("[id='qtyMod"+index+"']").text(qty[index]);
            // menampilkan total harga di modal
            $("[id='priceTotalMod"+index+"']").text(qty[index]*pricePc[index]);
            allProductPrice += parseInt($('#priceTotalMod'+index).html());
        })
        $("#totalAllProduct").text(allProductPrice);
        $('#modalCheckOut').modal('show');
    })





    $('#payNow').on('click', function(){
        if(parseInt($('#totalAllProduct').html()) == 0){
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'No Products Purchased',
                timer: 1500
            }).then(function() {
                window.location = "shop.php";
            });
        } else{
            $('.page1').addClass('d-none');
            $('.page2').removeClass('d-none');
            // page 2
            $("#receipt2").text($('#receipt').html());
            // total
            subTotalPrice = parseInt($('#totalAllProduct').html());
            $("#nominal").text(subTotalPrice);
        }
    })





    $('#btnCancelGenerateVA').on('click', function () {
        window.location = "shop.php";
    });





    $('#btnGenerateVA').on('click', function () {
        $(".product-card").each(function( index ) {
            if(parseInt($("#qty"+index).html()) > 0){
                $('#receiptForm'+index).val($('#receipt').html());    //mengisi form
                var dataSend = $('#form'+index).serialize();
                $.ajax({
                    type: 'POST',
                    url: '_backprocess/postTransaction.php',
                    data: dataSend,
                    dataType: 'html',
                    success: function(result){
                    }
                })
            }
        })
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location = "shop.php";
        });
    });
})