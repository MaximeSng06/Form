<?php
// Nous allons démarrer la session avant toute chose

session_start();

if (isset($_POST['bouton-valider'])) { // Si on clique sur le bouton, alors: 
    if (isset($_POST["email"]) && isset($_POST['mdp'])) { // On vérifie ici si l'utilisateur a rentré des informations
        // Nous allons mettre l'email et le mot de passe dans des variables
        $email = $_POST["email"];
        $mdp = $_POST['mdp'];
        $erreur = "";
        // Nous allons vérifier si les informations entrée sont correctes
        // Connexion à la base de donnée
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "";
        $erreur = "";
        $nom_base_données = "form";
        $con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_données);
        // requete pour selectionner tous les utilisateurs qui a pour email et mot de passe les identifiants qui on été rentrée
        $req = mysqli_query($con, "SELECT * FROM utilisateurs WHERE email ='$email' AND mdp ='$mdp' ");
        $num_ligne = mysqli_num_rows($req); // Compter le nombre de ligne ayant rapport à la requête SQL
        if ($num_ligne > 0) {
            header("Location: bienvenu.php"); // Si le nombre del igne est  > 1 ? on sera redirigé vers la page Bienvenu
            // Nous allons créer une variable de type session qui va contenir l'email de l'utilisateur
            $_SESSION['email'] = $email;
        } else { // si non
            $erreur =  "Adresse Mail ou Mot de passe incorrecte ! ";
        }
    }
}
