<?php require_once "../_partials/_head.php" ?>

<!-- HEADER THÈME -->
<div class="flex flex-row items-center px-4 justify-center gap-2">
    <img src="../assets/images/terre (1).png" alt="" class="w-10 h-10">
    <h1 class="text-2xl orbitron font-extrabold text-[#00FFE7] md:text-4xl">Cartographie</h1>
</div>

<!-- BARRE DE PROGRESSION -->
<div class="w-full max-w-md mx-auto px-4 mt-4">
    <div class="flex justify-between text-xs orbitron mb-1">
        <span class="text-[#FF006E]">1/10</span>
        <span class="text-[#00FFE7]">🕐 0 s</span>
    </div>
    <div class="h-1 bg-white/20 rounded-full overflow-hidden">
        <div class="h-full bg-linear-to-r from-[#FF006E] to-[#00FFE7] w-[10%]"></div>
    </div>
</div>

<!-- QUESTION -->
<div class="w-full max-w-md mx-auto px-4 mt-6">
    <div class="bg-[#11151C]/75 border border-white/35 rounded-lg p-6">
        <p class="orbitron text-white text-center text-sm md:text-lg">
            Quel est le plus grand océan du monde ?
        </p>
    </div>
</div>

<!-- RÉPONSES -->
<div class="w-full max-w-md mx-auto px-4 mt-4 flex flex-col gap-3">

    <button class="reponse-btn bg-[#1A1F29]/60 border border-white/10 rounded-lg px-4 py-3 text-white text-left flex items-center gap-3 transition-all hover:border-[#FF006E] hover:bg-[#FF006E]/10">
        <span class="w-8 h-8 flex items-center justify-center border border-[#F9C80E] text-[#F9C80E] rounded text-xs font-bold">A</span>
        <span class="text-sm">Ocean Atlantique</span>
    </button>

    <button class="reponse-btn bg-[#1A1F29]/60 border border-white/10 rounded-lg px-4 py-3 text-white text-left flex items-center gap-3 transition-all hover:border-[#FF006E] hover:bg-[#FF006E]/10">
        <span class="w-8 h-8 flex items-center justify-center border border-[#F9C80E] text-[#F9C80E] rounded text-xs font-bold">B</span>
        <span class="text-sm">Ocean Indien</span>
    </button>

    <button class="reponse-btn bg-[#1A1F29]/60 border border-white/10 rounded-lg px-4 py-3 text-white text-left flex items-center gap-3 transition-all hover:border-[#FF006E] hover:bg-[#FF006E]/10">
        <span class="w-8 h-8 flex items-center justify-center border border-white/30 text-white/50 rounded text-xs font-bold">C</span>
        <span class="text-sm">Ocean Arctique</span>
    </button>

    <!-- Réponse sélectionnée (état actif) -->
    <button class="reponse-btn bg-[#00FFE7]/20 border-2 border-[#00FFE7] rounded-lg px-4 py-3 text-white text-left flex items-center gap-3 shadow-[0_0_15px_#00FFE7]">
        <span class="w-8 h-8 flex items-center justify-center bg-[#00FFE7] text-black rounded text-xs font-bold">D</span>
        <span class="text-sm">Ocean Pacifique</span>
        <span class="ml-auto text-[#00FFE7]">✓</span>
    </button>

</div>

<!-- BOUTON SUIVANT -->
<div class="flex justify-center mt-6">
    <a href="#" class="inline-flex items-center gap-2 bg-[#271033]/95 border border-[#00FFE7] rounded-lg px-6 py-2 text-[#00FFE7] orbitron text-sm transition-all hover:bg-[#00FFE7]/20 hover:shadow-[0_0_20px_#00FFE7]">
        Question suivante
        <span>⊕</span>
    </a>
</div>

<?php require_once "../_partials/_footer.php" ?>
