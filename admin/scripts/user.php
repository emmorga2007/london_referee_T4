<?php

function createUser($user_data)
{
    $pdo = Database::getInstance()->getConnection();
    // Create last login date as default
    $init_datetime = date_create()->format('Y-m-d H:i:s');

    // Get details for
    $name = $user_data['fname'];
    $email = $user_data['email'];
    $username = $user_data['username'];

    // Should send email to new user?
    $sendemail = $user_data['sendemail'];

    // Check if feilds are empty
    if (empty($name) || empty($email) || empty($username)) {
        return 'Please fill out all feilds';
    }

    // Check if user exists
    $get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :username';
    $user_set = $pdo->prepare($get_user_query);
    $user_set->execute(
        array(
      ':username'=>$username
    )
    );
    $existing_user = $user_set->fetch(PDO::FETCH_ASSOC);

    // continue if user does not already exists
    if ($existing_user) {
        return 'Please pick another username';
    }

    // Generate Random Password
    $password = generatePassword();

    // Hash password for security reasons
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    // Create query with values from form
    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email, user_success_date)';
    $create_user_query .= ' VALUES(:fname, :name, :pass, :email, :success_date)';

    // Prepare query
    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
      ':fname'=>$name,
      ':name'=>$username,
      ':pass'=>$hashedPass,
      ':email'=>$email,
      ':success_date'=>$init_datetime,
    )
    );

    // If successful redirect else message
    if ($create_user_result) {
        if ($sendemail) {
            $emailSuccess = sendNewUserEmail($email, $username, $name, $password);
            if (!$emailSuccess) {
                return 'Error sending email!, User Created';
            }
        }
        
        $message_template = '
        <strong>Account Created</strong>
        <p>Name: %s</p>
        <p>Username: %s</p>
        <p>Email: %s</p>
        <p>Password: %s</p>
        ';
        $return_message = sprintf($message_template, $name, $username, $email, $password);
        return $return_message;
    } else {
        return 'Error creating user!';
    }
}

function sendNewUserEmail($email, $username, $name, $password)
{
    // Link to login allowing both https and http
    $link_to_login = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".ROOT_PATH."/admin/admin_createuser.php";

    // email subject and message
    $email_subject = 'New Account Created - LRG';
    $email_message_template = "
Hello %s,

Your account has been created successfully. To log in please visit:
%s

To log in please use the following information:

Username: %s
Password: %s

Sincerly, 
The London Referee Group
";

    // Prepare mesaage
    $email_message = sprintf($email_message_template, $name, $link_to_login, $username, $password);
    // Email headers
    $email_headers = array(
  'From'=>'no-reply@londonrefereesgroup.com',
);
    // return result of email
    return mail($email, $email_subject, $email_message, $email_headers);
}

function generatePassword()
{
    // Define available characters and init password
    $chars = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $password = array();
  
    // Charlength of possible options
    $charLength = strlen($chars) - 1;
    $passLength = 10;
    $i = 0;

    // Loop through the $passLength and add a random letter from $char
    for ($i; $i < $passLength ; $i++) {
        $ranInt = rand(0, $charLength);
        $password[] = $chars[$ranInt];
    }
    // Turn array to string
    $pass = implode($password);

    // Return password as string.
    return $pass;
}

function getUsers() {
    $pdo = Database::getInstance()->getConnection();

    $get_users_query = 'SELECT user_id, user_fname, user_email, user_locked FROM tbl_user';
    $users_set = $pdo->query($get_users_query);
    $users = $users_set->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

function deleteUser($id) {
    $pdo = Database::getInstance()->getConnection();

    $remove_user_query = 'DELETE FROM tbl_user WHERE user_id = :id';
    $remove_user = $pdo->prepare($remove_user_query);
    $remove_user_status = $remove_user->execute(
        array(
      ':id'=>$id,
    )
    );

    if ($remove_user_status) {
        redirect_to('../admin_users.php');
    } else {
        return 'Unable to Delete User';
    }
}
function passwordReset($id) {
    $pdo = Database::getInstance()->getConnection();

    // Generate Random Password
    $pass = generatePassword();

    // Hash password for security reasons
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    $password_query = 'UPDATE `tbl_user` SET `user_pass` = :pass WHERE `tbl_user`.`user_id` = :id; ';
    $password_reset = $pdo->prepare($password_query);
    $password_reset_status = $password_reset->execute(
        array(
      ':id'=>$id,
      ':pass'=>$hashedPass
    )
    );

    if ($password_reset_status) {
        return 'New password is '.$pass;
    } else {
        return 'Unable to Delete User';
    }
}