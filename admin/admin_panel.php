<?php
require_once '../load.php';
confirm_logged_in();
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
  <main>
    <div class="admin-page">
      <h1>Admin Panel</h1>
      <a class="options" href="admin_createuser.php">Create User</a>
      <a class="options" href="admin_logout.php">Sign Out</a>
      <a class="options" href="admin_users.php">Users</a>
    </div>
  </main>
  <!-- Footer -->
  <?php include_once '../includes/footer.php' ?>
</body> 
</html>