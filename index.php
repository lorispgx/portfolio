<?php
// Traitement simple du formulaire (Simulation pour éviter les erreurs sur serveur local)
$message_sent = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ici, tu mettras plus tard la fonction mail()
    $message_sent = true;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Développeur Web & UI Designer</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
    
    <link rel="icon" type="image/png" href="logo.png">
</head>
<body>

    <nav class="glass-nav">
        <div class="logo">
            <img src="logo.png" alt="Logo Portfolio" class="logo-img">
            <span>PORTFOLIO.</span>
        </div>
        <ul class="nav-links">
            <li><a href="#hero">Accueil</a></li>
            <li><a href="#about">À propos</a></li>
            <li><a href="#skills">Compétences</a></li>
            <li><a href="#projects">Projets</a></li>
            <li><a href="#contact" class="btn-nav">Contact</a></li>
        </ul>
    </nav>

    <header id="hero" class="hero-section">
        <div class="hero-content reveal">
            <h1>Valoriser la <span class="gradient-text">donnée</span><br>par le développement.</h1>
            
            <p class="subtitle">Étudiant en 3ème année de BUT Informatique à l'IUT Paul Sabatier (Spécialité AGED).</p>
            
            <div class="hero-buttons">
                <a href="#projects" class="btn-primary">Voir mes réalisations</a>
                <a href="Loris Pigneaux.pdf" target="_blank" class="btn-secondary">Télécharger mon CV</a>
            </div>
        </div>
        
        <div class="hero-image reveal delay-200">
            <img src="work.jpeg" alt="Espace de travail créatif" class="placeholder-img">
        </div>
    </header>

    <section id="about" class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-image reveal">
                    <div class="image-wrapper">
                        <img src="photoprofil.jpg" alt="Photo de profil" class="placeholder-img">
                    </div>
                </div>
                 <div class="about-text reveal delay-200">
                    <h2>À propos</h2>
                    <p>Actuellement en dernière année de formation à l'IUT Paul Sabatier de Toulouse, je me prépare à devenir un développeur polyvalent avec une forte sensibilité pour la data.</p>
                    
                    <p>Ma spécialité AGED (Administration, Gestion et Exploitation des Données) me permet de concevoir des applications robustes tout en maîtrisant le cycle de vie des données, de la base de données à la visualisation utilisateur.</p>
                </div>
            </div>
        </div>
    </section>

   <section id="skills" class="skills-section">
        <div class="container">
            <h2 class="section-title reveal">Mes Domaines d'Expertise</h2>
            
            <div class="skills-grid">
                
                <div class="skill-card reveal" style="--accent-glow: #00f2ea;">
                    <div class="card-header">
                        <div class="icon-box"><i class="fa-solid fa-layer-group"></i></div>
                        <h3>Frontend & UI</h3>
                    </div>
                    <p>Conception d'interfaces fluides, réactives et esthétiques.</p>
                    
                    <div class="skill-tags">
                        <span class="skill-tag" data-desc="Langage de balisage standard." data-tech-filter="html">
                            <i class="fa-brands fa-html5"></i> HTML5
                        </span>
                        <span class="skill-tag" data-desc="Langage de style pour la mise en forme." data-tech-filter="css">
                            <i class="fa-brands fa-css3-alt"></i> CSS3
                        </span>
                        <span class="skill-tag" data-desc="Langage rendant les pages interactives." data-tech-filter="js">
                            <i class="fa-brands fa-js"></i> JavaScript
                        </span>
                        <span class="skill-tag" data-desc="Outil de design collaboratif." data-tech-filter="figma">
                            <i class="fa-brands fa-figma"></i> Figma
                        </span>
                        <span class="skill-tag" data-desc="Adaptation mobile/tablette.">
                            <i class="fa-solid fa-mobile-screen"></i> Responsive
                        </span>
                    </div>
                </div>

                <div class="skill-card reveal delay-100" style="--accent-glow: #a855f7;">
                    <div class="card-header">
                        <div class="icon-box"><i class="fa-solid fa-server"></i></div>
                        <h3>Backend & Data</h3>
                    </div>
                    <p>Architecture robuste et gestion sécurisée des données.</p>
                    
                    <div class="skill-tags">
                        <span class="skill-tag" data-desc="Langage serveur puissant." data-tech-filter="php">
                            <i class="fa-brands fa-php"></i> PHP
                        </span>
                        <span class="skill-tag" data-desc="Gestion de base de données." data-tech-filter="mysql">
                            <i class="fa-solid fa-database"></i> MySQL
                        </span>
                        <span class="skill-tag" data-desc="Langage idéal pour l'algorithmique." data-tech-filter="python">
                            <i class="fa-brands fa-python"></i> Python
                        </span>
                        <span class="skill-tag" data-desc="Communication client-serveur." data-tech-filter="api">
                            <i class="fa-solid fa-network-wired"></i> API REST
                        </span>
                        <span class="skill-tag" data-desc="Architecture Modèle-Vue-Contrôleur." data-tech-filter="mvc">
                            <i class="fa-solid fa-sitemap"></i> MVC
                        </span>
                    </div>
                </div>

                <div class="skill-card reveal delay-200" style="--accent-glow: #22c55e;">
                    <div class="card-header">
                        <div class="icon-box"><i class="fa-solid fa-code-branch"></i></div>
                        <h3>DevOps & Outils</h3>
                    </div>
                    <p>Optimisation du workflow et travail collaboratif.</p>
                    
                   <div class="skill-tags">
                        <span class="skill-tag" data-desc="Système de contrôle de version.">
                            <i class="fa-brands fa-git-alt"></i> Git
                        </span>
                        <span class="skill-tag" data-desc="Plateforme d'hébergement de code.">
                            <i class="fa-brands fa-github"></i> GitHub
                        </span>
                        <span class="skill-tag" data-desc="Outil de conteneurisation.">
                            <i class="fa-brands fa-docker"></i> Docker
                        </span>
                        <span class="skill-tag" data-desc="Méthodologie de gestion de projet.">
                            <i class="fa-solid fa-list-check"></i> Agile
                        </span>
                        <span class="skill-tag" data-desc="Ligne de commande." data-tech-filter="terminal">
                            <i class="fa-solid fa-terminal"></i> Terminal
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </section>

  <section id="projects" class="projects-section">
        <div class="container">
            <h2 class="section-title reveal">Projets & Réalisations</h2>
            
            <div class="filter-container reveal">
                <button class="filter-btn active" data-filter="all">Tous</button>
                <button class="filter-btn" data-filter="java">Java / JavaFX</button>
                <button class="filter-btn" data-filter="js">JavaScript / Web</button>
                <button class="filter-btn" data-filter="python">Python / Algo</button>
                <span id="dynamic-filter-container"></span>
            </div>
            
            <div class="projects-grid">
                
                <article class="project-card reveal" data-category="java" data-techs="java javafx mysql mvc">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="card-image">
                                 <img src="gestionlocative.jpg" alt="App Gestion Location" class="placeholder-img">
                            </div>
                            <div class="front-content">
                                <h3>Gestion de Location</h3>
                                <button class="btn-details" onclick="flipCard(this)">Voir le résumé & détails</button>
                            </div>
                        </div>

                        <div class="card-back">
                            <h4 class="back-title">Détails du projet</h4>
                            <p class="project-summary">
                                Application desktop développée pour un projet au sein de l'IUT. Elle permet la gestion complète du CRUD (Clients, Biens, Contrats).
                            </p>
                            <div class="tech-stack">
                                <span class="tech-badge">Java</span>
                                <span class="tech-badge">JavaFX</span>
                                <span class="tech-badge">MySQL</span>
                                <span class="tech-badge">MVC</span>
                            </div>
                            <div class="back-actions">
                                <button class="btn-return" onclick="unflipCard(this)" aria-label="Retour">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 14l-4-4 4-4"/><path d="M5 10h11a4 4 0 1 1 0 8h-1"/></svg>
                                </button>
                                <a href="https://github.com/calatrabav/S3C01" target="_blank" class="github-btn-mini">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                    GitHub
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="project-card reveal delay-100" data-category="js" data-techs="js javascript php html css api json chartjs">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="card-image">
                                 <img src="dashboarddata.jpg" alt="Dashboard Data" class="placeholder-img">
                            </div>
                            <div class="front-content">
                                <h3>Visualisation de Données</h3>
                                <button class="btn-details" onclick="flipCard(this)">Voir le résumé & détails</button>
                            </div>
                        </div>
                        <div class="card-back">
                            <h4 class="back-title">Détails du projet</h4>
                            <p class="project-summary">
                                Interface web interactive connectée. Elle transforme des fichiers JSON bruts en graphiques dynamiques pour faciliter la prise de décision.
                            </p>
                            <div class="tech-stack">
                                <span class="tech-badge">PHP</span>
                                <span class="tech-badge">JS</span>
                                <span class="tech-badge">Chart.js</span>
                                <span class="tech-badge">JSON</span>
                            </div>
                            <div class="back-actions">
                                <button class="btn-return" onclick="unflipCard(this)" aria-label="Retour">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 14l-4-4 4-4"/><path d="M5 10h11a4 4 0 1 1 0 8h-1"/></svg>
                                </button>
                                <a href="https://github.com/lorispgx/dataview" target="_blank" class="github-btn-mini">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                    GitHub
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="project-card reveal delay-200" data-category="python" data-techs="python algo terminal">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="card-image">
                                 <img src="research.jpg" alt="Algorithme Python" class="placeholder-img">
                            </div>
                            <div class="front-content">
                                <h3>Algorithme de Recherche</h3>
                                <button class="btn-details" onclick="flipCard(this)">Voir le résumé & détails</button>
                            </div>
                        </div>
                        <div class="card-back">
                            <h4 class="back-title">Détails du projet</h4>
                            <p class="project-summary">
                                Implémentation d'algorithme complexe en Python pour résoudre des problèmes de chemin le plus court dans un graphe.
                            </p>
                            <div class="tech-stack">
                                <span class="tech-badge">Python</span>
                                <span class="tech-badge">Algorithmique</span>
                                <span class="tech-badge">Graphes</span>
                            </div>
                            <div class="back-actions">
                                <button class="btn-return" onclick="unflipCard(this)" aria-label="Retour">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 14l-4-4 4-4"/><path d="M5 10h11a4 4 0 1 1 0 8h-1"/></svg>
                                </button>
                                <a href="https://github.com/lorispgx/searchalogorithm" target="_blank" class="github-btn-mini">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                    GitHub
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="container small-container">
            <h2 class="section-title reveal">Me contacter</h2>
            
            <?php if(isset($message_sent) && $message_sent): ?>
                <div class="success-message reveal">
                    <h3>Merci !</h3>
                    <p>Votre message a bien été transmis. Je vous répondrai sous 24h.</p>
                </div>
            <?php else: ?>
                <form action="index.php#contact" method="POST" class="contact-form reveal">
                    <div class="form-group">
                        <label for="name">Nom / Entreprise</label>
                        <input type="text" id="name" name="name" required placeholder="Ex: Jean Dupont">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="jean@exemple.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="object">Objet</label>
                        <input type="text" id="object" name="object" required placeholder="Proposition de stage / Projet...">
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Bonjour, je vous contacte car..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn-primary full-width">Envoyer le message</button>
                </form>
            <?php endif; ?>

            <div class="footer-links reveal delay-100">
                <div class="socials-icons">
                    
                    <a href="https://github.com/lorispgx" target="_blank" class="icon-link" aria-label="GitHub">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>

                    <a href="https://www.linkedin.com/in/loris-pigneaux-59aa09279/" target="_blank" class="icon-link" aria-label="LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>

                     <a href="mailto:lorispigeaux@gmail.com" class="icon-link" aria-label="Email">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z"/>
                        </svg>
                    </a>

                </div>
                <p class="copyright">&copy; <?php echo date("Y"); ?> - Étudiant IUT Paul Sabatier - Spécialité AGED.</p>
            </div>
        </div>
    </section>

    <div id="tutorial-overlay" class="tutorial-card">
        <div class="tutorial-content">
            <div class="tutorial-icon">💡</div>
            <div class="tutorial-text">
                <h3>Astuce de navigation</h3>
                <p>Cliquez sur une <strong>compétence</strong> (ex: Java, Docker) pour voir sa définition et <strong>filtrer automatiquement</strong> les projets liés !</p>
            </div>
        </div>
        <button id="close-tutorial" class="tutorial-btn">C'est compris !</button>
    </div>

    <script src="script.js"></script>
</body>

</html>