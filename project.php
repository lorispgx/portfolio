<?php
require_once 'data/projects.php';

// Vérification de l'ID
$project_id = $_GET['id'] ?? null;
$project = $projects[$project_id] ?? null;

// Si le projet n'existe pas, retour à l'accueil
if (!$project) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $project['title']; ?> | Détails</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/img/logo.png">
</head>
<body class="project-page">

    <nav class="glass-nav">
        <a href="index.php" class="logo">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Retour</span>
        </a>
    </nav>

    <header class="project-header reveal" style="--project-color: <?php echo $project['color']; ?>;">
        <div class="container">
            <span class="category-badge"><?php echo strtoupper($project['category']); ?></span>
            <h1><?php echo $project['title']; ?></h1>
            <p class="subtitle"><?php echo $project['subtitle']; ?></p>
            
            <div class="header-actions">
                <a href="<?php echo $project['github_link']; ?>" target="_blank" class="btn-primary">
                    <i class="fa-brands fa-github"></i> Voir le code
                </a>
            </div>
        </div>
    </header>

    <main class="container project-content">
        
        <div class="project-gallery reveal delay-100">
            <?php foreach($project['gallery'] as $img): ?>
                <div class="gallery-item">
                    <img src="<?php echo $img; ?>" alt="Capture écran" class="placeholder-img">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="project-grid-details reveal delay-200">
            <div class="details-left">
                <h2>À propos du projet</h2>
                <div class="text-content">
                    <p class="lead"><?php echo $project['summary']; ?></p>
                    <p><?php echo $project['description']; ?></p>
                    </div>
            </div>

            <div class="details-right">
                <div class="tech-box">
                    <h3>Technologies</h3>
                    <div class="tech-list">
                        <?php foreach($project['tech_stack'] as $tech): ?>
                            <span class="tech-pill"><?php echo $tech; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="tech-box">
                    <h3>Contexte</h3>
                    <p>Projet Universitaire <br> 2024</p>
                </div>
            </div>
        </div>

    </main>

    <footer class="simple-footer">
        <p class="copyright">&copy; <?php echo date("Y"); ?> - Loris Pigneaux</p>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>