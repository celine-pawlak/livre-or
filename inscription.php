<?php
$db = mysqli_connect("localhost","root","","livreor");

if (!empty($_POST['login']) AND !empty($_POST['password']) AND !empty($_POST['conf_password'])) {

  $login = $_POST['login'];
  $password_init = $_POST['password'];
  $password_modified = password_hash($password_init, PASSWORD_BCRYPT, array('cost' => 10));

  /*LOGIN*/

  $login_required = preg_match("#^[a-zA-Z]{1}[a-zA-Z0-9_-]{3,20}$#", $login);

  if (!$login_required) {
    $errors[] = "Login must :<br>- contain between 4 and 20 characters.<br>- start with a letter.<br>- not contain any special characters (except - and _).";
    echo $errors[0];
  }

  /*MDP*/

  /*ENVOI DONNEES*/

}

mysqli_close($db);
 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <header>
       <!-- A FAIRE -->
     </header>
     <main>
       <h1>Register</h1>
       <form class="" action="inscription.php" method="post">
         <ul>
           <li>
             <label for="login">Login</label>
             <input type="text" name="login" value="" placeholder="Create login" required>
           </li>
           <li>
             <label for="password">Password</label>
             <input type="password" name="password" value="" placeholder="Create password" required>
           </li>
           <li>
             <label for="conf_password">Password</label>
             <input type="password" name="conf_password" value="" placeholder="Confirm password" required>
           </li>
         </ul>
         <button type="submit" name="submit">Create account</button>
       </form>
     </main>
     <footer>
       <!-- A FAIRE -->
     </footer>
   </body>
 </html>
