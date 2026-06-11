<?php
require_once "../utils/autoloader.php";
session_start();

require_once "../utils/isConnected.php";
require_once "../utils/db_connexion.php";
require_once "../utils/isThemeChosen.php";

/** @var Joueur $joueur */
$joueur = $_SESSION['joueur'];

/** @var Qcm $qcm */
$qcm = $_SESSION['qcm'];

// Récupérer le classement
$scoreRepo = new ScoreRepository($db);
$joueurRepo = new JoueurRepository($db);

$scores = $scoreRepo->findAllByQcm($qcm, $joueurRepo);
// var_dump($scores);
// die();


require_once "../_partials/_head.php";
?>

<!-- HEADER -->
<div class="flex flex-col items-center gap-2">
    <img src="../assets/images/trophee.png" alt="trophée" class="w-20 h-20">
    <h1 class="text-3xl orbitron font-extrabold text-[#00FFE7] md:text-5xl">Fin de partie !</h1>
</div>

<!-- THÈME -->
<div class="flex flex-row items-center justify-center gap-2 mt-2">
    <img src="../assets/images/terre (1).png" alt="" class="w-8 h-8">
    <p class="text-white orbitron text-sm">Thème <?= ucfirst($qcm->getTheme()) ?></p>
</div>

<!-- CLASSEMENT -->
<div class="w-full max-w-md mx-auto px-4 mt-6">
    <div class="bg-[#11151C]/75 border border-white/20 rounded-lg p-4">
        <h2 class="text-[#FF006E] orbitron text-sm mb-4">Classement final</h2>

        <div class="flex flex-col gap-3">
            <?php foreach ($scores as $index => $score) :
                $estJoueurCourant = $score->getJoueur()->getId() === $joueur->getId();
                $rang = $index + 1;

                // Couleur selon le rang
                if ($rang === 1) $couleur = 'border-[#F9C80E] bg-[#F9C80E]/10';
                elseif ($rang === 2) $couleur = 'border-[#C0C0C0] bg-[#C0C0C0]/10';
                elseif ($rang === 3) $couleur = 'border-[#CD7F32] bg-[#CD7F32]/10';
                else $couleur = 'border-white/10 bg-[#1A1F29]/60';

                // Surligner le joueur courant
                if ($estJoueurCourant) $couleur .= ' ring-2 ring-[#00FFE7]';
            ?>
                <div class="flex items-center gap-3 border rounded-lg px-4 py-3 <?= $couleur ?>">
                    <!-- RANG -->
                    <span class="orbitron text-white text-xs w-4"><?= $rang ?></span>

                    <!-- INITIALES -->
                    <span class="w-10 h-10 flex items-center justify-center rounded text-xs font-bold orbitron
                        <?= $estJoueurCourant ? 'bg-[#FF006E] text-white' : 'bg-white/10 text-white' ?>">
                        <?= strtoupper(substr($score->getJoueur()->getPseudo(), 0, 2)) ?>
                    </span>

                    <!-- PSEUDO -->
                    <span class="text-white text-sm flex-1 orbitron"><?= htmlspecialchars($score->getJoueur()->getPseudo()) ?></span>

                    <!-- SCORE -->
                    <span class="orbitron font-extrabold text-white">
                        <?= $score->getScore() ?>
                        <span class="text-xs text-white/50">PTS</span>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- BOUTON REJOUER -->
<div class="flex justify-center mt-6">
    <a href="../process/traitement-rejouer.php"
        class="inline-flex items-center gap-2 bg-[#271033]/95 border border-[#FF006E] rounded-lg px-8 py-3 text-[#FF006E] orbitron text-sm transition-all hover:bg-[#FF006E]/20 hover:shadow-[0_0_20px_#FF006E]">
        Rejouer
        <span>↺</span>
    </a>
</div>

<?php require_once "../_partials/_footer.php" ?>