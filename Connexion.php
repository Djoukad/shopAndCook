<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
        <title>Connexion</title>
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="testConnexion.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
                <a href="Inscription.php">Pas encore inscrit?</a>
            </form>

        </div>
    </body>
</html>