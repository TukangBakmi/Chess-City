$(this).ready(function(){
    // Menampilkan modal add
    $('#btnChgPass').click(function(){
        $('#modalChgPass').modal('show');
    })

    $('#btnCloseChgPass').on('click', function() {
        window.location.href = 'profile.php';
    });

    $('#btnSaveChgPass').on('click', function() {
        // Mengambil data yang di-input user
        var createPasswordEntry = $("#currentPass").val();
        // Untuk validasi
        var createPasswordValid = false;
    
        var createPasswordObject = $("#currentPass");
    
        // Validate password
        if((createPasswordEntry).length == 0 || createPasswordEntry == "Please fill out this field.") {
            $(createPasswordObject).get(0).type='text';
            $(createPasswordObject).addClass("alert-note");
            $(createPasswordObject).val("Please fill out this field.");
        } else {
            createPasswordValid = true;
        }
        
        $(createPasswordObject).on('click', function () {
            $(this).get(0).type='password';
            $(this).val("");
            $(this).removeClass("alert-note");
            $('#checkPass').text(function(i, oldText) {
                return oldText = '';
            });
        });
    
        if(createPasswordValid == true) {
            // Mengirim data
            var dataSend = $('#formChgPass').serialize();
            $.ajax({
                type: 'POST',
                url: '_backprocess/postChangePass.php',
                data: dataSend,
                dataType: 'html',
                success: function(result){
                    $('#checkPass').html(result);
                }
            })
        }
    });

    $('#btnSaveNewPass').on('click', function() {
        // Mengambil data yang di-input user
        var createPasswordChangeEntry = $("#changePass").val();
        var createPasswordConfirmEntry = $("#confirmPass").val();
        // Untuk validasi
        var createPasswordChangeValid = false;
        var createPasswordConfirmValid = false;

        var createPasswordChangeObject = $("#changePass");
        var createPasswordConfirmObject = $("#confirmPass");

        // Validate password Change
        if((createPasswordChangeEntry).length == 0 || createPasswordChangeEntry == "Please fill out this field.") {
            $(createPasswordChangeObject).get(0).type='text';
            $(createPasswordChangeObject).addClass("alert-note");
            $(createPasswordChangeObject).val("Please fill out this field.");
        } else {
            createPasswordChangeValid = true;
        }

        // Validate password Confirm
        if((createPasswordConfirmEntry) !== createPasswordChangeEntry || createPasswordConfirmEntry == "Please fill out this field.") {
            $(createPasswordConfirmObject).get(0).type='text';
            $(createPasswordConfirmObject).addClass("alert-note");
            $(createPasswordConfirmObject).val("Confirm your new password here.");
        } else {
            createPasswordConfirmValid = true;
        }
        
        $(createPasswordChangeObject).on('click', function () {
            $(this).get(0).type='password';
            $(this).val("");
            $(this).removeClass("alert-note");
        });

        $(createPasswordConfirmObject).on('click', function () {
            $(this).get(0).type='password';
            $(this).val("");
            $(this).removeClass("alert-note");
        });

        if(createPasswordChangeValid == true && createPasswordConfirmValid == true) {
            // Mengirim data
            var dataSend = $('#formChgPass').serialize();
            $.ajax({
                type: 'POST',
                url: '_backprocess/postCreateNewPass.php',
                data: dataSend,
                dataType: 'html',
                success: function(result){
                    $('#formChgPass').html(result);
                }
            })
        }
    });
})

$(this).ready(function () {
    function isCheckedById(id) {
        if($(id).is(':checked')){
            $("#currentPass").get(0).type='text';
            $("#changePass").get(0).type='text';
            $("#confirmPass").get(0).type='text';
        } else{
            $("#currentPass").get(0).type='password';
            $("#changePass").get(0).type='password';
            $("#confirmPass").get(0).type='password';
        }
    }
    $('.showPassword').click(function(){
        isCheckedById('#showPassword');
    })
})