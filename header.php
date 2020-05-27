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
<nav>
  <div class="logo">
    <a href="index.php">
      <i class="fas fa-book-open"></i>
    </a>
    <p>Hello
    <?php
    if (isset($_SESSION['id'])) {
      $request = "SELECT login FROM utilisateurs WHERE id = '" . $_SESSION['id'] . "';";
      $query = mysqli_query($db, $request);
      $show_login = mysqli_fetch_array($query);
      echo $show_login[0];
    }
    else {
      echo "stranger";
    }
     ?> !
  </p>
  </div>
  <div class="head_guest_book">
    <a href="livre-or.php"><h1>Guest Book</h1></a>
  </div>
  <div class="account">
    <?php if (isset($_SESSION['id'])) { ?>
      <ul>
        <li>
          <a href="profil.php">My account</a>
          <ul>
            <li>
              <a href="delete_session.php"><i class="fal fa-sign-out-alt">Disconnect</i></a>
            </li>
          </ul>
        </li>
      </ul>
    <?php }
    else { ?>
    <p><a href="connexion.php">Connect</a> or <a href="inscription.php">Register</a></p>
    <?php } ?>
  </div>
</nav>
