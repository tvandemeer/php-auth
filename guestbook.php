<?php
require __DIR__ . '/src/bootstrap.php';
require __DIR__ . '/src/guestbook.php';
require_login();
?>

<?php view('header', ['title' => 'Guestbook']) ?>
<div class="row">
  <form class="col s12 m10 offset-m1 l8 offset-l2" action="guestbook.php" method="post">
    <div class="row">
      <h2>Guestbook</h2>
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
  <div class="col s12 m10 offset-m1 l8 offset-l2">
  <?php
  // Get the current page number
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

  // Calculate the start point of the record set for the current page
  $start = ($page - 1) * PER_PAGE;

  // Get the total number of messages
  $total = get_all_entries()->rowCount();

  // Calculate the total number of pages
  $num_pages = ceil($total / PER_PAGE);

  // Get messages for current page
  $msgs = get_messages_for_page($start, PER_PAGE);
  if ($msgs->rowCount() < 1) {
    echo '<p>No entries found</p>';
  } else {
    while ($entry = $msgs->fetch())
    {
      echo '<div class="row"><div class="col s12"><div class="card blue-grey darken-1"><div class="card-content white-text">'; 
      echo '<p>' . $entry['message'] . '</p></div><div class="card-action white-text ca-small-pad"><div class="row marginy0">';
      echo '<div class="col s6"><h6>' . $entry['username'] . '</h6></div>';
      echo '<div class="col s6 wrap"><small>' . $entry['date'] . '</small></div>';
      echo '</div>';
      echo '</div></div></div></div>';
    }
  }
  ?>
  </div>
</div>

<div class="row">
  <div class="col s12">
  
    <ul class="pagination">
              <?php
              if ($page > 1) {
                echo '<li class="waves-effect"><a href="?page=' . $page - 1 . '"><i class="material-icons">chevron_left</i></a></li>';
              } else {
                echo '<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>';
              }
              // Generate pagination link
              for ($i = 1; $i <= $num_pages; $i++) {
                  if ($i == $page) {
                      echo '<li class="active"><a id="currentpage" href="?page=' . $i . '">' . $i . '</a></li>';
                  } else {
                      echo '<li class="waves-effect"><a href="?page=' . $i . '">' . $i . '</a></li>';
                  }
              }
              if ($page < $num_pages) {
                echo '<li class="waves-effect"><a href="?page=' . $page + 1 . '"><i class="material-icons">chevron_right</i></a></li>';
              } else {
                echo '<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>';
              }
              ?>
    </ul>

  </div>
  
</div>
<?php view('footer') ?>
