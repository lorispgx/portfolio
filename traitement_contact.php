<?php
// 1. Configuration de l'encodage (Crucial pour éviter le SPAM)
mb_internal_encoding("UTF-8");

// On ne traite que les requêtes POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. Nettoyage des entrées (Sécurité XSS)
    $nom = htmlspecialchars(trim($_POST['name']));
    $email_visiteur = htmlspecialchars(trim($_POST['email']));
    $objet_visiteur = htmlspecialchars(trim($_POST['object']));
    $message = htmlspecialchars(trim($_POST['message']));

    // ---------------------------------------------------------
    // 3. CONFIGURATION ALWAYSDATA
    // ---------------------------------------------------------
    
    // Ton adresse personnelle (réception)
    $email_reception = "lorispigneaux@gmail.com"; 

    // L'adresse technique du serveur Alwaysdata (Expéditeur)
    $email_serveur = "lorispigneaux@alwaysdata.net"; 

    // ---------------------------------------------------------

    // Vérification que les champs ne sont pas vides
    if (!empty($nom) && !empty($email_visiteur) && !empty($message)) {
        
        // Construction du Sujet
        $sujet = "[Portfolio] " . $objet_visiteur;

        // Construction du Corps du message
        $contenu = "Nouveau message reçu depuis le site.\n\n";
        $contenu .= "Nom : $nom\n";
        $contenu .= "Email : $email_visiteur\n";
        $contenu .= "Objet : $objet_visiteur\n";
        $contenu .= "--------------------------------------------------\n";
        $contenu .= "Message :\n$message\n";

        // ---------------------------------------------------------
        // 4. EN-TÊTES TECHNIQUES (MIME & HEADERS)
        // ---------------------------------------------------------
        
        $headers = [];
        
        // Standards MIME pour dire que c'est du texte propre en UTF-8
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-Type: text/plain; charset=UTF-8";
        $headers[] = "Content-Transfer-Encoding: 8bit"; // Évite le score "Bad CTE"

        // Identité de l'expéditeur
        $headers[] = "From: Portfolio <$email_serveur>";
        $headers[] = "Reply-To: $email_visiteur"; // Pour répondre au visiteur
        $headers[] = "Sender: $email_serveur";
        $headers[] = "X-Mailer: PHP/" . phpversion();

        // Conversion du tableau en chaîne de caractères
        $headers_str = implode("\r\n", $headers);

        // 5. Envoi du mail
        if (mail($email_reception, $sujet, $contenu, $headers_str)) {
            // Succès
            header("Location: index.php?status=success#contact");
            exit();
        } else {
            // Erreur serveur
            header("Location: index.php?status=error#contact");
            exit();
        }
    } else {
        // Champs invalides
        header("Location: index.php?status=invalid#contact");
        exit();
    }
} else {
    // Accès direct interdit
    header("Location: index.php");
    exit();
}
?>