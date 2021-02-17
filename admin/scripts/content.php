
<?php

function getContent(&$content) {
  $pdo = Database::getInstance()->getConnection();

  // Add File to database
  $get_content = 'SELECT * FROM tbl_content';
  $runQuery = $pdo->query($get_content);
  if ($runQuery) {
    $content = $runQuery-> fetchAll(PDO::FETCH_ASSOC);
  } else {
    return 'Error getting content';
  }
}

function uploadFile() {
    $path = "../../content/";
    $target_file = $path . basename($_FILES["fileToUpload"]["name"]);
    $status = true;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $contentType = ''; 
    
    // Get mime type
    $mime = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
    // Is movie

    if(strstr($mime, "video/")){
        if ($imageFileType != "mp4" && $imageFileType != "webm") {
          return "Error: Only JPG, JPEG, PNG, GIF, MP4, & WEBM files are allowed.";
        }

        // Video size larger than 10mb
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
          return "Error: Video too large";
        } 

        $contentType = 'video';
    
    // Is image
    }else if(strstr($mime, "image/")){
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
          return "Error: Only JPG, JPEG, PNG, GIF, MP4, & WEBM files are allowed.";
        }

        // Image size larger than 5mb
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
          return "Error: Image too large";
        }
        
        $contentType = 'image';

    } else {
      return 'Not a valid file type';
    }


    // check if file already exists
    if (file_exists($target_file)) {
      return "Error: file already exists.";
        $status = false;
    }

    
    if ($status) {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $pdo = Database::getInstance()->getConnection();

        // Add File to database
        $add_image_query = 'INSERT INTO tbl_content (name, path, type) VALUES (:name, :path, :type)';
        $add_image = $pdo->prepare($add_image_query);
        $add_image->execute(
            array(
            ':name'=>$_FILES["fileToUpload"]["name"],
            ':path'=>$_FILES["fileToUpload"]["name"],
            ':type'=>$contentType
            )
        );
        
        if ($add_image) {
          return htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). ' has successfully been uploaded.   
          <a href='.$target_file.' target="_blank">Link to File</a>
          ';
        } else {
          return "Error: File uploaded, error saving file.";
        }
      } else {
        return "Error: Unable to upload file.";
      }
    } else {
      return "Error: Unable to upload file.";
    }
}

?>