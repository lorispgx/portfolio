/* --- 1. Fonctions Globales pour le Flip (Cartes Projets) --- */
window.flipCard = function(btn) {
    const cardInner = btn.closest(".card-inner");
    if (cardInner) cardInner.classList.add("is-flipped");
};
window.unflipCard = function(btn) {
    const cardInner = btn.closest(".card-inner");
    if (cardInner) cardInner.classList.remove("is-flipped");
};

/* --- 2. Chargement du DOM --- */
document.addEventListener("DOMContentLoaded", () => {
    console.log("--> Portfolio chargé. Interactions actives.");

    const projectCards = document.querySelectorAll(".project-card");
    const filterBtns = document.querySelectorAll(".filter-btn");
    const dynamicFilterContainer = document.getElementById("dynamic-filter-container");

    // --- GESTION DU TUTORIEL (Onboarding) ---
    const tutorialOverlay = document.getElementById("tutorial-overlay");
    const closeTutorialBtn = document.getElementById("close-tutorial");
    const skillsSection = document.querySelector("#skills"); // On cible la section compétences
    
    // Clic sur le bouton "C'est compris"
    if (closeTutorialBtn && tutorialOverlay) {
        closeTutorialBtn.addEventListener("click", () => {
            tutorialOverlay.classList.remove("visible");
            localStorage.setItem("portfolio_tutorial_seen", "true");
        });
    }

    // --- LOGIQUE HYBRIDE : Souris (Desktop) & Scroll (Mobile/Tous) ---
    
    // 1. Desktop : Afficher au survol des cartes (comme avant)
    document.querySelectorAll('.skill-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            const isSeen = localStorage.getItem("portfolio_tutorial_seen");
            if (!isSeen && tutorialOverlay) {
                tutorialOverlay.classList.add("visible");
            }
        });
        // Note: J'ai retiré le mouseleave pour éviter que ça clignote trop sur mobile si on touche
        // L'utilisateur fermera le tuto avec le bouton "C'est compris"
    });

    // 2. Mobile & Desktop : Afficher quand on arrive sur la section Compétences (Scroll)
    if (skillsSection && tutorialOverlay) {
        const tutorialObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                // Si la section compétences est visible à 50%
                if (entry.isIntersecting) {
                    const isSeen = localStorage.getItem("portfolio_tutorial_seen");
                    if (!isSeen) {
                        tutorialOverlay.classList.add("visible");
                        // On peut choisir de déconnecter l'observer pour ne pas le spammer
                        // tutorialObserver.unobserve(entry.target); 
                    }
                }
            });
        }, { threshold: 0.3 }); // Se déclenche quand 30% de la section est visible
        
        tutorialObserver.observe(skillsSection);
    }

    // --- FILTRAGE DES PROJETS ---
    function filterProjects(filterValue, customLabel = null) {
        projectCards.forEach(card => {
            const cardTechs = card.getAttribute("data-techs"); 
            if (filterValue === "all" || (cardTechs && cardTechs.includes(filterValue))) {
                card.classList.remove("hide"); card.classList.add("show");
            } else {
                card.classList.remove("show"); card.classList.add("hide");
            }
        });

        filterBtns.forEach(btn => btn.classList.remove("active"));
        let standardBtnFound = false;
        filterBtns.forEach(btn => {
            if(btn.getAttribute("data-filter") === filterValue) {
                btn.classList.add("active");
                standardBtnFound = true;
            }
        });

        if (dynamicFilterContainer) {
            if (!standardBtnFound && customLabel && filterValue !== "all") {
                dynamicFilterContainer.innerHTML = `<button class="filter-btn active dynamic-badge">Filtre : ${customLabel} <i class="fa-solid fa-check"></i></button>`;
            } else {
                dynamicFilterContainer.innerHTML = "";
            }
        }
    }

    filterBtns.forEach(btn => btn.addEventListener("click", () => filterProjects(btn.getAttribute("data-filter"))));

    // --- TOOLTIP SUR LES TAGS (Les petites pilules HTML, CSS...) ---
    // Création de la bulle noire
    const tooltip = document.createElement('div');
    tooltip.className = 'custom-tooltip';
    document.body.appendChild(tooltip);
    let closeTimer = null;

    function showTooltip(tag) {
        if (closeTimer) clearTimeout(closeTimer);
        const desc = tag.getAttribute('data-desc');
        if (!desc) return; // Si pas de description, on ne fait rien

        const techFilter = tag.getAttribute('data-tech-filter');
        const techLabel = tag.textContent.trim();
        
        let htmlContent = `<span>${desc}</span>`;
        if (techFilter) {
            htmlContent += `<br><span class="tooltip-action" data-go-filter="${techFilter}" data-label="${techLabel}">Voir les projets <i class="fa-solid fa-arrow-right"></i></span>`;
        }

        tooltip.innerHTML = htmlContent;
        
        // Calcul de position
        const rect = tag.getBoundingClientRect();
        const tooltipRect = tooltip.getBoundingClientRect();
        const top = rect.top + window.scrollY - tooltipRect.height - 10;
        const left = rect.left + window.scrollX + (rect.width / 2) - (tooltipRect.width / 2);
        
        tooltip.style.top = `${top}px`;
        tooltip.style.left = `${left}px`;
        tooltip.classList.add('visible');

        // Gestion du clic sur "Voir les projets"
        const actionBtn = tooltip.querySelector('.tooltip-action');
        if(actionBtn) {
            actionBtn.addEventListener('click', (evt) => {
                evt.stopPropagation();
                tooltip.classList.remove('visible');
                document.getElementById('projects')?.scrollIntoView({ behavior: 'smooth' });
                setTimeout(() => filterProjects(actionBtn.getAttribute("data-go-filter"), actionBtn.getAttribute("data-label")), 500);
            });
        }
    }

    // Cible : .skill-tag (Les petites pilules)
    document.querySelectorAll('.skill-tag').forEach(tag => {
        // 'click' marche sur Desktop et Mobile (tap)
        tag.addEventListener('click', (e) => {
            // Sur mobile, on empêche parfois le comportement par défaut si nécessaire, 
            // mais ici le click est standard.
            e.stopPropagation(); // Évite de fermer immédiatement si on clique sur le tag
            showTooltip(tag);
        });
        
        // Pour Desktop : fermeture au survol sortant
        tag.addEventListener('mouseleave', () => { 
            closeTimer = setTimeout(() => tooltip.classList.remove('visible'), 300); 
        });
    });

    // Fermeture du tooltip si on clique ailleurs sur la page (Essentiel pour Mobile)
    document.addEventListener('click', (e) => {
        // Si le clic n'est pas sur un tag ni dans le tooltip
        if (!e.target.closest('.skill-tag') && !e.target.closest('.custom-tooltip')) {
            tooltip.classList.remove('visible');
        }
    });

    // Empêcher la fermeture si on survole la bulle elle-même (Desktop)
    tooltip.addEventListener('mouseenter', () => { if (closeTimer) clearTimeout(closeTimer); });
    tooltip.addEventListener('mouseleave', () => { tooltip.classList.remove('visible'); });

    // --- ANIMATION D'APPARITION AU SCROLL ---
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) { entry.target.classList.add("active"); observer.unobserve(entry.target); }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll(".reveal").forEach(el => observer.observe(el));
});