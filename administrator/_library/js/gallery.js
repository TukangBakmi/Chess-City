$(this).ready(function(){
    // Menampilkan data
    getGallery();
    function getGallery(){
        $.ajax({
            type: "GET",
            url: "_library/_php/action.php",
            data: {req:'gallery'},
            dataType: "json",
            success: function(response){
                var table;
                $.each(response, function(i,obj){
                    table += "<tr><td>" + obj.id +
                            "</td><td style='width:100px'><img src='images/gallery/" + obj.image +
                                "' alt='foto' class='rounded' style='width:100%; height:100%;'>" +
                            "</td><td>" + obj.name +
                            "</td><td><a style='color:black'href='images/gallery/" + obj.image + "' download>Link download</a>"+
                            "</td><td style='text-align:center'>" +
                                "<button class='btn btn-warning' id='btnEdit' data-id ='" + obj.id +
                                "' data-image ='" + obj.image + "'>Edit</button> " +
                                "<button class='btn btn-danger' id='btnDelete' data-id ='" + obj.id +
                                "' data-image ='" + obj.image + "'>Delete</button>" +
                            "</td></tr>";
                })
                $('#gallery').html(table);
            }
        })
    }


    //------------------------------------------ Tombol Tambah Data ------------------------------------------

    // Menampilkan modal add
    $('#btnNew').click(function(){
        var image = 'images/products/default.png';
        $('#addModal').modal('show');
        $("#btnSaveEdit").attr("id", "btnSave");
        $("#btnSaveDelete").attr("id", "btnSave");
        $('input[name="name"]').val("");
        // Mengganti title modal
        $('#modalTitle').text(function(i, oldText) {
            return oldText = 'Add Product';
        });
        $('#imgPreview').attr('src',image);
        // Meng-enable input-an
        $("#name").prop('disabled', false);
        // Meng-enable image
        $("#image").prop('disabled', false);
        $("#imgOverlay").addClass('img-overlay');
    })
})


//--------------------------------------------- Tombol Edit Data---------------------------------------------

$(document).on('click', '#btnEdit', function () {
    var itemId = $(this).data("id");
    var image = 'images/gallery/' + $(this).data("image");
    $("#addModal").modal("show");
    $("#btnSave").attr("id", "btnSaveEdit");
    $("#btnSaveDelete").attr("id", "btnSaveEdit");
    //get all input
    $.ajax({
        type: "GET",
        url: "_library/_php/action.php",
        data: {
            req: "galleryRecord",
            id: itemId,
        },
        dataType: "JSON",
        success: function (response) {
            $.each(response, function (i, obj) {
                // Mengganti title modal
                $('#modalTitle').text(function(i, oldText) {
                    return oldText = 'Edit Photo';
                });
                // Mengisi input-an
                $('input[name="id"]').val(obj.id);
                $('input[name="name"]').val(obj.name);
                $('#imgPreview').attr('src',image);
                // Meng-enable input-an
                $("#name").prop('disabled', false);
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
    var image = 'images/gallery/' + $(this).data("image");
    $("#addModal").modal("show");
    $("#btnSave").attr("id", "btnSaveDelete");
    $("#btnSaveEdit").attr("id", "btnSaveDelete");
    //get all input
    $.ajax({
        type: "GET",
        url: "_library/_php/action.php",
        data: {
            req: "galleryRecord",
            id: itemId,
        },
        dataType: "JSON",
        success: function (response) {
            // Mengganti title modal
            $('#modalTitle').text(function(i, oldText) {
                return oldText = 'Delete photo';
            });
            $.each(response, function (i, obj) {
                // Mengisi input-an
                $('input[name="id"]').val(obj.id);
                $('input[name="name"]').val(obj.name);
                $('#imgPreview').attr('src',image);
                // men-disable input-an
                $("#name").prop('disabled', true);
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
            url: '_library/_php/createGallery.php',
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
            url: '_library/_php/editGallery.php',
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
            url: '_library/_php/deleteGallery.php',
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