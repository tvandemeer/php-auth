<?php

function get_all_entries(): PDOStatement
{
  $data = db()->query('SELECT username, message, date
    FROM entries
    INNER JOIN users
    ON entries.user_id = users.id');
  return $data;
}


function add_entry(): bool
{

}
