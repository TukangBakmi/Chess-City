$(this).ready(function(){
    const imgPreview = document.querySelector('#imgPreview');
    const imgInput = document.querySelector('#profilePict');
    
    $(imgPreview).click(function(){
        imgInput.click();
    })

    imgInput.addEventListener('change', (evt) => {
        const img = evt.target.files[0];
        if(!img)
            return;
        const reader = new FileReader();
        reader.onload = (evt) => imgPreview.setAttribute('src', evt.target.result);
        reader.readAsDataURL(img);
    });
})


// --------------------------------- Validasi dan mengirim data ---------------------------------

$(this).ready(function(){
    $('#btnSaveProfile').on('click', function() {
        // Mengambil data yang di-input user
		var createNameEntry = $("#name").val();
        var createEmailEntry = $("#email").val();
		var createPhoneEntry = $("#phone").val();
		var createAddressEntry = $("#address").val();
        // Untuk validasi
        var createNameValid = false;
        var createEmailValid = false;
        var createPhoneValid = false;
        var createAddressValid = false;
        
        var createNameObject = $("#name");
        var createEmailObject = $("#email");
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
        }

        // Validate address
        if((createAddressEntry).length == 0 || createAddressEntry == "Please fill out this field.") {
            $(createAddressObject).addClass("alert-note");
            $(createAddressObject).val("Please fill out this field.");
        } else{
            createAddressValid = true;
        }
      
        $(createNameObject).on('click', function () {
            $(this).val("");  
            $(this).removeClass("alert-note");
        });
        
        $(createEmailObject).on('click', function () {
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
    
		if(createNameValid == true && createEmailValid == true && createPhoneValid == true && createAddressValid == true) {
            // Mengirim data
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = new FormData(document.getElementById('formEditProfile'));
                    const image = $('#profilePict')[0].files;
                    if(image.length > 0){
                        formData.append('foto', image);
                    }
                    $.ajax({
                        type: 'POST',
                        url: '_backprocess/postEditProfile.php',
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: 'html',
                        success: function(result){
                            if(result === 'Edit profile success.'){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Saved!',
                                    text: result,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(function() {
                                    window.location = "editProfile.php";
                                });
                            } else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: result,
                                    timer: 1500
                                }).then(function() {
                                    window.location = "editProfile.php";
                                });
                            }
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Changes are not saved!',
                        showConfirmButton: false,
                        timer: 800
                    }).then(function() {
                        window.location = "editProfile.php";
                    });
                }
            })
        }
    });

    $('#btnCloseProfile').on('click', function() {
        window.location.href = 'profile.php';
    });

    $('#btnDelProfPict').on('click', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Your profile picture will be set as default",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData(document.getElementById('formEditProfile'));
                const image = $('#profilePict')[0].files;
                if(image.length > 0){
                    formData.append('foto', image);
                }
                $.ajax({
                    type: 'POST',
                    url: '_backprocess/postDeleteProfile.php',
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'html',
                    success: function(result){
                        Swal.fire(
                            'Deleted!',
                            'Your Profile Picture has been deleted.',
                            'success'
                        ).then(function() {
                            window.location = "editProfile.php";
                        });
                    }
                })
            }
        })
    });
})