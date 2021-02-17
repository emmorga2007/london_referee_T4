<?php 

require_once '../load.php';
confirm_logged_in();

if (isset($_POST['submit'])) {
    // Data of new user
    $data = array(
    'fname'=>trim($_POST['fname']),
    'username'=>trim($_POST['username']),
    'email'=>trim($_POST['email']),
    'id'=>trim($_POST['id'])
  );
    // Return any errors and put in $message
    $message =  updateUser($data);
}


if (isset($_GET['id']) && isset($_GET['type'])) {
  $type = $_GET['type'];
  if ($type == 'delete') {
    $message = deleteUser($_GET['id']);
  } else if ($type == 'passwordreset') {
    $message = passwordReset($_GET['id']);
  } else if ($type != 'update') {
    $message = 'not right w';
  }
} else if (!isset($_POST['submit'])) {
  $message = 'not right';
  // redirect_to('admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body> <!-- Header -->
  <?php include_once '../includes/header.php' ?>
  <?php include_once 'templates/admin_header.php' ?>
  <h1>Update User</h1>
      <?php echo !empty($message)?'<div class="status">'.$message.'</div>':'' ?>
      <form action="admin_updateuser.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" value="">
        <br><br>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="">
        <br><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="">
        <br><br>
        <button type="submit" name="submit">Update User</button>
      </form>
  <!-- Footer -->
  <?php include_once '../includes/footer.php' ?>
</body> 
</html>