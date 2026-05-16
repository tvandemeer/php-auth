<?php

require __DIR__ . '/src/bootstrap.php';
require_login();
?>

<?php view('header', ['title' => 'Crib']) ?>
<div class="row">
  <div class="col s12">
    <div class="card-panel blue white-text center-align">
      <h4>Welcome</h4><h3><?= current_user() ?></h3> 
    </div>
  </div>
</div>
<div class="row">
  <img class="responsive-img" src="img/dark_welcome.png">
</div>
<?php view('footer') ?>
