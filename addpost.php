<?php
  require "db.php";

  if(isset($_POST["submit"])){
    $title = mysqli_real_escape_string($conn,$_POST["title"]);
    $author = mysqli_real_escape_string($conn,$_POST["author"]);
    $body = mysqli_real_escape_string($conn,$_POST["body"]);

    $query = "INSERT INTO posts (title,author,body) VALUES ('$title','$author','$body')";

    header("Location: ".ROOT_URL."");
    mysqli_query($conn,$query);
  }
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
    <input type="text" name="title">
    <label>Author</label>
    <input type="text" name="author">
    <label>Body</label>
    <textarea name="body" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="Submit" name="submit">
  </form>
</body>
</html>