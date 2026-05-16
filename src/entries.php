<?php

function get_all_entries(): PDOStatement
{
  $data = db()->query('SELECT username, message, date
    FROM entries
    INNER JOIN users
    ON entries.user_id = users.id
    ORDER BY entries.date DESC');
  return $data;
}


function add_entry(string $message): bool
{
  $sql = 'INSERT INTO entries (message, user_id) 
          VALUES (:message, :user_id)';

  $statement = db()->prepare($sql);

  $statement->bindValue(':message', $message);
  $statement->bindValue(':user_id', $_SESSION['user_id']);

  return $statement->execute();
}
