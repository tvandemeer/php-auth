<?php

if (is_user_logged_in()) {
    redirect_to('index.php');
}

$inputs = [];
$errors = [];

if (is_post_request()) {

    $fields = [
      'email' => 'email | required | email'
    ];

    // sanitize & validate user inputs
    [$inputs, $errors] = filter($_POST, $fields);

    $user = find_user_by_email($inputs['email']);

    if (!$user) {
      $errors['email'] = 'No such user';
      redirect_with('enter_email.php', [
          'errors' => $errors,
          'inputs' => $inputs
      ]);
    }

    // if validation error
    if ($errors) {
        redirect_with('enter_email.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    } else {
      $token = bin2hex(random_bytes(50));

      $sql = "INSERT INTO password_resets (email, token) VALUES (?,?)";
      $stmt = db()->prepare($sql);
      if (!$stmt->execute([$inputs['email'], $token]))
      {
        // ER GING IETS MIS
        // REDIRECT
      }

      send_pass_reset_email($inputs['email'], $token);

      redirect_to('login.php');
    }

} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}
