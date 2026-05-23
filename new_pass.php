<?php
require __DIR__ . '/src/bootstrap.php';
require __DIR__ . '/src/new_pass.php';
?>

<?php view('header', ['title' => 'Password reset']) ?>

<?php if (isset($errors['password2'])) : ?>
    <div class="card-panel red white-text">
        <?= $errors['password2'] ?>
    </div>
<?php endif ?>

<div class="row">
  <form class="col s12 m8 offset-m2 l6 offset-l3" action="new_pass.php" method="post">

      <div class="row">
        <h2>New password</h2>
      </div>

      <div class="row">
        <div class="input-field">
          <label for="password">New password:</label>
          <input type="password" class="validate" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>" required>
        </div>
      </div>

      <div class="row">
        <div class="input-field">
          <label for="password2">Confirm new password:</label>
          <input type="password" class="validate" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>" required>
        </div>
      </div>

      <div class="row">
        <button class="waves-effect waves-light btn" type="submit">Send<i class="material-icons right">send</i></button>
      </div>

  </form>
</div>

<?php view('footer') ?>
