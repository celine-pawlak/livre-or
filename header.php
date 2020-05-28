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
    <p>
      <a href="index.php"><i class="fas fa-book-open"></i></a>
      Hello
      <em>
      <?php
      if (isset($_SESSION['id'])) {
        $request = "SELECT login FROM utilisateurs WHERE id = '" . $_SESSION['id'] . "';";
        $query = mysqli_query($db, $request);
        $show_login = mysqli_fetch_array($query);
        echo "&nbsp;",$show_login[0],"&nbsp;";
      }
      else {
        echo "&nbsp;","stranger","&nbsp;";
      }
       ?>
     </em>
    !
   </p>
  </div>
  <div class="head_guest_book">
    <a href="livre-or.php"><h1>Guest Book</h1></a>
  </div>
  <div class="account">
    <?php if (isset($_SESSION['id'])) { ?>
      <ul>
        <li class="liste">
          <a href="profil.php"><em>My account</em></a>
          <ul class="sous-liste">
            <li>
              <a href="delete_session.php"><i class="fal fa-sign-out-alt"></i><?="&nbsp;"?>Disconnect</a>
            </li>
          </ul>
        </li>
      </ul>
    <?php }
    else { ?>
      <a href="connexion.php"><em>Connect</em></a>
      <?="&nbsp;"?><p>or</p><?="&nbsp;"?>
      <a href="inscription.php"><em>Register</em></a>
    <?php } ?>
  </div>
</nav>
