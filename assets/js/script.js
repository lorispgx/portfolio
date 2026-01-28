document.addEventListener("DOMContentLoaded", () => {
    console.log("--> Portfolio chargé. Version Clean.");

    const projectCards = document.querySelectorAll(".project-card-simple");
    const filterBtns = document.querySelectorAll(".filter-btn");
    const dynamicFilterContainer = document.getElementById("dynamic-filter-container");

    // --- TUTORIEL ---
    const tutorialOverlay = document.getElementById("tutorial-overlay");
    const closeTutorialBtn = document.getElementById("close-tutorial");
    const skillsSection = document.querySelector("#skills");
    
    if (closeTutorialBtn && tutorialOverlay) {
        closeTutorialBtn.addEventListener("click", () => {
            tutorialOverlay.classList.remove("visible");
            localStorage.setItem("portfolio_tutorial_seen", "true");
        });
    }

    // Affichage Scroll sur #skills
    if (skillsSection && tutorialOverlay) {
        const tutorialObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const isSeen = localStorage.getItem("portfolio_tutorial_seen");
                    if (!isSeen) tutorialOverlay.classList.add("visible");
                }
            });
        }, { threshold: 0.3 });
        tutorialObserver.observe(skillsSection);
    }

    // Affichage Hover sur .skill-card
    document.querySelectorAll('.skill-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            const isSeen = localStorage.getItem("portfolio_tutorial_seen");
            if (!isSeen && tutorialOverlay) tutorialOverlay.classList.add("visible");
        });
    });

    // --- FILTRAGE PROJETS ---
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

    // --- TOOLTIP SKILL-TAGS ---
    const tooltip = document.createElement('div');
    tooltip.className = 'custom-tooltip';
    document.body.appendChild(tooltip);
    let closeTimer = null;

    function showTooltip(tag) {
        if (closeTimer) clearTimeout(closeTimer);
        const desc = tag.getAttribute('data-desc');
        if (!desc) return;

        const techFilter = tag.getAttribute('data-tech-filter');
        const techLabel = tag.textContent.trim();
        let htmlContent = `<span>${desc}</span>`;
        if (techFilter) {
            htmlContent += `<br><span class="tooltip-action" data-go-filter="${techFilter}" data-label="${techLabel}">Voir les projets <i class="fa-solid fa-arrow-right"></i></span>`;
        }

        tooltip.innerHTML = htmlContent;
        const rect = tag.getBoundingClientRect();
        const top = rect.top + window.scrollY - tooltip.offsetHeight - 10;
        const left = rect.left + window.scrollX + (rect.width / 2) - (tooltip.offsetWidth / 2);
        
        tooltip.style.top = `${top}px`;
        tooltip.style.left = `${left}px`;
        tooltip.classList.add('visible');

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

    document.querySelectorAll('.skill-tag').forEach(tag => {
        tag.addEventListener('click', (e) => { e.stopPropagation(); showTooltip(tag); });
        tag.addEventListener('mouseleave', () => { closeTimer = setTimeout(() => tooltip.classList.remove('visible'), 300); });
    });

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.skill-tag') && !e.target.closest('.custom-tooltip')) tooltip.classList.remove('visible');
    });

    tooltip.addEventListener('mouseenter', () => { if (closeTimer) clearTimeout(closeTimer); });
    tooltip.addEventListener('mouseleave', () => { tooltip.classList.remove('visible'); });

    // --- ANIMATION SCROLL ---
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) { entry.target.classList.add("active"); observer.unobserve(entry.target); }
        });
    }, { threshold: 0.1 });
    document.querySelectorAll(".reveal").forEach(el => observer.observe(el));

    // --- GESTION DU MENU MOBILE ---
    const burgerMenu = document.getElementById('burger-menu');
    const navLinks = document.getElementById('nav-links');

    if (burgerMenu && navLinks) {
        burgerMenu.addEventListener('click', () => {
            // Bascule l'état ouvert/fermé
            navLinks.classList.toggle('active');
            burgerMenu.classList.toggle('open');
        });

        // Fermer le menu quand on clique sur un lien
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
                burgerMenu.classList.remove('open');
            });
        });
    }
});