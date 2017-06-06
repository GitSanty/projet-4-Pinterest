<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("uploads/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " is already exists.";
            } else{
               move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $_FILES["photo"]["name"]);
               Change_Size_Images($_FILES["photo"]["name"]);
                echo "Your file was uploaded successfully. ";

            }
        } else{
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }

    if($_FILES["photo"]["error"] > 0){
        echo "<br>";
        echo "Error: " . $_FILES["photo"]["error"] . "<br>";
    } else{
        echo "<br>";
        echo "File Name: " . $_FILES["photo"]["name"] . "<br>";
        echo "File Type: " . $_FILES["photo"]["type"] . "<br>";
        echo "File Size: " . ($_FILES["photo"]["size"] / 1024) . " KB<br>";

    }
}


function Change_Size_Images($File){
    $File_Name = $File;
    $width = 900;
    $height = 600;

   //header("Content-type: image/jpeg"); // L'image que l'on va créer est un jpeg

    list($width_orig, $height_orig) = getimagesize("uploads/$File_Name");

    // Redimention
    $image_p = imagecreatetruecolor($width, $height);
    $image = imagecreatefromjpeg("uploads/$File_Name");
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
    // Copy file
    imagejpeg($image_p, "uploads/$File_Name", 100);

}



function Load_Images(){
    $allFiles = scandir('uploads/');
    $extArray = array('jpg', 'png', 'jpeg', 'gif');
    $Type_animation = array('ease', 'ease-in', 'ease-out', 'ease-in-out', 'linear', 'custom', 'negative', 'center');
    $Count_Animation = 0;
    foreach($allFiles as $file)
    {
        $ext = end(explode('.', $file));
        if(in_array($ext, $extArray)) {

            if($Count_Animation>7){
                $Count_Animation = 0;
            }else{$Count_Animation++;}


            echo " <div class='grid-item'>";
            echo "<div id='$Type_animation[$Count_Animation]' class='test_box'>";
            echo "<img id='myImg' src='uploads/{$file}'/>";
            echo "<div id='myModal' class='modal'>";
            echo "<span class='close'>&times;</span>";
            echo "<span class='close'>&times;</span>";
            echo "<img class='modal-content' id='img01'>";
            echo " <div id='caption'></div></div>";
            echo "</div>";
            echo "</div>";


        }else {
            echo "<div class='post'>"
                . file_get_contents('uploads/'.$file)
                ."</div>";
        }

    }

   // return;

}


function Load_uploads_Test(){
    $allFiles = scandir('uploads/');
    $extArray = array('jpg', 'png', 'jpeg', 'gif');

    foreach($allFiles as $file)
    {
        $ext = end(explode('.', $file));
        if(in_array($ext, $extArray)) {

            echo "<div class='item web'>";
            echo "<div class='image'><img width='230px' src='uploads/{$file}'></div>";

        }else {
            echo "<div class='post'>"
                . file_get_contents('uploads/'.$file)
                ."</div>";
        }

    }

}



