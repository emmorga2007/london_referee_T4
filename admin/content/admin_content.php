<?php
require_once '../../load.php';
confirm_logged_in();

$content = [];

if (isset($_POST["submit"])) {
    $message = uploadFile();
}

$contentStatus = getContent($content);
if ($contentStatus) {
  $message = $contentStatus;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Content</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body> <!-- Header -->
  <?php include_once '../../includes/header.php' ?>
  <?php include_once '../templates/admin_header.php' ?>
  <div class="admin-page">
    <h1>Gallery Upload</h1>
    <?php echo !empty($message)?'<div class="status">'.$message.'</div>':'' ?>
    <form action="admin_content.php" method="post" enctype="multipart/form-data">
      <label for="fileToUpload">Select image to upload:</label>
      <input type="file" name="fileToUpload" id="fileToUpload" required>
      <input type="submit" value="Upload File" name="submit">
    </form>
    <section class="gallery">
      <?php foreach ($content as $item):?>
        <div>
          <div class="controls">
            <a href="admin_deletecontent.php?id=<?php echo $item['id']; ?>">Delete</a>
            <h4><?php echo $item['name']; ?></h4>
            <p>Type: <?php echo $item['type']; ?></p>
            <a href="<?php echo ROOT_PATH ?>/content/<?php echo $item['path']; ?>" target="_BLANK">Link</a>
          </div>
        <?php if ($item['type'] == 'video'): ?>
          <video src="<?php echo ROOT_PATH ?>/content/<?php echo $item['path']; ?>"></video>
        <?php elseif($item['type'] == 'image'): ?>
          <img src="<?php echo ROOT_PATH ?>/content/<?php echo $item['path']; ?>"
          alt="<?php echo $item['name']; ?>">
        <?php endif ?>
          
        </div>
      <?php endforeach?>  
    </section>
  </div>
  <!-- Footer -->
  <?php include_once '../../includes/footer.php' ?>
</body> 
</html>