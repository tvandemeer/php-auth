<?php

if (is_user_logged_in()) {
    redirect_to('index.php');
}

$inputs = [];
$errors = [];

if (is_post_request()) {

    $fields = [
        'new_pass' => 'string | required | secure',
        'new_pass_c' => 'string | required | same: new_pass'
    ];

    // custom messages
    $messages = [
        'new_pass_c' => [
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

} else {

}
