<?php
  require "db.php";

  if(isset($_POST["delete"])){

    $delete_id = mysqli_real_escape_string($conn,$_POST["delete_id"]);

  $query = "DELETE FROM posts WHERE id={$delete_id}";

    if(mysqli_query($conn,$query)){
      header("Location: ".ROOT_URL."");
    }else{
      echo "ERROR:".mysqli_error($conn);
    }
  }

  $id = mysqli_real_escape_string($conn,$_GET["id"]);

  $query = "SELECT * FROM posts WHERE id=".$id;

  $result = mysqli_query($conn,$query);

  $post = mysqli_fetch_assoc($result);

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
</head>
<body>
  <?php include "navbar.php" ?>
  <div class="container">
    <a href="<?php echo ROOT_URL ?>" class="back">Back</a>
    <h1><?php echo $post["title"] ?></h1>
    <small><?php echo $post["body"] ?></small>
    <p>Created by <?php echo $post["author"]?> <?php echo $post["created_at"]  ?></p>

    <a href="<?php echo ROOT_URL ?>editpost.php?id=<?php echo $post["id"] ?>">Edit</a>

    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
      <input type="hidden" name="delete_id" value="<?php echo $post["id"] ?>">
      <input type="submit" value="Delete" name="delete">
    </form>
  </div>
</body>
</html>