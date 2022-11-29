$(this).ready(function(){
    // Menampilkan data
    getData();
    function getData(){
        $.ajax({
            type: "GET",
            url: "_library/_php/action.php",
            data: {req:'rows'},
            dataType: "json",
            success: function(response){
                var table;
                $.each(response, function(i,obj){
                    table += "<tr><td>" + obj.id +
                            "</td><td>" + obj.title +
                            "</td><td>" + obj.date +
                            "</td><td>" + obj.content +
                            "</td><td>" + obj.author +
                            "</td><td class='justify-content-center' style='width: 100px;'>" +
                            "<div><img src='images/news/" + obj.image +
                                "' alt='foto' class='rounded' style='width:100%; height:100%;'>" +
                            "</div>" +
                            "</td><td style='text-align:center'>" +
                                "<button class='btn btn-warning' id='btnEdit' data-id ='" + obj.id +
                                "' data-author ='" + obj.author_id + "' data-image ='" + obj.image +
                                "'>Edit</button> " +
                                "<button class='btn btn-danger' id='btnDelete' data-id ='" + obj.id +
                                "' data-author ='" + obj.author_id + "' data-image ='" + obj.image +
                                "'>Delete</button>" +
                            "</td></tr>";
                })
                $('#news').html(table);
            }
        })
    }


    //------------------------------------------ Tombol Tambah Data ------------------------------------------

    // Menampilkan modal add
    $('#btnNew').click(function(){
        var image = 'images/news/default.png';
        $('#addModal').modal('show');
        $("#btnSaveEdit").attr("id", "btnSave");
        $("#btnSaveDelete").attr("id", "btnSave");
        $('input[name="title"]').val("");
        $('input[name="content"]').val("");
        //get all Authors records
        $.ajax({
            type: 'GET',
            url: '_library/_php/action.php',
            data: {req:'author'},
            dataType: 'json',
            success: function(result){
                var select;
                $.each(result, function(i,obj){
                    select += "<option value=\"" + obj.id + "\">" + obj.name + "</option>";
                })
                $('#author').html(select);
                // Mengganti title modal
                $('#modalTitle').text(function(i, oldText) {
                    return oldText = 'Add News';
                });
                $('#imgPreview').attr('src',image);
                // Meng-enable input-an
                $("#title").prop('disabled', false);
                $("#content").prop('disabled', false);
                $("#newAuthor").prop('disabled', false);
                $("#author").prop('disabled', false);
                $("#nameAuthor").prop('disabled', false);
                // Meng-enable image
                $("#image").prop('disabled', false);
                $("#imgOverlay").addClass('img-overlay');
            }
        })
    })
})


//--------------------------------------------- Tombol Edit Data---------------------------------------------

$(document).on('click', '#btnEdit', function () {
    var itemId = $(this).data("id");
    var idAuthor = $(this).data("author");
    var image = 'images/news/' + $(this).data("image");
    $("#addModal").modal("show");
    $("#btnSave").attr("id", "btnSaveEdit");
    $("#btnSaveDelete").attr("id", "btnSaveEdit");
    //get all input
    $.ajax({
        type: "GET",
        url: "_library/_php/action.php",
        data: {
            req: "newsRecord",
            id: itemId,
        },
        dataType: "JSON",
        success: function (response) {
            $.each(response, function (i, obj) {
                // Mengganti title modal
                $('#modalTitle').text(function(i, oldText) {
                    return oldText = 'Edit News';
                });
                // Mengisi input-an
                $('input[name="id"]').val(obj.id);
                $('input[name="title"]').val(obj.title);
                $('input[name="content"]').val(obj.content);
                $('#imgPreview').attr('src',image);
                // Meng-enable input-an
                $("#title").prop('disabled', false);
                $("#content").prop('disabled', false);
                $("#newAuthor").prop('disabled', false);
                $("#author").prop('disabled', false);
                $("#nameAuthor").prop('disabled', false);
                // Meng-enable image
                $("#image").prop('disabled', false);
                $("#imgOverlay").addClass('img-overlay');
            });
        },
    });
    //get all Authors records
    $.ajax({
        type: 'GET',
        url: '_library/_php/action.php',
        data: {req:'author'},
        dataType: 'json',
        success: function(result){
            var select;
            $.each(result, function(i,obj){
                if (obj.id == idAuthor) {
                    select +=
                        "<option value='" + obj.id + "' selected >" + obj.name + "</option>";
                } else {
                    select +=
                        "<option value='" + obj.id + "' >" + obj.name + "</option>";
                }
            })
            $('#author').html(select);
        }
    })
})


//------------------------------------------ Tombol Delete Data ------------------------------------------

$(document).on('click', '#btnDelete', function () {
    var itemId = $(this).data("id");
    var idAuthor = $(this).data("author");
    var image = 'images/news/' + $(this).data("image");
    $("#addModal").modal("show");
    $("#btnSave").attr("id", "btnSaveDelete");
    $("#btnSaveEdit").attr("id", "btnSaveDelete");
    //get all input
    $.ajax({
        type: "GET",
        url: "_library/_php/action.php",
        data: {
            req: "newsRecord",
            id: itemId,
        },
        dataType: "JSON",
        success: function (response) {
            $.each(response, function (i, obj) {
                // Mengganti title modal
                $('#modalTitle').text(function(i, oldText) {
                    return oldText = 'Delete News';
                });
                // Mengisi input-an
                $('input[name="id"]').val(obj.id);
                $('input[name="title"]').val(obj.title);
                $('input[name="content"]').val(obj.content);
                $('#imgPreview').attr('src',image);
                // men-disable input-an
                $("#title").prop('disabled', true);
                $("#content").prop('disabled', true);
                $("#newAuthor").prop('disabled', true);
                $("#author").prop('disabled', true);
                $("#nameAuthor").prop('disabled', true);
                // men-disable image
                $("#image").prop('disabled', true);
                $("#imgOverlay").removeClass('img-overlay');
            });
        },
    });
    //get all Authors records
    $.ajax({
        type: 'GET',
        url: '_library/_php/action.php',
        data: {req:'author'},
        dataType: 'json',
        success: function(result){
            var select;
            $.each(result, function(i,obj){
                if (obj.id == idAuthor) {
                    select +=
                        "<option value='" + obj.id + "' selected >" + obj.name + "</option>";
                } else {
                    select +=
                        "<option value='" + obj.id + "' >" + obj.name + "</option>";
                }
            })
            $('#author').html(select);
        }
    })
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
            url: '_library/_php/createNews.php',
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
            url: '_library/_php/editNews.php',
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
            url: '_library/_php/deleteNews.php',
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


//--------------------------------------- Jika ingin menambah new author ---------------------------------------

$(this).ready(function () {
    function isCheckedById(id) {
        if($(id).is(':checked')){
            $('#author').addClass('d-none');
            $('#nameAuthor').removeClass('d-none');
        } else{
            $('#author').removeClass('d-none');
            $('#nameAuthor').addClass('d-none');
        }
    }
    $('.newAuthor').click(function(){
        isCheckedById('#newAuthor');
    })
})