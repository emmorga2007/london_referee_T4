
<?php

function getContent(&$content) {
  $pdo = Database::getInstance()->getConnection();

  // get files to database
  $get_content = 'SELECT * FROM tbl_content';
  $runQuery = $pdo->query($get_content);
  if ($runQuery) {
    $content = $runQuery-> fetchAll(PDO::FETCH_ASSOC);
  } else {
    return 'Error getting content';
  }
}

function deleteFile($id) {
  $pdo = Database::getInstance()->getConnection();

  // get file to database
  $content_query = 'SELECT * FROM tbl_content WHERE id = :id';
  $content = $pdo->prepare($content_query);
  $content->execute(
      array(
      ':id'=>$id
      )
  );
  $content_item = $content->fetch(PDO::FETCH_ASSOC);

  unlink('../../content/'.$content_item['path']);


  // Add File to database
  $delete_content = 'DELETE FROM tbl_content WHERE id = :id';
  $deleted_operation = $pdo->prepare($delete_content);
  $deleted_operation->execute(
      array(
      ':id'=>$id
      )
  );


}

function uploadFile() {

    $path = "../../content/";
    $target_file = $path . basename($_FILES["fileToUpload"]["name"]);
    $status = true;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $contentType = ''; 
    

    echo $mime;
    exit;
    // Get mime type
    $mime = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
    // Is movie

  

    if (strstr($mime, "video/")){
        if ($imageFileType != "mp4" && $imageFileType != "webm") {
          return "Error: Only JPG, JPEG, PNG, GIF, MP4, & WEBM files are allowed.";
        }

        // Video size larger than 10mb
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
          return "Error: Video too large";
        } 

        echo 'passed';
        exit;

        $contentType = 'video';
    
    // Is image
    } else if (strstr($mime, "image/")){
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
          return "Error: Only JPG, JPEG, PNG, GIF, MP4, & WEBM files are allowed.";
        }

        // Image size larger than 10mb
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
          return "Error: Image too large";
        }
        echo 'passed image';
        exit;
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