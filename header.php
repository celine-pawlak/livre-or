<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "livreor");

if ($page_selected == "profil" AND !$_SESSION['id'])
{
  header('location: connexion.php');
}
if (in_array($page_selected, ['connexion','inscription']) AND isset($_SESSION['id']))
{
  header('location: index.php');
}
/**
  * @param $errors
  * @return string
  */
function renderErrors($errors)
{
  if (!empty($errors))
  {
    $output = "";
    if (count($errors) > 1)
    {
      $output .= "<ul>";
      foreach ($errors as $error)
      {
        $output .= "<li>" . $error . "</li>";
      }
      $output .= "</ul>";
    }
    else
    {
      $output = $errors[0];
    }
    return "<div class=\"ErrorMessage\">"
      . $output .
      "</div>";
  }
  else
  {
    return "";
  }
}
 ?>
