<?php
// Fichier : data/competencies.php

$competencies = [
    // 1. Pour "Gestion Locative" (Semestre 4 - Réaliser / Conception)
    'app-complex' => [
        'title' => 'Conception et Développement d\'Applications',
        'level' => 'Niveau Avancé',
        'description' => "Partir des exigences client et aller jusqu'à une application complète, robuste et maintenable.",
        'skills' => [
            "Élaborer et implémenter les spécifications fonctionnelles et non fonctionnelles.",
            "Appliquer des principes d'accessibilité et d'ergonomie.",
            "Adopter de bonnes pratiques de conception et de programmation.",
            "Vérifier et valider la qualité de l'application par des tests unitaires et d'intégration."
        ]
    ],

    // 2. Pour "Visualisation Data" (Dév Web & Données)
    'web-data' => [
        'title' => 'Développement Web & Données',
        'level' => 'Niveau Intermédiaire',
        'description' => "Concevoir des interfaces web interactives et organiser la restitution de données complexes.",
        'skills' => [
            "Organiser la restitution de données à travers la programmation et la visualisation.",
            "Manipuler des données hétérogènes (JSON, API, SQL).",
            "Sécuriser les services et les données d'un système.",
            "Développer des interfaces utilisateurs réactives et adaptées."
        ]
    ],

    // 3. Pour "Algorithme" (Semestre 5 - Optimisation)
    'algo-opti' => [
        'title' => 'Optimisation et Analyse Algorithmique',
        'level' => 'Niveau Expert',
        'description' => "Analyser et optimiser des applications en fonction de critères spécifiques (temps d'exécution, mémoire, précision).",
        'skills' => [
            "Anticiper les résultats de diverses métriques de performance (temps, mémoire, charge).",
            "Profiler, analyser et justifier le comportement d'un code existant.",
            "Choisir et utiliser des structures de données complexes adaptées au problème.",
            "Utiliser des techniques algorithmiques avancées (graphes, recherche opérationnelle)."
        ]
    ]
];
?>