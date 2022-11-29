$(function(){
    $('#btnLogoutAdmin').on('click', function(){
        $.ajax({
            method:'POST',
            url:'../_backprocess/postLogoutAdmin.php'
        }).done(function(){
            window.location.href = '../index.php';
        });
    });
})