<?php
  $pageTitle ='Add Post';

  require "../config/db.php";

  if(isset($_POST["submit"])){
    $title = mysqli_real_escape_string($conn,$_POST["title"]);
    $author = mysqli_real_escape_string($conn,$_POST["author"]);
    $body = mysqli_real_escape_string($conn,$_POST["body"]);

    $query = "INSERT INTO posts (title,author,body) VALUES ('$title','$author','$body')";

    header("Location: index.php");
    mysqli_query($conn,$query);
  }
?>

<?php include "includes/dsp_header.php" ?>
<?php include "includes/navbar.php" ?>

  <form action="addpost.php" method="post">
    <label>Title</label>
    <input type="text" name="title">
    <label>Author</label>
    <input type="text" name="author">
    <label>Body</label>
    <textarea name="body" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="Add" name="submit">
  </form>

  <?php include "includes/dsp_footer.php" ?>
