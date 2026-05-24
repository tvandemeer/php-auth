<?php

if (is_user_logged_in()) {
    redirect_to('index.php');
}

$errors = [];
$inputs = [];

if (is_post_request()) {
    $fields = [
        'password' => 'string | required | secure',
        'password2' => 'string | required | same: password'
    ];

    // custom messages
    $messages = [
        'password2' => [
            'required' => 'Please enter the password again',
            'same' => 'The password does not match'
        ]
    ];

    [$inputs, $errors] = filter($_POST, $fields, $messages);

    if ($errors) {
        redirect_with('new_pass.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    }

    $token = $_GET['token'];

    $email = find_email_by_token($token);

    if (!$email) {
      // email not found in reset table
      redirect_to('register.php');
    }

    $new_pass = password_hash($inputs['password'], PASSWORD_BCRYPT);

    if (!update_pass($new_pass, $email)) {
      // update failed
      redirect_to('register.php');
    }

    // if no errors: continue here
    // if no errors: continue here

} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}
