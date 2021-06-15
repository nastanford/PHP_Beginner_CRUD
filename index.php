<?php
  require "db.php";
  $query = "SELECT * FROM posts ORDER BY created_at DESC";
  $result = mysqli_query($conn,$query);
  $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Blog</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
  <a href="<?php echo ROOT_URL ?>">Home</a>
  <a href="<?php echo ROOT_URL ?>addpost.php">Add post</a>
</nav>
  <?php foreach($posts as $post): ?>
  <div class="container">
    <h3><?php echo $post["title"] ?></h3>
    <small><?php echo $post["body"] ?></small>
    <p>Created by <?php echo $post["author"]?> <?php echo $post["created_at"]  ?></p>
    <a href="<?php echo ROOT_URL ?>post.php?id=<?php echo $post['id']; ?>">Read More</a>
  </div>
  <?php endforeach; ?>
</body>
</html>