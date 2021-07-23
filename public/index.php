
<?php
  $pageTitle ='Home';

  // require "../config/db.php";
  // $query = "SELECT * FROM posts ORDER BY created_at DESC";
  // $result = mysqli_query($conn,$query);
  // $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
  // mysqli_free_result($result);
  // mysqli_close($conn);
	
?>

<?php include "includes/dsp_header.php" ?>
<?php include "includes/navbar.php" ?>


<!-- 

  <?php foreach($posts as $post): ?>
  <div class="container">
    <h3><?php echo $post["title"] ?></h3>
    <small><?php echo $post["body"] ?></small>
    <p>Created by <?php echo $post["author"]?> <?php echo $post["created_at"]  ?></p>
    <a href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
  </div>
  <?php endforeach; ?>
 -->


  <?php include "includes/dsp_footer.php" ?>
