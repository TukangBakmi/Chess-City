$(this).ready(function(){

    $('#submitFeedback').on('click', function() {
        // Mengambil data yang di-input user
        var createFeedbackEntry = $("#feedbackText").val();
        // Untuk validasi
        var createFeedbackValid = false;
    
        var createFeedbackObject = $("#feedbackText");
    
        // Validate password
        if((createFeedbackEntry).length == 0 || createFeedbackEntry == "Please fill out this field.") {
            $(createFeedbackObject).addClass("alert-note");
            $(createFeedbackObject).val("Please fill out this field.");
        } else {
            createFeedbackValid = true;
        }
        
        $(createFeedbackObject).on('click', function () {
            $(this).val("");
            $(this).removeClass("alert-note");
        });
    
        if(createFeedbackValid == true) {
            // Mengirim data
            var dataSend = $('#formFeedback').serialize();
            $.ajax({
                type: 'POST',
                url: '_backprocess/postFeedback.php',
                data: dataSend,
                dataType: 'html',
                success: function(result){
                    if(result === 'Your feedback has been sent successfully'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: result,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location = "contactus.php";
                        });
                    } else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: result,
                            timer: 1500
                        }).then(function() {
                            window.location = "contactus.php";
                        });
                    }
                }
            })
        }
    });
})