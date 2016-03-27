<?php
 

$target_dir = $_IMAGESPATH."products/";
$target_file = $target_dir . basename($_FILES["txtimage"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file=$target_dir . $id.'.'.$imageFileType;
echo "file final ".$target_file;
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["txtimage"]["tmp_name"]);
    var_dump($check);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png"&&$imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "jpeg" ) {
    echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {
    if (move_uploaded_file($_FILES["txtimage"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["txtimage"]["name"]). " has been uploaded.";
        //insert into database
        $result = mysqli_query($db, "INSERT INTO fp_product_images (  product_id,  details,  creation_date) 
                                     VALUES  (    '".$id."',    '".($id.'.'.$imageFileType)."',    NOW()  ) ;");
        if ($result) {
            //echo 'entree';
            //redirect to notification success
            $imageInserted=true;
           
            }    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

// if everything is ok, try to upload file
}
?>