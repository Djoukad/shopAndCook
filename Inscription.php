<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
        <title>Inscription</title>
    </head>
    <body>

        <form id="container" action="" method="post">
            <h1 class="box-title">Inscription</h1>

            <label><b>Nom</b></label>
            <input type="text" name="username" placeholder="Entrez votre nom" required />

            <label><b>Mot de passe</b></label>
            <input type="password" name="password" placeholder="Entrez un mot de passe" required />

            <label><b>Adresse mail</b></label>
            <input type="mail" name="email" placeholder="Entrez votre adresse mail" required />

            <input type="submit" name="submit" value="S'inscrire" class="box-button" />
            <p class="box-register">Déjà inscrit? <a href="Connexion.php">Connectez-vous ici</a></p>
        </form>

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
            $query = "INSERT into `users` (username, password, email, role)
                      VALUES ('$username', '".hash('sha256', $password)."', '$email', 'Utilisateur')";
          // Exécuter la requête sur la base de données
            $res = mysqli_query($db, $query);
            if($res){
               header('Location: principale.php');
            }
        }else{
            header('Location: Inscription.php');
        }
        ?>
    </body>
</html>