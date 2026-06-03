<?php require_once "../_partials/_head.php" ?>

<!-- ///////////////////////header/////////////////////////////////////////////////////// -->
<div class="flex flex-row items-center  px-4 justify-center">
    <img src="../assets/images/star (2).png" alt="" class="w-15 h-15">
    <h1 class="text-2xl text-center orbitron font-extrabold text-[#FF006E] md:text-4xl">FLASH QUIZZ</h1>
    <img src="../assets/images/stars.png" alt="" class="w-15 h-15">
</div>
<p class="text-[12px] orbitron text-center text-white md:text-xl">Inscris-toi, choisis ton theme et montre que tu es le meilleur !</p>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="w-full max-w-5xl mx-auto flex flex-col md:flex-row gap-4">

    <!-- GAUCHE : Inscription + Thèmes -->
    <div class="flex flex-col gap-4 flex-1">

        <!-- Inscription -->
        <section class="bg-[#11151C]/75 border border-white/35 rounded-md px-4 pt-6 pb-2 flex flex-col">

            <h2 class="orbitron text-[12px] text-pink-700 mb-2 flex flex-row gap-2"> <img src="../assets/images/star.png" alt="" class="w-3 h-3">Inscription</h2>

            <form action="traitement-inscription.php" method="POST" class="flex flex-col gap-2">
                <input type="text" name="pseudo" placeholder="Pseudo"
                    class="bg-[#1A1F29]/60 border border-white/10 rounded-md text-white text-xs px-4 py-2">

                <input type="text" name="mot_de_passe" placeholder="Mot de passe"
                    class="bg-[#1A1F29]/60 border border-white/10 rounded-md text-white text-xs px-4 py-2">

                <button type="submit"
                    class="bg-pink-700 text-white text-xs py-2 rounded-md hover:bg-[#FF006E] hover:shadow-[0_0_15px_#FF006E]">
                    Rejoindre
                </button>
            </form>
        </section>

        <!-- Thèmes -->
        <section class="bg-[#11151C]/75 border border-white/35 rounded-md px-4 pt-6 pb-2 flex flex-col ">
            <h2 class="orbitron text-[12px] text-[#00FFE7]">Choix du thème</h2>

            <div class="flex gap-3 pt-3">
                <button type="button" class="flex-1 bg-[#1A1F29]/60 border border-white/10 rounded-md p-3 text-center transition-all duration-300 hover:bg-[#FF006E]/20 hover:border-[#FF006E] hover:shadow-[0_0_10px_#FF006E,0_0_20px_#FF006E,0_0_40px_#FF006E] hover:scale-105 text-pink-700">
                    <img class="w-8 h-8 mb-2 mx-auto" src="../assets/images/programmation.png" alt="">
                    Programmation
                    <p class="Montserrat text-[8px] text-white md:text-[10px]">HTML, CSS, JS et plus</p>
                </button>

                <button type="button" class="flex-1 bg-[#1A1F29]/60 border border-white/10 rounded-md p-3 text-center text-[#00FFE7] transition-all duration-300 hover:bg-[#00FFE7]/20 hover:border-[#00FFE7] hover:shadow-[0_0_10px_#00FFE7,0_0_20px_#00FFE7,0_0_40px_#00FFE7] hover:scale-105">
                    <img class="w-8 h-8 mb-2 mx-auto" src="../assets/images/terre (1).png" alt="">
                    Cartographie
                    <p class="Montserrat text-[8px] text-white md:text-[10px]">Pays, Capitales et géo...</p>
                </button>
            </div>
        </section>

    </div>

    <!-- DROITE : Participants -->
    <section class="flex-1 bg-[#11151C]/75 border border-white/35 rounded-md px-4 pt-6 pb-2 flex flex-col gap-2">

        <h2 class="orbitron text-[12px] text-[#F9C80E] flex flex-row gap-2">
            <img src="../assets/images/employees.png" alt="" class="w-3 h-3">Participants
        </h2>

        <div class="space-y-2">
            <div class="bg-[#00FFE7]/20 border border-[#00FFE7] rounded-md px-4 py-2 text-center text-[10px] md:text-[16px]">
                ✔ Participant prêt
            </div>

            <div class="bg-[#00FFE7]/20 border border-[#00FFE7] rounded-md px-4 py-2 text-center text-[10px] md:text-[16px]">
                ✔ Participant prêt
            </div>

            <div class="bg-[#00FFE7]/20 border border-[#00FFE7] rounded-md px-4 py-2 text-center text-[10px] md:text-[16px]">
                ✔ Participant prêt
            </div>

            <div class="bg-[#00FFE7]/20 border border-[#00FFE7] rounded-md px-4 py-2 text-center text-[10px] md:text-[16px]">
                ✔ Participant prêt
            </div>
        </div>

    </section>

</div>

<!-- /////////////////////////footer///////////////////////////////////////////////////// -->
<div class="flex justify-center">
    <a href=""
        class="inline-flex items-center gap-2 bg-[#271033]/95 border border-white/35 rounded-md px-4 py-2 text-white  transition-all duration-300 hover:bg-[#FF006E] hover:shadow-[0_0_20px_#FF006E] hover:scale-105">

        <img class="w-6 h-6" src="../assets/images/fusee.png" alt="">

        <p class="orbitron text-sm md:text-2xl">Lancez la partie !</p>
    </a>
</div>

<p class="text-[10px] Montserrat text-center px-3 text-white md:text-[15px]">Choisis un thème • Clique sur chaque joueur pour le mettre prêt</p>

<?php require_once "../_partials/_footer.php" ?>

</html>