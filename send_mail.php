<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "joeleliseeadzonya@gmail.com"; // Remplace avec l'e-mail du salon
    $subject = "Nouvelle réservation de rendez-vous";

    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $date = htmlspecialchars($_POST["date"]);
    $time = htmlspecialchars($_POST["time"]);
    $message = nl2br(htmlspecialchars($_POST["message"]));

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $body = "
        <h2>Nouvelle réservation</h2>
        <p><strong>Nom :</strong> $first_name $last_name</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Téléphone :</strong> $phone</p>
        <p><strong>Date :</strong> $date</p>
        <p><strong>Heure :</strong> $time</p>
        <p><strong>Message :</strong><br>$message</p>
    ";

    if (mail($to, $subject, $body, $headers)) {
        echo "<span style='color:green;'>Rendez-vous envoyé avec succès ! 📩</span>";
    } else {
        echo "<span style='color:red;'>Erreur lors de l'envoi du message. ❌</span>";
    }
} else {
    echo "<span style='color:red;'>Méthode non autorisée.</span>";
}
?>