$(this).ready(function(){
    const imgOverlay = document.querySelectorAll('.img-overlay')[0];
    const imgPreview = document.querySelector('#imgPreview');
    const imgInput = document.querySelector('#image');
    
    $(imgOverlay).click(function(){
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