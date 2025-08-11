<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecte les données du formulaire
    $name = htmlspecialchars($_POST['Nom']);
    $email = htmlspecialchars($_POST['Email']);
    $subject = htmlspecialchars($_POST['Sujet']);
    $message = htmlspecialchars($_POST['Message']);

    // Adresse e-mail de destination (remplacez par votre adresse e-mail)
    $to = "gracelukosingoy@gmail.com"; // Votre adresse e-mail ici

    // Sujet de l'e-mail
    $email_subject = "Message depuis le site Sterling: " . $subject;

    // Corps de l'e-mail
    $email_body = "Vous avez reçu un nouveau message de votre site web.\n\n" .
                  "Nom: $name\n" .
                  "Email: $email\n" .
                  "Sujet: $subject\n" .
                  "Message:\n$message";

    // En-têtes de l'e-mail
    $headers = "De: $name <$email>\r\n";
    $headers .= "Répondre à: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Envoi de l'e-mail
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirection après succès (vous pouvez personnaliser cette page ou afficher un message)
        header("Location: index.html?status=success#contact");
        exit;
    } else {
        // Redirection après échec
        header("Location: index.html?status=error#contact");
        exit;
    }
} else {
    // Si la page est accédée directement sans soumission de formulaire
    header("Location: index2.html");
    exit;
}
?>
