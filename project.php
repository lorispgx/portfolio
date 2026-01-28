<?php
require_once 'data/projects.php';
// On charge le nouveau fichier de compétences
require_once 'data/competencies.php';

$project_id = $_GET['id'] ?? null;
$project = $projects[$project_id] ?? null;

if (!$project) {
    header("Location: index.php");
    exit();
}

// Récupération de la compétence liée
$compKey = $project['competency_id'] ?? null;
$competency = $competencies[$compKey] ?? null;

// Comptage des images
$nbImages = count($project['gallery']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $project['title']; ?> | Détails</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/img/logo.png">
</head>
<body class="project-page">

    <nav class="glass-nav">
        <a href="index.php#projects" class="logo">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Retour aux projets</span>
        </a>
    </nav>

    <header class="project-header reveal" style="--project-color: <?php echo $project['color']; ?>;">
        <div class="container header-grid">
            <div class="header-content">
                <span class="category-badge"><?php echo strtoupper($project['category']); ?></span>
                <h1><?php echo $project['title']; ?></h1>
                <p class="subtitle"><?php echo $project['subtitle']; ?></p>
                <div class="header-actions">
                    <a href="<?php echo $project['github_link']; ?>" target="_blank" class="btn-primary">
                        <i class="fa-brands fa-github"></i> Voir le code source
                    </a>
                </div>
            </div>
            <div class="header-visual">
                <div class="visual-wrapper">
                    <img src="<?php echo $project['main_image']; ?>" alt="Aperçu du projet">
                    <div class="visual-glow"></div>
                </div>
            </div>
        </div>
    </header>

    <main class="container project-content">
        
        <div class="project-grid-details reveal delay-100">
            
            <div class="details-left">
                <section class="mb-5">
                    <h2>À propos du projet</h2>
                    <div class="text-content">
                        <p class="lead"><?php echo $project['summary']; ?></p>
                        <p><?php echo $project['description']; ?></p>
                    </div>
                </section>

                <?php if ($competency): ?>
                <section class="mb-5 competency-section">
                    <h2><i class="fa-solid fa-medal"></i> Compétence Validée</h2>
                    <div class="competency-card">
                        <div class="comp-header">
                            <h3><?php echo $competency['title']; ?></h3>
                            <span class="comp-level"><?php echo $competency['level']; ?></span>
                        </div>
                        <p class="comp-desc"><?php echo $competency['description']; ?></p>
                        <ul class="comp-list">
                            <?php foreach($competency['skills'] as $skill): ?>
                                <li><i class="fa-solid fa-check"></i> <?php echo $skill; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>
                <?php endif; ?>

                <section class="gallery-section">
                    <div class="gallery-header">
                        <h2><i class="fa-regular fa-images"></i> Galerie</h2>
                    </div>

                    <?php if ($nbImages > 1): ?>
                        <section id="image-carousel" class="splide" aria-label="Galerie du projet">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <?php foreach($project['gallery'] as $img): ?>
                                        <li class="splide__slide">
                                            <a href="<?php echo $img; ?>" class="glightbox" data-gallery="project-gallery">
                                                <img src="<?php echo $img; ?>" alt="Capture projet" loading="lazy" />
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </section>
                    
                    <?php elseif ($nbImages === 1): ?>
                        <div class="single-gallery-item">
                            <a href="<?php echo $project['gallery'][0]; ?>" class="glightbox" data-gallery="project-gallery">
                                <img src="<?php echo $project['gallery'][0]; ?>" alt="Capture projet" loading="lazy" />
                            </a>
                        </div>

                    <?php else: ?>
                        <div class="no-gallery">
                            <i class="fa-regular fa-image-slash"></i>
                            <p>Pas de photos disponibles pour ce projet.</p>
                        </div>
                    <?php endif; ?>
                    
                </section>
            </div>

            <div class="details-right">
                <div class="tech-box sticky-box">
                    <div class="tech-section">
                        <h3><i class="fa-solid fa-code"></i> Langages</h3>
                        <div class="tech-list">
                            <?php foreach($project['languages'] as $lang): ?>
                                <span class="tech-pill lang"><?php echo $lang; ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div class="tech-section">
                        <h3><i class="fa-solid fa-toolbox"></i> Logiciels & Outils</h3>
                        <div class="tech-list">
                            <?php foreach($project['tools'] as $tool): ?>
                                <span class="tech-pill tool"><?php echo $tool; ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div class="tech-section">
                        <h3><i class="fa-regular fa-calendar"></i> Contexte</h3>
                        <p class="context-text">Projet Universitaire <br> IUT Paul Sabatier - 2024</p>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <footer class="simple-footer">
        <p class="copyright">&copy; <?php echo date("Y"); ?> - Loris Pigneaux</p>
    </footer>

    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    
   <script>
        document.addEventListener( 'DOMContentLoaded', function() {
            var carouselElement = document.getElementById('image-carousel');
            if (carouselElement) {
                var splide = new Splide( '#image-carousel', {
                    type   : 'loop',
                    perPage: 1,
                    gap    : '20px',
                    autoplay: false,
                    pagination: true,
                    arrows: true,
                    breakpoints: { 768: { perPage: 1 }, 1024: { perPage: 2 } }
                } );
                splide.mount();
            }
        });
        const lightbox = GLightbox({ touchNavigation: true, loop: true, autoplayVideos: false });
    </script>
</body>
</html>