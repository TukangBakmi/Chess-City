$(function(){
    $('#btnLogout').on('click', function(){
        $.ajax({
            method:'POST',
            url:'_backprocess/postLogout.php'
        }).done(function(){
            window.location.href = 'login.php';
        });
    });

    $('#btnEditProf').on('click', function(){
        window.location.href = 'editProfile.php';
    });

    $('#btnTransHist').on('click', function(){
        window.location.href = 'history.php';
    });
})