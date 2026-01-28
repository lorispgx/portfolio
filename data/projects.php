<?php
// Fichier : data/projects.php

$projects = [
    'gestion-locative' => [
        'title' => 'Gestion de Location',
        'subtitle' => 'Application Desktop JavaFX',
        'category' => 'java', 
        'tags_filter' => 'java javafx mysql mvc',
        
        'languages' => ['Java', 'SQL'],
        'tools' => ['Eclipse', 'MySQL Workbench', 'Git'],
        
        'summary' => "Application desktop complète pour agence immo avec gestion CRUD et facturation.",
        'description' => "Ce projet a été réalisé dans le cadre de ma formation. L'objectif était de créer une solution robuste pour gérer les biens immobiliers, les locataires et les propriétaires. <br><br> J'ai mis l'accent sur l'architecture MVC pour séparer la logique métier de l'interface utilisateur, ce qui rend l'application facilement maintenable et évolutive.",
        'main_image' => 'assets/img/gestionlocative.jpg', // Chemin corrigé (racine)
        'gallery' => [
            'assets/img/projetlocation.png'
        ],
        'github_link' => 'https://github.com/calatrabav/S3C01',
        'color' => '#f59e0b'
    ],
    'dashboard-data' => [
        'title' => 'Visualisation de Données',
        'subtitle' => 'Dashboard Web Interactif',
        'category' => 'js',
        'tags_filter' => 'js javascript php html css api json chartjs',
        
        'languages' => ['PHP', 'JavaScript', 'HTML5', 'CSS3'],
        'tools' => ['Chart.js', 'Visual Studio Code'],
        
        'summary' => "Interface web interactive connectée transformant des JSON bruts en graphiques.",
        'description' => "Une interface intuitive permettant aux décideurs de visualiser des données complexes. J'ai utilisé Chart.js pour le rendu dynamique et PHP pour le traitement des données en amont via une API.",
        'main_image' => 'assets/img/dashboarddata.jpg', // Chemin corrigé (racine)
        'gallery' => [
            'assets/img/projetdata.png'
        ],
        'github_link' => 'https://github.com/lorispgx/dataview',
        'color' => '#3b82f6'
    ],
    'algo-recherche' => [
        'title' => 'Algorithme de Recherche',
        'subtitle' => 'Pathfinding & Graphes',
        'category' => 'python',
        'tags_filter' => 'python algo terminal',
        
        'languages' => ['Python'],
        'tools' => ['Visual Studio Code', 'Git', 'Terminal'],
        
        'summary' => "Implémentation d'algorithme complexe pour résoudre des problèmes de chemin.",
        'description' => "Exploration approfondie de l'algorithme A* (A-Star) et Dijkstra pour trouver le chemin le plus court dans un environnement complexe généré aléatoirement.",
        'main_image' => 'assets/img/research.jpg', // Chemin corrigé (racine)
        'gallery' => [
           
        ],
        'github_link' => 'https://github.com/lorispgx/searchalogorithm',
        'color' => '#10b981'
    ]
];
?>