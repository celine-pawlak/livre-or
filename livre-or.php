<?php
$page_selected = "livre_or";
 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Guest Book</title>
    <link rel="stylesheet" href="styles/css/fa.css">
    <link rel="stylesheet" href="styles/css/livre-or.css">
  </head>
  <body>
    <header>
      <?php
      include 'header.php';
      include 'commentaire.php';
      ?>
    </header>
    <main>
      <?= renderErrors($errors) ?>
      <div class="comments">
        <?php
        $request = "SELECT * FROM commentaires";
        $query = mysqli_query($db, $request);
        $comments_registered = mysqli_fetch_all($query);

        foreach ($comments_registered as $key => $comment_registered) {
          echo "<div>" . $comment_registered[3] . "</div>";
          echo "<div><p>" . $comment_registered[1] . "</p></div>";
          $request = "SELECT login FROM utilisateurs WHERE id = '" . $comment_registered[2] . "';";
          $query = mysqli_query($db, $request);
          $login_from_comment = mysqli_fetch_array($query);
          echo "<div><p>From " . $login_from_comment[0] . "</p></div>";
        }
         ?>
      </div>
      <div class="add_comments">
        <form class="" action="livre-or.php" method="post">
          <input type="text" name="comment" value="" placeholder="Write something nice :)" required>
          <button type="submit" name="submit_comment">Send</button>
        </form>
      </div>
    </main>
    <footer>

    </footer>
  </body>
</html>
