<?php

require __DIR__ . '/src/bootstrap.php';
require_login();
?>

<?php view('header', ['title' => 'Crib']) ?>
<div class="row">
  <div class="col s12">
    <div class="center-align welcome-panel">
      <h2 class="audiowide-regular">Welcome</h2><h1 class="audiowide-regular"><?= current_user() ?></h1> 
    </div>
  </div>
</div>
<div class="row">
  <img class="responsive-img" src="img/dark_welcome.png">
</div>
<?php view('footer') ?>
