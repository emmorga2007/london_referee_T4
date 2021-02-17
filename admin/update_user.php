<?php 

require_once '../../load.php';
confirm_logged_in();


if (isset($_GET['id']) && isset($_GET['type'])) {
  $type = $_GET['type'];
  if ($type == 'delete') {
    $message = deleteUser($_GET['id']);
  } else if ($type == 'passwordreset') {
    $message = passwordReset($_GET['id']);
  } else {
    $message = 'Not valid params';
  }
} else {
  $message = 'Not valid params';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body> <!-- Header -->
  <?php include_once '../../includes/header.php' ?>

  <h2>Update User</h2>
  <a href="../admin_users.php">back</a>
  <br><br>
  <?php echo !empty($message)?$message:'' ?>
  <!-- Footer -->
  <?php include_once '../../includes/footer.php' ?>
</body> 
</html>