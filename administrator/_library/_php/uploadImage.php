<?php
function uploadImage($image, $dir){
    $name = $image['name'];
    $size = $image['size'];
    $error = $image['error'];
    $tmpName = $image['tmp_name'];

    $result = false;

    if($error === 4){
        echo "<script> alert('No image uploaded!') </script>";
        return $result;
    }

    $validExtensions = ['png','jpg','jpeg','ico'];
    $exp = explode('.', $name);
    $fileExtension = strtolower(end($exp));

    if(!in_array($fileExtension, $validExtensions)){
        echo "<script> alert('Wrong file format!') </script>";
        return $result;
    }

    if($size > 1048576){
        echo "<script> alert('Image size is too big!') </script>";
        return $result;
    }

    $name = uniqid().'.'.$fileExtension;
    if(move_uploaded_file($tmpName, $dir.$name)){
        $result = $name;
    }
    return $result;
}
?>