<?php

require __DIR__ . '/src/bootstrap.php';
require __DIR__ . '/src/guestbook.php';
require_login();
?>

<?php view('header', ['title' => 'Guestbook']) ?>
<div class="row">
  <form class="col s12 m8 offset-m2 l6 offset-l3" action="guestbook.php" method="post">
    <div class="row">
      <h1>Guestbook</h1>
    </div>
    <div class="row">
      <div class="input-field">
        <textarea id="entryarea" class="materialize-textarea"></textarea>
        <label for="entryarea">Message</label>
      </div>
    </div>
    <div class="row">
      <button class="waves-effect waves-light btn" type="submit">Send<i class="material-icons right">send</i></button>
    </div>
  </form>
</div>
<?php view('footer') ?>
