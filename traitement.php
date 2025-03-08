<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "mon_site");

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $conn->real_escape_string($_POST["nom"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $message = $conn->real_escape_string($_POST["message"]);

    // Insérer les données dans la table
    $sql = "INSERT INTO clients (nom, email, message) VALUES ('$nom', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Informations enregistrées avec succès !";
    } else {
        echo "Erreur : " . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>
