<?php
  session_start();
  $button = '';
  if (isset($_SESSION['adminID'])) {
    $button = '<button class="edit-btn btn btn-link" data-toggle="modal" data-target="#editDialog">Edit</button>
    <button class="adminButton delete-btn btn btn-link ml-3 deleteButton">Delete</button>';
    echo $button;
  }
?>