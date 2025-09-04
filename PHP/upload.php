<?php
    $target_dir="uploads/";
    $target_file= $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk=1;
    $imageFileType= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false){
            echo "File is an image - " . $check["mime"]. ". <br>" ;
            $uploadOk=1;
        } else{
            echo "File is not an image <br> Please upload a valid image";   
            $uploadOk=0;
        }
    }


if (file_exists($target_file)){
    echo "Sorry, the file already exists. <br>";
    $uploadOk=0;
}
if($_FILES["fileToUpload"]["size"]>500000){
    echo "Sorry the file is to large .<BR>";
    $uploadOk=0;
}
if($uploadOk==0){
    echo "Sorry your file wasn't uploaded";
} else{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
        echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded ";
    }
    else{
        echo "Sorry, there was an error while uploading the file .";
    }
}


?>
