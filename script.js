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

/* --- 2. Chargement du DOM (Filtres & Scroll) --- */
document.addEventListener("DOMContentLoaded", () => {
    
    console.log("Portfolio chargé et JS actif.");

    /* --- Gestion des Filtres --- */
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

    /* --- Intersection Observer (Animation d'apparition) --- */
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

    /* --- Smooth Scroll pour la navigation --- */
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
});