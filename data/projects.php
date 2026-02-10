<?php
// Fichier : data/projects.php

$projects = [
    'gestion-locative' => [
        'title' => 'Gestion de Location',
        'subtitle' => 'Application Desktop JavaFX',
        
        // C'EST ICI QUE LE TRI SE FAIT (Doit correspondre à une clé de competencies.php)
        'category' => 'realiser', 
        'competency_id' => 'realiser', // Lien pour l'affichage détaillé
        
        // Les tags techniques restent pour l'info, mais ne servent plus au tri principal
        'tags_filter' => 'java javafx mysql', 
        
        'languages' => ['Java', 'SQL'],
        'tools' => ['JavaFX', 'MySQL Workbench', 'SceneBuilder', 'Git'],
        'summary' => "Application desktop complète pour agence immo avec gestion CRUD et facturation.",
        'description' => "Conception complète d'une application lourde en respectant les principes MVC.",
        'main_image' => 'assets/img/gestionlocative.jpg',
        'gallery' => ['assets/img/projetlocation.png'],
        'github_link' => 'https://github.com/calatrabav/S3C01',
        'color' => '#f59e0b'
    ],

    'dashboard-data' => [
        'title' => 'Visualisation de Données',
        'subtitle' => 'Dashboard Web Interactif',
        
        // Compétence : GÉRER (Car c'est de la Data/Visu)
        'category' => 'gerer', 
        'competency_id' => 'gerer',
        
        'tags_filter' => 'js php data sql',
        
        'languages' => ['PHP', 'JavaScript', 'HTML5', 'SQL'],
        'tools' => ['Chart.js', 'WampServer', 'JSON API'],
        'summary' => "Interface web interactive connectée transformant des données brutes en graphiques.",
        'description' => "Exploitation de données hétérogènes pour créer des tableaux de bord décisionnels.",
        'main_image' => 'assets/img/dashboarddata.jpg',
        'gallery' => ['assets/img/projetdata.png'],
        'github_link' => 'https://github.com/lorispgx/dataview',
        'color' => '#3b82f6'
    ],

    'algo-recherche' => [
        'title' => 'Algorithme de Recherche',
        'subtitle' => 'Pathfinding & Graphes',
        
        // Compétence : OPTIMISER (Car c'est de l'algo pur)
        'category' => 'optimiser', 
        'competency_id' => 'optimiser',
        
        'tags_filter' => 'python algo',
        
        'languages' => ['Python'],
        'tools' => ['PyCharm', 'Git', 'Terminal'],
        'summary' => "Implémentation d'algorithme complexe pour résoudre des problèmes de chemin.",
        'description' => "Analyse de complexité et optimisation de parcours de graphes.",
        'main_image' => 'assets/img/research.jpg',
        'gallery' => [], 
        'github_link' => 'https://github.com/lorispgx/searchalogorithm',
        'color' => '#10b981'
    ]
];
?>