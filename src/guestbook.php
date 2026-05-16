<?php

$inputs = [];
$errors = [];

if (is_post_request()) {

    // sanitize & validate user inputs
    [$inputs, $errors] = filter($_POST, [
        'message' => 'string | required'
    ]);

    // if validation error
    if ($errors) {
        redirect_with('guestbook.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }

    // if success
    if (add_entry($inputs['message']))
    {
      redirect_to('guestbook.php');
    }
}
