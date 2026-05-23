<?php
require __DIR__ . '/src/bootstrap.php';
require __DIR__ . '/src/enter_email.php';
?>

<?php view('header', ['title' => 'Enter Email']) ?>

<?php if (isset($errors['email'])) : ?>
    <div class="card-panel red white-text">
        <?= $errors['email'] ?>
    </div>
<?php endif ?>

<div class="row">
  <form class="col s12 m8 offset-m2 l6 offset-l3" action="enter_email.php" method="post">

      <div class="row">
        <h2>Reset password</h2>
      </div>

      <div class="row">
        <div class="input-field">
          <label for="email">Email:</label>
          <input type="text" class="validate" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>" required>
        </div>
      </div>

      <div class="row">
        <button class="waves-effect waves-light btn" type="submit">Send<i class="material-icons right">send</i></button>
      </div>

  </form>
</div>

<?php view('footer') ?>
