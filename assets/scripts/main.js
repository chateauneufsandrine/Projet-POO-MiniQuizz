document.addEventListener("DOMContentLoaded", function () {
  // Surlignage des réponses au clic
  document.querySelectorAll(".reponse-btn").forEach((label) => {
    label.addEventListener("click", function () {
      document.querySelectorAll(".reponse-btn").forEach((l) => {
        l.classList.remove(
          "border-[#FF006E]",
          "bg-[#FF006E]/20",
          "shadow-[0_0_15px_#FF006E]",
        );
        l.classList.add("border-white/10", "bg-[#1A1F29]/60");
      });
      this.classList.remove("border-white/10", "bg-[#1A1F29]/60");
      this.classList.add(
        "border-[#FF006E]",
        "bg-[#FF006E]/20",
        "shadow-[0_0_15px_#FF006E]",
      );
    });
  });

  // Soumission du formulaire → cacher Valider, afficher Suivant
  let form = document.querySelector("#form-reponse");
  if (form) {
    form.addEventListener("submit", function () {
      clearInterval(window._timerInterval);

      // ↓ CALCUL du TEMPS pour le SCORE FINAL
      let tempsEcoule = Math.floor((Date.now() - window._startTime) / 1000);
      document.querySelector("#temps-question").value = tempsEcoule;

      document.querySelector("#btn-valider").classList.add("hidden");
      document
        .querySelector("#btn-suivant-container")
        .classList.remove("hidden");
    });
  }


  console.log(derniereReponse);
  

  // Afficher la correction
  if (derniereReponse) {
    document.querySelectorAll(".reponse-btn").forEach((label) => {
      let input = label.querySelector("input");
      let id = parseInt(input.value);

      if (derniereReponse.timeout) {
        // Timeout → tout en rouge sauf la bonne réponse en vert
        if (id === derniereReponse.bonne_reponse_id) {
          label.classList.add("border-green-500", "bg-green-500/20");
        } else {
          label.classList.add("border-red-500", "bg-red-500/20");
        }
      } else {
        // Réponse choisie
        if (id === derniereReponse.reponse_choisie_id) {
          if (derniereReponse.est_correcte) {
            label.classList.add("border-green-500", "bg-green-500/20");
          } else {
            label.classList.add("border-red-500", "bg-red-500/20");
          }
        }
        // Bonne réponse si le joueur s'est trompé
        if (
          !derniereReponse.est_correcte &&
          id === derniereReponse.bonne_reponse_id
        ) {
          label.classList.add("border-green-500", "bg-green-500/20");
        }
      }

      label.style.pointerEvents = "none";
    });

    document.querySelector("#btn-valider").classList.add("hidden");
    document.querySelector("#btn-suivant-container").classList.remove("hidden");
  }

  // Timer
  if (document.querySelector("#timer-display") && !derniereReponse) {
    (function () {
      // let startTime = Date.now();
      window._startTime = Date.now();
      let maxSeconds = 30;
      let timerDisplay = document.querySelector("#timer-display");
      let progressBar = document.querySelector("#progress-bar");

      let interval = setInterval(() => {
        let elapsed = Math.floor((Date.now() - window._startTime) / 1000);
        let progress = Math.min((elapsed / maxSeconds) * 100, 100);

        timerDisplay.textContent = "🕐 " + elapsed + " s";
        progressBar.style.width = progress + "%";

        if (elapsed >= maxSeconds) {
          clearInterval(interval);

          // ↓ AJOUTER
    document.querySelector('#temps-question').value = 30;
          // Timeout → soumettre avec valeur spéciale
          let hiddenInput = document.createElement("input");
          hiddenInput.type = "hidden";
          hiddenInput.name = "reponse_id";
          hiddenInput.value = "timeout";
          form.appendChild(hiddenInput);
          form.submit();
        }
      }, 1000);

      window._timerInterval = interval;
    })();
  }
});
