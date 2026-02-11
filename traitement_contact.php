<?php
// On active l'encodage interne en UTF-8 pour être sûr
mb_internal_encoding("UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Récupération des données
    $nom = htmlspecialchars(trim($_POST['name']));
    $email_visiteur = htmlspecialchars(trim($_POST['email']));
    $objet_visiteur = htmlspecialchars(trim($_POST['object']));
    $message = htmlspecialchars(trim($_POST['message']));

    // ---------------------------------------------------------
    // 2. CONFIGURATION ALWAYSDATA
    // ---------------------------------------------------------
    
    // Ton adresse perso (réception)
    $email_reception = "lorispigneaux@gmail.com"; 

    // L'adresse serveur Alwaysdata (Expéditeur technique)
    // REMPLACE 'loris' PAR TON NOM D'UTILISATEUR EXACT ALWAYSDATA
    $email_serveur = "loris@alwaysdata.net"; 

    // ---------------------------------------------------------

    if (!empty($nom) && !empty($email_visiteur) && !empty($message)) {
        
        // SUJET : On le nettoie pour éviter les caractères bizarres
        $sujet = "[Portfolio] " . $objet_visiteur;

        // CONTENU DU MAIL
        $contenu = "Nouveau message reçu depuis le site.\n\n";
        $contenu .= "Nom : $nom\n";
        $contenu .= "Email : $email_visiteur\n";
        $contenu .= "Objet : $objet_visiteur\n";
        $contenu .= "--------------------------------------------------\n";
        $contenu .= "Message :\n$message\n";

        // ---------------------------------------------------------
        // 3. LES HEADERS TECHNIQUES (C'est là qu'on corrige le bug)
        // ---------------------------------------------------------
        
        $headers = []; // On utilise un tableau pour être plus propre
        
        // A. Version MIME et Type de contenu (Corrige R_MISSING_CHARSET et BROKEN_CONTENT_TYPE)
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-Type: text/plain; charset=UTF-8";
        
        // B. Encodage (Corrige R_BAD_CTE_7BIT - Le fameux +3.5 points)
        $headers[] = "Content-Transfer-Encoding: 8bit";

        // C. Expéditeur
        $headers[] = "From: Portfolio <$email_serveur>"; // Ajout d'un nom "Portfolio" pour faire plus propre
        $headers[] = "Reply-To: $email_visiteur";
        $headers[] = "Sender: $email_serveur";
        $headers[] = "X-Mailer: PHP/" . phpversion();

        // On transforme le tableau en chaîne de caractères
        $headers_str = implode("\r\n", $headers);

        // 4. Envoi
        if (mail($email_reception, $sujet, $contenu, $headers_str)) {
            header("Location: index.php?status=success#contact");
            exit();
        } else {
            header("Location: index.php?status=error#contact");
            exit();
        }
    } else {
        header("Location: index.php?status=invalid#contact");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>