/* --- 1. Fonctions Globales pour le Flip --- */
/* On utilise "window.nomDeLaFonction" pour être sûr que le HTML (onclick) puisse les voir */

window.flipCard = function(btn) {
    const cardInner = btn.closest(".card-inner");
    if (cardInner) {
        cardInner.classList.add("is-flipped");
    }
};

window.unflipCard = function(btn) {
    const cardInner = btn.closest(".card-inner");
    if (cardInner) {
        cardInner.classList.remove("is-flipped");
    }
};

/* --- 2. Chargement du DOM --- */
document.addEventListener("DOMContentLoaded", () => {
    
    console.log("Portfolio chargé et JS actif.");

    /* --- A. Gestion des Filtres --- */
    const filterBtns = document.querySelectorAll(".filter-btn");
    const projectCards = document.querySelectorAll(".project-card");

    if (filterBtns.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                // 1. Gérer le style du bouton actif
                filterBtns.forEach(b => b.classList.remove("active"));
                btn.classList.add("active");

                // 2. Récupérer le filtre cliqué
                const filterValue = btn.getAttribute("data-filter");
                console.log("Filtre :", filterValue);

                // 3. Trier les cartes
                projectCards.forEach(card => {
                    const category = card.getAttribute("data-category");

                    if (filterValue === "all" || category === filterValue) {
                        card.classList.remove("hide");
                        card.classList.add("show");
                    } else {
                        card.classList.remove("show");
                        card.classList.add("hide");
                    }
                });
            });
        });
    }

    /* --- B. Intersection Observer (Animation d'apparition) --- */
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("active");
                // On arrête d'observer une fois apparu pour économiser des ressources
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll(".reveal").forEach(el => observer.observe(el));

    /* --- C. Smooth Scroll pour la navigation --- */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const target = document.querySelector(targetId);
            if(target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    /* --- D. Tooltip Interactif pour les Compétences (NOUVEAU) --- */
    
    // 1. Créer l'élément tooltip unique dans le DOM
    const tooltip = document.createElement('div');
    tooltip.className = 'custom-tooltip';
    document.body.appendChild(tooltip);

    let activeTag = null; // Pour savoir quel tag est ouvert

    // 2. Fonction pour gérer le clic sur les tags
    document.querySelectorAll('.skill-tag').forEach(tag => {
        tag.addEventListener('click', (e) => {
            e.stopPropagation(); // Empêche le clic de fermer immédiatement la bulle

            const desc = tag.getAttribute('data-desc');
            
            // Si pas de description, on ne fait rien
            if (!desc) return;

            // Si on clique sur le même tag, on ferme
            if (activeTag === tag) {
                hideTooltip();
                return;
            }

            // Mise à jour du contenu et affichage
            tooltip.textContent = desc;
            positionTooltip(tag);
            tooltip.classList.add('visible');
            activeTag = tag;
        });
    });

    // 3. Fermer la bulle si on clique n'importe où ailleurs
    document.addEventListener('click', () => {
        if (activeTag) {
            hideTooltip();
        }
    });

    // 4. Fonction pour cacher la bulle
    function hideTooltip() {
        tooltip.classList.remove('visible');
        activeTag = null;
    }

    // 5. Fonction mathématique pour placer la bulle au-dessus du tag
    function positionTooltip(element) {
        const rect = element.getBoundingClientRect();
        const tooltipRect = tooltip.getBoundingClientRect();

        // Calculs pour centrer au-dessus
        const top = rect.top + window.scrollY - tooltipRect.height - 10; // 10px plus haut
        const left = rect.left + window.scrollX + (rect.width / 2) - (tooltipRect.width / 2);

        tooltip.style.top = `${top}px`;
        tooltip.style.left = `${left}px`;
    }
    
    // Fermer aussi au scroll pour éviter les bugs visuels
    window.addEventListener('scroll', () => {
        if(activeTag) hideTooltip();
    });
});