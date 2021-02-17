<?php
require_once '../../load.php';
confirm_logged_in();


if (isset($_POST['submit'])) {
    $sendemail = isset($_POST['sendemail']);

    // Data of new user
    $data = array(
    'fname'=>trim($_POST['fname']),
    'username'=>trim($_POST['username']),
    'email'=>trim($_POST['email']),
    'sendemail'=>$sendemail,
  );
    // Return any errors and put in $message
    $message =  createUser($data);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>  
  
  <?php include_once '../../includes/header.php' ?>
  <?php include_once '../templates/admin_header.php' ?>
  <main>
    <div class="admin-page">
      <h1>Create User</h1>
      <?php echo !empty($message)?'<div class="status">'.$message.'</div>':'' ?>
      
      <form action="admin_createuser.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" value="">
        <br><br>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="">
        <br><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="">
        <br><br>
        <label for="sendemail">Send Credentials to User Email?</label>
        <input type="checkbox" id="sendemail" name="sendemail">
        <br><br>
        <button type="submit" name="submit">Add User</button>
      </form>
    </div>
  </main>
  <!-- Footer -->
  <?php include_once '../../includes/footer.php' ?>
</body>
</html>