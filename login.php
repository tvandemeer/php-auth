<?php

require __DIR__ . '/src/bootstrap.php';
require __DIR__ . '/src/login.php';
?>

<?php view('header', ['title' => 'Login']) ?>

<?php if (isset($errors['login'])) : ?>
    <div class="card-panel red white-text">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>

<div class="row">
  <form class="col s12 m8 offset-m2 l6 offset-l3" action="login.php" method="post">

      <div class="row">
        <h1>Login</h1>
      </div>

      <div class="row">
        <div class="input-field">
          <label for="username">Username:</label>
          <input type="text" class="validate" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>">
          <small><?= $errors['username'] ?? '' ?></small>
        </div>
      </div>

      <div class="row">
        <div class="input-field">
          <label for="password">Password:</label>
          <input type="password" class="validate" name="password" id="password">
          <small><?= $errors['password'] ?? '' ?></small>
        </div>
      </div>

      <div class="row">
        <button class="waves-effect waves-light btn" type="submit">Log in<i class="material-icons right">send</i></button>
      </div>
      <div class="row">
          <a href="register.php">Register</a>
      </div>

  </form>
</div>

<?php view('footer') ?>
