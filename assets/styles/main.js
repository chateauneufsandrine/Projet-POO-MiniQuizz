document.querySelectorAll('.reponse-btn').forEach(label => {
    label.addEventListener('click', function() {
        // Enlever le surlignage de tous les labels
        document.querySelectorAll('.reponse-btn').forEach(l => {
            l.classList.remove('border-[#FF006E]', 'bg-[#FF006E]/20', 'shadow-[0_0_15px_#FF006E]');
            l.classList.add('border-white/10', 'bg-[#1A1F29]/60');
        });
        // Surligner le label cliqué en rose
        this.classList.remove('border-white/10', 'bg-[#1A1F29]/60');
        this.classList.add('border-[#FF006E]', 'bg-[#FF006E]/20', 'shadow-[0_0_15px_#FF006E]');
    });
});


// Quand le formulaire est soumis → cacher Valider, afficher Question suivante
document.querySelector('#form-reponse').addEventListener('submit', function() {
    document.querySelector('#btn-valider').classList.add('hidden');
    document.querySelector('#btn-suivant-container').classList.remove('hidden');
});

// Afficher la correction si une réponse vient d'être donnée
if (derniereReponse) {
    document.querySelectorAll('.reponse-btn').forEach(label => {
        let input = label.querySelector('input[type="radio"]');
        let id = parseInt(input.value);

        if (derniereReponse.reponse_choisie_id == id) {
            if (derniereReponse.est_correcte) {
                // Bonne réponse → vert
                label.classList.add('border-green-500', 'bg-green-500/20');
            } else {
                // Mauvaise réponse → rouge
                label.classList.add('border-red-500', 'bg-red-500/20');
            }
        }
        // Désactiver les labels pour ne plus pouvoir cliquer
        label.style.pointerEvents = 'none';
    });

// Cacher Valider, afficher Question suivante
document.querySelector('#btn-valider').classList.add('hidden');
document.querySelector('#btn-suivant-container').classList.remove('hidden');
}


if (derniereReponse) {

    document.querySelectorAll('.reponse-btn').forEach(label => {
        let input = label.querySelector('input');
        let id = parseInt(input.value);

        // réponse choisie
        if (id === derniereReponse.reponse_choisie_id) {
            if (derniereReponse.est_correcte) {
                label.classList.add('border-green-500', 'bg-green-500/20');
            } else {
                label.classList.add('border-red-500', 'bg-red-500/20');
            }
        }

        // ⭐ bonne réponse (si erreur)
        if (
            !derniereReponse.est_correcte &&
            id === derniereReponse.bonne_reponse_id
        ) {
            label.classList.add('border-green-500', 'bg-green-500/20');
        }

        label.style.pointerEvents = 'none';
    });

    document.querySelector('#btn-valider').classList.add('hidden');
    document.querySelector('#btn-suivant-container').classList.remove('hidden');
}

if (document.querySelector('#timer-display') && !derniereReponse) {
    (function() {
        let startTime = Date.now();
        let maxSeconds = 30;
        let timerDisplay = document.querySelector('#timer-display');
        let progressBar = document.querySelector('#progress-bar');

        let interval = setInterval(() => {
            let elapsed = Math.floor((Date.now() - startTime) / 1000);
            let progress = Math.min((elapsed / maxSeconds) * 100, 100);

            timerDisplay.textContent = '🕐 ' + elapsed + ' s';
            progressBar.style.width = progress + '%';

            if (elapsed >= maxSeconds) {
                clearInterval(interval);
            }
        }, 1000);

        window._timerInterval = interval;
    })();
}