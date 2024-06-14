<?php
// Démarrer la session
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Chat</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_POST['button_con'])) {
        // Si le formulaire est envoyé
        // Se connecter à la base de données
        if (file_exists('connexion_bdd.php')) {
            include 'connexion_bdd.php';
        } else {
            die('Erreur : Le fichier connexion_bdd.php est introuvable.');
        }

        // Extraire les infos du formulaire
        extract($_POST);

        // Vérifions si les champs sont vides
        if (isset($email) && isset($mdp1) && $email != "" && $mdp1 != "") {
            // Vérifions si la connexion à la base de données a réussi
            if ($con) {
                // Vérifions si les identifiants sont justes
                $req = mysqli_query($con, "SELECT * FROM utilisateurs WHERE email = '$email' AND mdp = '$mdp1'");

                if ($req && mysqli_num_rows($req) > 0) {
                    // Si les identifiants sont corrects
                    // Création d'une session qui contient l'email
                    $_SESSION['user'] = $email;
                    // Redirection vers la page chat
                    header("location:chat.php");
                    // Détruire la variable du message d'inscription
                    unset($_SESSION['message']);
                } else {
                    // Sinon
                    $error = "Email ou mot de passe incorrect !";
                }
            } else {
                $error = "Erreur de connexion à la base de données.";
            }
        } else {
            // Si les champs sont vides
            $error = "Veuillez remplir tous les champs !";
        }
    }
    ?>
    <form action="" method="POST" class="form_connexion_inscription">
        <h1>CONNEXION</h1>
        <?php
        // Affichons le message qui dit qu'un compte a été créé
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>
        <p class="message_error">
            <?php
            // Affichons l'erreur
            if (isset($error)) {
                echo $error;
            }
            ?>
        </p>
        <label>Adresse Mail</label>
        <input type="email" name="email">
        <label>Mot de passe</label>
        <input type="password" name="mdp1">
        <input type="submit" value="Connexion" name="button_con">
        <p class="link">Vous n'avez pas de compte ? <a href="inscription.php">Créer un compte</a></p>
    </form>

</body>

</html>