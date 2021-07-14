<?php
        // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'shopandcook';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');

        if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
          // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
          $username = stripslashes($_REQUEST['username']);
          $username = mysqli_real_escape_string($db, $username); 
          // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
          $email = stripslashes($_REQUEST['email']);
          $email = mysqli_real_escape_string($db, $email);
          // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
          $password = stripslashes($_REQUEST['password']);
          $password = mysqli_real_escape_string($db, $password);
          //requéte SQL + mot de passe crypté
            $query = "INSERT into `users` (username, email, password)
                      VALUES ('$username', '$email', '".hash('sha256', $password)."')";
          // Exécuter la requête sur la base de données
            $res = mysqli_query($db, $query);
            if($res){
               echo "<div class='sucess'>
                     <h3>Vous êtes inscrit avec succès.</h3>
                     <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
               </div>";
            }
        }else{
}