<?php
  require "../config/db.php";
  $query = "SELECT * FROM posts ORDER BY created_at DESC";
  $result = mysqli_query($conn,$query);
  $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);
?>
