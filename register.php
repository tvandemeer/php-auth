<?php
require __DIR__ . '/src/bootstrap.php';
require __DIR__ . '/src/register.php';
?>

<?php view('header', ['title' => 'Register']) ?>

<div class="row">

  <form class="col s12 m8 offset-m2 l6 offset-l3" action="register.php" method="post">

    <div class="row">
      <h1>Sign Up</h1>
    </div>

    <div class="row">
      <div class="input-field">
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>"
                 class="validate <?= error_class($errors, 'username') ?>">
          <small><?= $errors['username'] ?? '' ?></small>
      </div>
    </div>

    <div class="row">
      <div class="input-field">
          <label for="email">Email:</label>
          <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>"
                 class="validate <?= error_class($errors, 'email') ?>">
          <small><?= $errors['email'] ?? '' ?></small>
      </div>
    </div>

    <div class="row">
      <div class="input-field">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>"
                 class="validate <?= error_class($errors, 'password') ?>">
          <small><?= $errors['password'] ?? '' ?></small>
      </div>
    </div>

    <div class="row">
      <div class="input-field">
          <label for="password2">Password Again:</label>
          <input type="password" name="password2" id="password2" value="<?= $inputs['password2'] ?? '' ?>"
                 class="validate <?= error_class($errors, 'password2') ?>">
          <small><?= $errors['password2'] ?? '' ?></small>
      </div>
    </div>

    <div class="row">
      <button class="waves-effect waves-light btn" type="submit">Register<i class="material-icons right">send</i></button>
    </div>

    <div class="row">
      <footer>Already a member? <a href="login.php">Login here</a></footer>
    </div>

  </form>
</div>

<?php view('footer') ?>
