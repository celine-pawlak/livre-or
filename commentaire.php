<?php
$errors = [];
if (!empty($_POST['comment']) AND isset($_POST['submit_comment']))
{
  if (isset($_SESSION['id']))
  {
    $comment = $_POST['comment'];
    $comment_required = preg_match("/^.{10,1000}$/", $comment);
    if (!$comment_required)
    {
      $errors[] = "Comments must contain between 10 and 1000 characters.";
    }
    if (empty($errors))
    {
    date_default_timezone_set('Europe/Paris');
    $date = date('Y-m-d h:i:s');
    $request = "INSERT INTO commentaires(`commentaire`, `id_utilisateur`, `date`) VALUES('" . $comment . "', '" . $_SESSION['id'] . "', '" . $date . "')";
    $query = mysqli_query($db, $request);
    header('location: livre-or.php');
    }
  }
  else
  {
    $errors[] = "You must have an account to write a message !";
  }
}
 ?>
