<?php require_once "../_partials/_head.php" ?>

<!-- HEADER -->
<div class="flex flex-col items-center justify-center gap-2 px-4">
    <img src="../assets/images/trophee.png" alt="" class="w-16 h-16">
    <h1 class="text-2xl orbitron font-extrabold text-[#00FFE7] md:text-4xl">Fin de partie !</h1>
    <div class="flex flex-row items-center gap-2">
        <img src="../assets/images/terre (1).png" alt="" class="w-8 h-8">
        <p class="orbitron text-white text-sm md:text-xl">Thème Cartographie</p>
    </div>
</div>

<!-- CLASSEMENT -->
<div class="w-full max-w-md mx-auto px-4 mt-6">
    <section class="bg-[#11151C]/75 border border-white/35 rounded-lg px-4 pt-6 pb-4 flex flex-col gap-3">

        <h2 class="orbitron text-[12px] text-[#FF006E] mb-2">Classement final</h2>

        <!-- 1er -->
        <div class="bg-[#1A1F29]/60 border border-white/20 rounded-lg px-4 py-3 flex items-center gap-3">
            <span class="w-8 h-8 flex items-center justify-center bg-white/10 rounded text-xs font-bold text-white orbitron">Hb</span>
            <span class="text-white text-sm flex-1">Henria b</span>
            <span class="orbitron text-xs text-white">430 PTS</span>
        </div>

        <!-- 2ème -->
        <div class="bg-[#F9C80E]/20 border border-[#F9C80E] rounded-lg px-4 py-3 flex items-center gap-3 shadow-[0_0_10px_#F9C80E]">
            <span class="w-8 h-8 flex items-center justify-center bg-[#F9C80E]/30 rounded text-xs font-bold text-[#F9C80E] orbitron">CO</span>
            <span class="text-white text-sm flex-1">Clovis O</span>
            <span class="orbitron text-xs text-[#F9C80E]">430 PTS</span>
        </div>

        <!-- 3ème -->
        <div class="bg-[#FF006E]/20 border border-[#FF006E] rounded-lg px-4 py-3 flex items-center gap-3 shadow-[0_0_10px_#FF006E]">
            <span class="w-8 h-8 flex items-center justify-center bg-[#FF006E]/30 rounded text-xs font-bold text-[#FF006E] orbitron">SCH</span>
            <span class="text-white text-sm flex-1">Sandrine Ch</span>
            <span class="orbitron text-xs text-[#FF006E]">430 PTS</span>
        </div>

        <!-- 4ème -->
        <div class="bg-[#1A1F29]/60 border border-white/20 rounded-lg px-4 py-3 flex items-center gap-3">
            <span class="w-8 h-8 flex items-center justify-center bg-[#FF006E]/40 rounded text-xs font-bold text-white orbitron">AY</span>
            <span class="text-white text-sm flex-1">Aliya Y</span>
            <span class="orbitron text-xs text-white">430 PTS</span>
        </div>

    </section>
</div>

<!-- BOUTON REJOUER -->
<div class="flex justify-center mt-6">
    <a href="index.php" class="inline-flex items-center gap-2 bg-[#FF006E] border border-[#f0e2e81f] rounded px-8 py-3 text-white orbitron text-sm transition-all hover:bg-[#FF006E]/80 hover:shadow-[0_0_20px_#FF006E] hover:scale-105">
        Rejouer
        <img src="../assets/images/fusee.png" alt="" class="w-5 h-5">
    </a>
</div>

<?php require_once "../_partials/_footer.php" ?>
