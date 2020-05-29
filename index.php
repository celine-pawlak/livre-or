<?php
$page_selected = "index";
 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home - Guest book</title>
    <link rel="stylesheet" href="styles/css/fa.css">
    <link rel="stylesheet" href="styles/css/livreor.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <header>
      <?php include 'header.php'; ?>
    </header>
    <main>
      <div class="main_max_width index">
        <p class="accroche" >Welcome to my Guest Book !<br>
        If you want to leave a message, you can click on "Guest book" or you can <a href="livre-or.php"><em>click here</em></a><br>
        You have to be <a href="connexion.php"><em>logged in</em></a> to write a message and if you don't have an account yet, you can <a href="inscription.php"><em>register here</em></a>.</p>
      </div>
    </main>
    <footer>

    </footer>
  </body>
</html>
