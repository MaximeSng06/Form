<?php
// On demarre la session sur cette page 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    // Ensuite on affiche le contenu de la variable session
        echo  "<p class='message'> Bonjour " . $_SESSION['email'];
    ?>
</body>
</html>