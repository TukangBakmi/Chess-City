$(document).ready(function() {
  
	$('#loginAdmin').on('click', function() {
        // Mengambil data yang di-input user
        var createEmailEntry = $("#email").val();
        var createPasswordEntry = $("#password").val();
        // Untuk validasi
        var createEmailValid = false;
        var createPasswordValid = false;
        
        var createEmailObject = $("#email");
        var createPasswordObject = $("#password");

        var validateEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        // Validate email
        if((createEmailEntry).length == 0 || createEmailEntry == "Please fill out this field." || createEmailEntry == "Enter a valid email address.") {
            $(createEmailObject).addClass("alert-note");
            $(createEmailObject).val("Please fill out this field.");
        } else if(!validateEmail.test(createEmailEntry)) {
            $(createEmailObject).addClass("alert-note");
            $(createEmailObject).val("Enter a valid email address.");
        } else {
            createEmailValid = true;
        }

        // Validate password
        if((createPasswordEntry).length == 0 || createPasswordEntry == "Please fill out this field.") {
            $(createPasswordObject).get(0).type='text';
            $(createPasswordObject).addClass("alert-note");
            $(createPasswordObject).val("Please fill out this field.");
        } else {
            createPasswordValid = true;
        }
        
        $(createEmailObject).on('click', function () {
            $(this).val("");  
            $(this).removeClass("alert-note");
        });
        
        $(createPasswordObject).on('click', function () {
            $(this).get(0).type='password';
            $(this).val("");
            $(this).removeClass("alert-note");
        });
    
		if(createEmailValid == true && createPasswordValid == true) {
            // Mengirim data
            var dataSend = $('#formLoginAdmin').serialize();
            $.ajax({
                type: 'POST',
                url: '_backprocess/postLoginAdmin.php',
                data: dataSend,
                dataType: 'html',
                success: function(result){
                    $('#formLoginAdmin').html(result);
                    $('#btnSave').hide();
                    $('#btnClose').hide();
                }
            })
        }
    });

    $('#logAdBack').on('click', function() {
        window.location.href = 'index.php';
    });
});