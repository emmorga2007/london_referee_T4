<?php
require_once '../load.php';
confirm_logged_in();
$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Users</title>
</head>
<body>
  <h2>Users</h2>
  <a href="admin_panel.php">back</a>
<table>
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Locked?</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($users as $user):?>
  <tr>
    <td><?php echo $user['user_fname']; ?></td>
    <td><?php echo $user['user_email']; ?></td>
    <td><input type="checkbox" <?php echo $user['user_locked'] == 1 ? 'checked' : ''?>></td>
    <td>
      <a href="scripts/update_user.php?id=<?php echo $user['user_id']; ?>&type=passwordreset">Reset Password</a>
      <a href="scripts/update_user.php?id=<?php echo $user['user_id']; ?>&type=update">Update</a>
      <a href="scripts/update_user.php?id=<?php echo $user['user_id']; ?>&type=delete">Delete</a>
    </td>
  </tr>
  <?php endforeach?>
</table>
  
</div>
</body>
</html>