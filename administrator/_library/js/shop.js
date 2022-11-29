$(this).ready(function(){
    // Menampilkan data
    getProduct();
    function getProduct(){
        $.ajax({
            type: "GET",
            url: "_library/_php/action.php",
            data: {req:'product'},
            dataType: "json",
            success: function(response){
                var table;
                $.each(response, function(i,obj){
                    table += "<tr><td>" + obj.id +
                            "</td><td style='width:100px'><img src='images/products/" + obj.picture +
                                "' alt='foto' class='rounded' style='width:100%; height:100%;'>" +
                            "</td><td>" + obj.name +
                            "</td><td>" + obj.description +
                            "</td><td>" + obj.price +
                            "</td><td style='text-align:center'>" +
                                "<button class='btn btn-warning' id='btnEdit' data-id ='" + obj.id +
                                "' data-image ='" + obj.picture + "'>Edit</button> " +
                                "<button class='btn btn-danger' id='btnDelete' data-id ='" + obj.id +
                                "' data-image ='" + obj.picture + "'>Delete</button>" +
                            "</td></tr>";
                })
                $('#product').html(table);
            }
        })
    }


    //------------------------------------------ Tombol Tambah Data ------------------------------------------

    // Menampilkan modal add
    $('#btnNewProduct').click(function(){
        var image = 'images/products/default.png';
        $('#addModal').modal('show');
        $("#btnSaveEdit").attr("id", "btnSave");
        $("#btnSaveDelete").attr("id", "btnSave");
        $('input[name="name"]').val("");
        $('input[name="description"]').val("");
        $('input[name="price"]').val("");
        // Mengganti title modal
        $('#modalTitle').text(function(i, oldText) {
            return oldText = 'Add Product';
        });
        $('#imgPreview').attr('src',image);
        // Meng-enable input-an
        $("#name").prop('disabled', false);
        $("#description").prop('disabled', false);
        $("#price").prop('disabled', false);
        // Meng-enable image
        $("#image").prop('disabled', false);
        $("#imgOverlay").addClass('img-overlay');
    })
})


//--------------------------------------------- Tombol Edit Data---------------------------------------------

$(document).on('click', '#btnEdit', function () {
    var itemId = $(this).data("id");
    var image = 'images/products/' + $(this).data("image");
    $("#addModal").modal("show");
    $("#btnSave").attr("id", "btnSaveEdit");
    $("#btnSaveDelete").attr("id", "btnSaveEdit");
    //get all input
    $.ajax({
        type: "GET",
        url: "_library/_php/action.php",
        data: {
            req: "productsRecord",
            id: itemId,
        },
        dataType: "JSON",
        success: function (response) {
            $.each(response, function (i, obj) {
                // Mengganti title modal
                $('#modalTitle').text(function(i, oldText) {
                    return oldText = 'Edit Product';
                });
                // Mengisi input-an
                $('input[name="id"]').val(obj.id);
                $('input[name="name"]').val(obj.name);
                $('input[name="description"]').val(obj.description);
                $('input[name="price"]').val(obj.price);
                $('#imgPreview').attr('src',image);
                // Meng-enable input-an
                $("#name").prop('disabled', false);
                $("#description").prop('disabled', false);
                $("#price").prop('disabled', false);
                // Meng-enable image
                $("#image").prop('disabled', false);
                $("#imgOverlay").addClass('img-overlay');
            });
        },
    });
})


//------------------------------------------ Tombol Delete Data ------------------------------------------

$(document).on('click', '#btnDelete', function () {
    var itemId = $(this).data("id");
    var image = 'images/products/' + $(this).data("image");
    $("#addModal").modal("show");
    $("#btnSave").attr("id", "btnSaveDelete");
    $("#btnSaveEdit").attr("id", "btnSaveDelete");
    //get all input
    $.ajax({
        type: "GET",
        url: "_library/_php/action.php",
        data: {
            req: "productsRecord",
            id: itemId,
        },
        dataType: "JSON",
        success: function (response) {
            // Mengganti title modal
            $('#modalTitle').text(function(i, oldText) {
                return oldText = 'Delete product';
            });
            $.each(response, function (i, obj) {
                // Mengisi input-an
                $('input[name="id"]').val(obj.id);
                $('input[name="name"]').val(obj.name);
                $('input[name="description"]').val(obj.description);
                $('input[name="price"]').val(obj.price);
                $('#imgPreview').attr('src',image);
                // men-disable input-an
                $("#name").prop('disabled', true);
                $("#description").prop('disabled', true);
                $("#price").prop('disabled', true);
                // men-disable image
                $("#image").prop('disabled', true);
                $("#imgOverlay").removeClass('img-overlay');
            });
        },
    });
})


//---------------------------------------------- Save Data----------------------------------------------
// Tambah data
$(this).ready(function () {
    $(document).on("click", "#btnSave", function () {
        const formData = new FormData(document.getElementById('formAdd'));
        const image = $('#image')[0].files;
        if(image.length > 0){
            formData.append('foto', image);
        }
        $.ajax({
            type: 'POST',
            url: '_library/_php/createProduct.php',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'html',
            success: function(result){
                $('.modal-body').html(result);
                $('#back').hide();
                $('#signUp').hide();
            }
        })
    });
    //Edit data
    $(document).on("click", "#btnSaveEdit", function () {
        const formData = new FormData(document.getElementById('formAdd'));
        const image = $('#image')[0].files;
        if(image.length > 0){
            formData.append('foto', image);
        }
        $.ajax({
            type: 'POST',
            url: '_library/_php/editProduct.php',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'html',
            success: function(result){
                $('.modal-body').html(result);
                $('#back').hide();
                $('#signUp').hide();
            }
        })
    });
    // Hapus data
    $(document).on("click", "#btnSaveDelete", function () {
        const formData = new FormData(document.getElementById('formAdd'));
        const image = $('#image')[0].files;
        if(image.length > 0){
            formData.append('foto', image);
        }
        $.ajax({
            type: 'POST',
            url: '_library/_php/deleteProduct.php',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'html',
            success: function(result){
                $('.modal-body').html(result);
                $('#back').hide();
                $('#signUp').hide();
            }
        })
    });
})