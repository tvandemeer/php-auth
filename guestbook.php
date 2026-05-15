<?php

require __DIR__ . '/src/bootstrap.php';
require_login();
?>

<?php view('header', ['title' => 'Guestbook']) ?>
<div class="row">
  <div class="col s12">
    <h1>Guestbook</h1>
  </div>
</div>
<?php view('footer') ?>
