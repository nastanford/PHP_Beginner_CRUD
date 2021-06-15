<?php
  require_once "db.php";

  if(isset($_POST["submit"])){

    $update_id = mysqli_real_escape_string($conn,$_POST["update_id"]);
    $title = mysqli_real_escape_string($conn,$_POST["title"]);
    $author = mysqli_real_escape_string($conn,$_POST["author"]);
    $body = mysqli_real_escape_string($conn,$_POST["body"]);

  $query = "UPDATE posts SET title='$title',author='$author',body='$body' WHERE id={$update_id}";

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
  <title>Add post</title>
</head>
<body>
  <?php include "navbar.php" ?>
  <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <label>Title</label>
    <input type="text" name="title" value="<?php echo $post["title"] ?>">
    <label>Author</label>
    <input type="text" name="author" value="<?php echo $post["author"] ?>">
    <label>Body</label>
    <textarea name="body" id="" cols="30" rows="10"><?php echo $post["body"] ?></textarea>

    <input type="hidden" name="update_id" value="<?php echo $post["id"] ?>">
    <input type="submit" value="Submit" name="submit">
  </form>
</body>
</html>