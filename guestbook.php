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
        <textarea id="entryarea" class="materialize-textarea" name="message" value="<?= $inputs['message'] ?? '' ?>"></textarea>
        <label for="entryarea">Message</label>
      </div>
    </div>
    <div class="row">
      <button class="waves-effect waves-light btn" type="submit">Send<i class="material-icons right">send</i></button>
    </div>
  </form>
</div>

<div class="row">
  <div class="col s12 offset-m2 l6 offset-l3">
  <?php
  $data = get_all_entries();
  if ($data->rowCount() < 1) {
    echo '<p>No entries found</p>';
  } else {
    while ($entry = $data->fetch())
    {
      echo '<div class="row"><div class="col s12"><div class="card blue-grey darken-1"><div class="card-content white-text"><span class="card-title">'; 
      echo $entry['username'] . '</span><p>' . $entry['message'] . '</p></div><div class="card-action white-text"><small>' . $entry['date'] . '</small>';
      echo '</div></div></div></div>';
    }
  }
  ?>
  </div>
</div>
<?php view('footer') ?>
