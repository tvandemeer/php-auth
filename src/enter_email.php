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

    // if validation error
    if ($errors) {
        redirect_with('enter_email.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    } else {
      redirect_with('new_pass.php', [
          'errors' => $errors,
          'inputs' => $inputs
      ]);
    }

} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}
