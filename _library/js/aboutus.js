$(this).ready(function(){
    $('#btnAboutWeb').on('click', function() {
        $('#aboutWebContent').removeClass("d-none");
        $('#aboutGalContent').addClass("d-none");
        $('#aboutDevContent').addClass("d-none");
    })

    $('#btnAboutGallery').on('click', function() {
        $('#aboutWebContent').addClass("d-none");
        $('#aboutGalContent').removeClass("d-none");
        $('#aboutDevContent').addClass("d-none");
    })

    $('#btnAboutDev').on('click', function() {
        $('#aboutWebContent').addClass("d-none");
        $('#aboutGalContent').addClass("d-none");
        $('#aboutDevContent').removeClass("d-none");
    })
})