
<?php

function uploadFile() {
  $target_dir = "../../content/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        // return "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      return "File is not an image.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
      return "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
      return "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif") {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      return "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          return "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). ' has been uploaded.  
          <a href='.$target_file.' >Link to Image</a>
          ';
        } else {
          return "Sorry, there was an error uploading your file.";
        }
    }
}
?>