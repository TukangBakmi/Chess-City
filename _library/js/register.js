$(this).ready(function(){

    $('#signUp').on('click', function() {
        // Mengambil data yang di-input user
		var createNameEntry = $("#name").val();
        var createEmailEntry = $("#email").val();
        var createPasswordEntry = $("#password").val();
		var createPhoneEntry = $("#phone").val();
		var createAddressEntry = $("#address").val();
        // Untuk validasi
        var createNameValid = false;
        var createEmailValid = false;
        var createPasswordValid = false;
        var createPhoneValid = false;
        var createAddressValid = false;
        
        var createNameObject = $("#name");
        var createEmailObject = $("#email");
        var createPasswordObject = $("#password");
        var createPhoneObject = $("#phone");
        var createAddressObject = $("#address");

        var validateName = /^\s*[a-zA-Z\s]+\s*$/;
        var validateEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var validatePhone = /^\s*[0-9s]+\s*$/;

        // Validate name
        if((createNameEntry).length == 0 || createNameEntry == "Please fill out this field." || createNameEntry == "No special characters or numbers.") {
            $(createNameObject).addClass("alert-note");
            $(createNameObject).val("Please fill out this field.");
        } else if(!validateName.test(createNameEntry)) {
            $(createNameObject).addClass("alert-note");
            $(createNameObject).val("No special characters or numbers.");
        } else {
            createNameValid = true;
            var createName = $(createNameObject).val();
        }

        // Validate email
        if((createEmailEntry).length == 0 || createEmailEntry == "Please fill out this field." || createEmailEntry == "Enter a valid email address.") {
            $(createEmailObject).addClass("alert-note");
            $(createEmailObject).val("Please fill out this field.");
        } else if(!validateEmail.test(createEmailEntry)) {
            $(createEmailObject).addClass("alert-note");
            $(createEmailObject).val("Enter a valid email address.");
        } else {
            createEmailValid = true;
            var createEmail = $(createEmailObject).val();
        }

        // Validate password
        if((createPasswordEntry).length == 0 || createPasswordEntry == "Please fill out this field.") {
            $(createPasswordObject).get(0).type='text';
            $(createPasswordObject).addClass("alert-note");
            $(createPasswordObject).val("Please fill out this field.");
        } else {
            createPasswordValid = true;
            var createPassword = $(createPasswordObject).val();
        }

        // Validate phone
        if((createPhoneEntry).length == 0 || createPhoneEntry == "Enter a number." || createPhoneEntry == "Please fill out this field.") {
            $(createPhoneObject).addClass("alert-note");
            $(createPhoneObject).val("Please fill out this field.");
        } else if(!validatePhone.test(createPhoneEntry)) {
            $(createPhoneObject).addClass("alert-note");
            $(createPhoneObject).val("Enter a number.");
        } else {
            createPhoneValid = true;
            var createPhone = $(createPhoneObject).val();
        }

        // Validate address
        if((createAddressEntry).length == 0 || createAddressEntry == "Please fill out this field.") {
            $(createAddressObject).addClass("alert-note");
            $(createAddressObject).val("Please fill out this field.");
        } else{
            createAddressValid = true;
            var createAddress = $(createAddressObject).val();
        }
      
        $(createNameObject).on('click', function () {
            $(this).val("");  
            $(this).removeClass("alert-note");
        });
        
        $(createEmailObject).on('click', function () {
            $(this).val("");  
            $(this).removeClass("alert-note");
        });
        
        $(createPasswordObject).on('click', function () {
            $(this).get(0).type='password';
            $(this).val("");
            $(this).removeClass("alert-note");
        });

        $(createPhoneObject).on('click', function () {
            $(this).val("");
            $(this).removeClass("alert-note");
        });

        $(createAddressObject).on('click', function () {
            $(this).val("");
            $(this).removeClass("alert-note");
        });
    
		account = [createName, createEmail, createPassword, createPhone, createAddress];
    
		if(createNameValid == true && createEmailValid == true && createPasswordValid == true && createPhoneValid == true && createAddressValid == true) {
            // Mengirim data
            var dataSend = $('#formRegister').serialize();
            $.ajax({
                type: 'POST',
                url: '_backprocess/postRegister.php',
                data: dataSend,
                dataType: 'html',
                success: function(result){
                    $('#formRegister').html(result);
                    $('#btnSave').hide();
                    $('#btnClose').hide();
                }
            })
        }
    });

    $('#regBack').on('click', function() {
        window.location.href = 'index.php';
    });
})