<?php

require __DIR__ . '/src/bootstrap.php';
require_login();
?>

<?php view('header', ['title' => 'Crib']) ?>
<div class="row">
  <div class="col s12">
    <div class="card-panel teal">
      <span class="white-text">Welcome <?= current_user() ?></span> 
    </div>
  </div>
</div>
<?php view('footer') ?>
