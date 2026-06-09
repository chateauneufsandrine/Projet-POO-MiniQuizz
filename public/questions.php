<?php
require_once "../utils/autoloader.php";
session_start();
require_once "../utils/db_connexion.php";
require_once "../utils/isThemeChosen.php";

/** @var Joueur $joueur */
isset($_SESSION['joueur']) ? $joueur = $_SESSION['joueur'] : $joueur = null;

$qcm = $_SESSION['qcm'];
$questions = $_SESSION['questions'];
$questionActuelle = $questions[$_SESSION['index_question']];
$reponses = $questionActuelle->getReponses();
$derniereReponse = $_SESSION['derniere_reponse'] ?? null;

require_once "../_partials/_head.php";
?>

<script>
    const derniereReponse = <?= json_encode($derniereReponse) ?>;
</script>

<!-- HEADER THÈME -->
<div class="flex flex-row items-center px-4 justify-center gap-2">
    <img src="../assets/images/terre (1).png" alt="" class="w-10 h-10">
    <h1 class="text-2xl orbitron font-extrabold text-[#00FFE7] md:text-4xl"><?= ucfirst($qcm->getTheme()) ?></h1>
</div>

<!-- BARRE DE PROGRESSION -->
<div class="w-full max-w-md mx-auto px-4 mt-4">
    <div class="flex justify-between text-xs orbitron mb-1">
        <span class="text-[#FF006E]"><?= $_SESSION['index_question'] + 1 ?>/<?= count($questions) ?></span>
        <span class="text-[#00FFE7]" id="timer-display">🕐 0 s</span>
    </div>
    <div class="h-1 bg-white/20 rounded-full overflow-hidden">
        <div class="h-full bg-linear-to-r from-[#FF006E] to-[#00FFE7] transition-all duration-1000" id="progress-bar"></div>
    </div>
</div>

<!-- QUESTION -->
<div class="w-full max-w-md mx-auto px-4 mt-6">
    <div class="bg-[#11151C]/75 border border-white/35 rounded-lg p-6">
        <p class="orbitron text-white text-center text-sm md:text-lg">
            <?= $questionActuelle->getIntitule() ?>
        </p>
    </div>
</div>

<!-- RÉPONSES -->
<div class="w-full max-w-md mx-auto px-4 mt-4 flex flex-col gap-3">
    <form action="../process/traitement-reponse.php" method="POST" class="flex flex-col gap-3" id="form-reponse">
        <?php
        $lettres = ['A', 'B', 'C', 'D'];
        foreach ($reponses as $index => $reponse) { ?>
            <label class="reponse-btn bg-[#1A1F29]/60 border border-white/10 rounded-lg px-4 py-3 text-white text-left flex items-center gap-3 transition-all hover:border-[#FF006E] hover:bg-[#FF006E]/10 cursor-pointer">
                <input type="radio" name="reponse_id" value="<?= $reponse->getId() ?>" style="display:none" required>
                <span class="w-8 h-8 flex items-center justify-center border border-[#F9C80E] text-[#F9C80E] rounded text-xs font-bold">
                    <?= $lettres[$index] ?>
                </span>
                <span class="text-sm"><?= $reponse->getIntitule() ?></span>
            </label>
        <?php } ?>

        <button type="submit" id="btn-valider"
            class="items-center gap-2 bg-[#271033]/95 border border-[#FF006E] rounded-lg px-6 py-2 text-[#FF006E] orbitron text-sm transition-all hover:bg-[#00FFE7]/20 hover:shadow-[0_0_20px_#00FFE7]">
            Valider
        </button>
    </form>
</div>

<!-- BOUTON SUIVANT -->
<div class="flex justify-center mt-6 hidden" id="btn-suivant-container">
    <a href="<?= isset($_SESSION['derniere_reponse']) ? '../process/traitement-question-suivante.php' : '#' ?>"
        class="inline-flex items-center gap-2 bg-[#271033]/95 border border-[#00FFE7] rounded-lg px-6 py-2 text-[#00FFE7] orbitron text-sm transition-all hover:bg-[#00FFE7]/20 hover:shadow-[0_0_20px_#00FFE7]">
        Question suivante
        <span>⊕</span>
    </a>
</div>

<?php require_once "../_partials/_footer.php" ?>