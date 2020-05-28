<?php
$page_selected = "connexion";
 ?>

 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Connexion - Guest book</title>
     <link rel="stylesheet" href="styles/css/fa.css">
     <link rel="stylesheet" href="styles/css/livre-or.css">
   </head>
   <body>
     <header>
      <?php
      include 'header.php';
       $errors = [];
       if (!empty($_POST['login']) AND !empty($_POST['password']))
       {
         $login = $_POST['login'];
         $password = $_POST['password'];

         /* LOGIN CHECK */

         $request = "SELECT id FROM utilisateurs WHERE login = '" . $login . "';";
         $query = mysqli_query($db, $request);
         $login_check = mysqli_fetch_array($query);
         if (empty($login_check))
         {
           $errors[] = "This user does not exist.";
         }

         /* MDP CHECK */

         else
         {
           $request = "SELECT password FROM utilisateurs where id = '" . $login_check[0] . "';";
           $query = mysqli_query($db, $request);
           $mdp_check = mysqli_fetch_array($query);
           if (password_verify($password, $mdp_check[0]))
           {
             $_SESSION['id'] = $login_check[0];
             header('location: index.php');
           }
           else
           {
             $errors[]= "Password is invalid.";
           }
         }
       }
       elseif(!empty($_POST))
       {
         $errors[] = "Every field must be filled.";
       }
      ?>
     </header>
     <main>
       <?= renderErrors($errors) ?>
       <h1>Connexion</h1>
       <form class="" action="connexion.php" method="post">
         <ul>
           <li>
             <label for="login">Login</label>
             <input type="text" name="login" value="" required>
           </li>
           <li>
             <label for="password">Password</label>
             <input type="password" name="password" value="" required>
           </li>
         </ul>
         <button type="submit" name="connect">Log in</button>
       </form>
     </main>
     <footer>
       <!-- A FAIRE -->
     </footer>
   </body>
 </html>
