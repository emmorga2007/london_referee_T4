<?php
require_once '../../load.php';
confirm_logged_in();
$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Admin Users</title>
</head>
<body>
  <?php include_once '../../includes/header.php' ?>
  <?php include_once '../templates/admin_header.php' ?>

  <main>
    <div class="admin-page">
      <div class="sub-nav">
        <h1>Users</h1>
        <a href="admin_createuser.php" class="link">Create User</a>
      </div>
      <table>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Locked?</th>
          <th>Actions</th>
        </tr>
        <?php foreach ($users as $user):?>
          <tr>
            <td><?php echo $user['user_fname']; ?></td>
            <td><?php echo $user['user_name']; ?></td>
            <td><?php echo $user['user_email']; ?></td>
            <td><input type="checkbox" <?php echo $user['user_locked'] == 1 ? 'checked' : ''?>></td>
            <td>
              <a href="admin_updateuser.php?id=<?php echo $user['user_id']; ?>&type=passwordreset">Reset Password</a>
              <a href="admin_updateuser.php?id=<?php echo $user['user_id']; ?>&type=update">Update</a>
              <a href="admin_updateuser.php?id=<?php echo $user['user_id']; ?>&type=delete">Delete</a>
            </td>
          </tr>
        <?php endforeach?>
      </table>
    </div>
  </main>
  <?php include_once '../../includes/footer.php' ?>
</body>
</html>