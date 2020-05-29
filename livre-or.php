<?php
$page_selected = "livre_or";
 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Guest Book</title>
    <link rel="stylesheet" href="styles/css/fa.css">
    <link rel="stylesheet" href="styles/css/livreor.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <header>
      <?php
      include 'header.php';
      include 'commentaire.php';
      ?>
    </header>
    <main>
      <div class="main_max_width">
        <?= renderErrors($errors) ?>
        <div>
          <div class="write_comment">
            <a href="#comment"><i class="fal fa-arrow-circle-down"></i> Write a comment below</a>
          </div>
          <?php
          $request = "SELECT * FROM commentaires";
          $query = mysqli_query($db, $request);
          $comments_registered = mysqli_fetch_all($query);?>
          <div class="comments_reverse">
          <?php foreach ($comments_registered as $key => $comment_registered) { ?>
            <div class="comments">
            <?php echo "<div class=\"comments_date\">" . $comment_registered[3] . "</div>";
            echo "<div><p>" . $comment_registered[1] . "</p></div>";
            $request = "SELECT login FROM utilisateurs WHERE id = '" . $comment_registered[2] . "';";
            $query = mysqli_query($db, $request);
            $login_from_comment = mysqli_fetch_array($query);
            echo "<div class=\"comments_author\"><p>From " . $login_from_comment[0] . "</p></div>"; ?>
            </div>
        <?php  }  ?>
          </div>
        </div>
        <div class="add_comments" id="comment">
          <form action="livre-or.php" method="post">
            <textarea name="comment" value="" placeholder="Write something nice :)" rows="10" cols="500" required></textarea>
            <button type="submit" name="submit_comment">Send</button>
          </form>
        </div>
      </div>
    </main>
    <footer>

    </footer>
  </body>
</html>
