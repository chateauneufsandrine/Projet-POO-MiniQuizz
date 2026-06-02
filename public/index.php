<?php require_once "../_partials/_head.php" ?>


<div class="flex flex-row items-center gap-2 px-4">
    <img src="../assets/images/star (2).png" alt="" class="w-15 h-15">
    <h1 class="text-2xl text-center orbitron font-extrabold text-[#FF006E]">FLASH QUIZZ</h1>
    <img src="../assets/images/stars.png" alt="" class="w-15 h-15">
</div>
<p class="text-xs orbitron text-center px-20">Inscris-toi, choisis ton theme et montre que tu es le meilleur !</p>


<section class="bg-[#11151C]/75 border border-white/35 rounded-md px-4 py-2 flex flex-col gap-1">
    <div class="flex flex-row gap-2"> <img src="../assets/images/star.png" alt="" class="w-3 h-3">
        <h2 class="orbitron text-[8px] text-pink-700">Inscription</h2>
    </div>
    <form action="traitement-inscription.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-1">
        <input type="text" name="pseudo" id="pseudo" class="bg-[#6B6B6B]/50 rounded-md text-white text-xs font-extralight px-6 py-1 w-full Montserrat border border-white/35"
            placeholder="Pseudo">
        <input type="text" name="mot_de_passe" id="mot_de_passe" class="bg-[#6B6B6B] rounded-md  border border-white/35 text-white text-xs font-extralight px-6 py-1 w-full Montserrat"
            placeholder="Mot de passe">
        <button type="submit" class="text-white orbitron rounded-md bg-pink-700 text-xs px-6 py-1 w-full border-white/35">Rejoindre</button>
    </form>
</section>



<section class="bg-[#11151C]/75 border border-white/35 rounded-md px-4 py-2 flex flex-col gap-1">
    <h2 class="orbitron text-[8px] text-[#00FFE7]">Choix du thème</h2>


    <div class="flex flex-row text-center items-center">
        <a href="" class="bg-[#6B6B6B]/50 rounded-md text-white text-xs 
            font-extralight px-6 py-1 w-full orbitron  border border-white/35 ">
            <img class="w-8 h-8" src="../assets/images/programmation.png" alt="">
            Programmation<p class="Montserrat text-[8px]">HTML, CSS, JS et plus</p></a>

        <a href="" class="bg-[#6B6B6B] rounded-md  border border-white/35
             text-white text-xs font-extralight px-6 py-1 w-full orbitron text-[#00FFE7] ">
            <img class="w-8 h-8" src="../assets/images/terre (1).png" alt="">Cartographie
            <p class="Montserrat text-[8px]">Pays, Capitales et géo...</p>
        </a>
    </div>
</section>

<section class="bg-[#11151C]/75 border border-white/35 rounded-md px-4 py-2 flex flex-col gap-1">
     <div class="flex flex-row gap-2"> <img src="../assets/images/employees.png" alt="" class="w-3 h-3">
        <h2 class="orbitron text-[8px] text-[#F9C80E]">Participants</h2>
    </div>
    <a href="#"
    class="block bg-[#00FFE7]/20 border border-[#00FFE7] rounded-md px-4 py-1 text-center font-semibold hover:bg-[#00FFE7]/30 transition">

    <!-- <span class="text-white font-bold">
        <?= $participant['pseudo'] ?>
    </span>: -->
    <span class="text-[#00FFE7]">
        ✔ Participant prêt
    </span>

</a>

<a href="#"
    class="block bg-[#00FFE7]/20 border border-[#00FFE7] rounded-md px-4 py-1 text-center font-semibold hover:bg-[#00FFE7]/30 transition">

    <!-- <span class="text-white font-bold">
        <?= $participant['pseudo'] ?>
    </span>: -->
    <span class="text-[#00FFE7]">
        ✔ Participant prêt
    </span>

</a>

<a href="#"
    class="block bg-[#00FFE7]/20 border border-[#00FFE7] rounded-md px-4 py-1 text-center font-semibold hover:bg-[#00FFE7]/30 transition">

    <!-- <span class="text-white font-bold">
        <?= $participant['pseudo'] ?>
    </span>: -->
    <span class="text-[#00FFE7]">
        ✔ Participant prêt
    </span>

</a>

<a href="#"
    class="block bg-[#00FFE7]/20 border border-[#00FFE7] rounded-md px-4 py-1 text-center font-semibold hover:bg-[#00FFE7]/30 transition">
    <!-- 
    <span class="text-white font-bold">
        <?= $participant['pseudo'] ?>
    </span>: -->
    <span class="text-[#00FFE7]">
        ✔ Participant prêt
    </span>

</a>

</section>

<div class="flex justify-center"><a href=""
   class="inline-flex items-center gap-2 bg-[#271033]/95 border border-white/35 rounded-md px-4 py-2 text-white w-fit hover:bg-[#271033] transition">

    <img class="w-6 h-6" src="../assets/images/fusee.png" alt="">

    <p class="orbitron">Lancez la partie !</p>
</a>
</div>

<p class="text-[10px] Montserrat text-center px-3">Choisis un thème • Clique sur chaque joueur pour le mettre prêt</p>


<?php require_once "../_partials/_footer.php" ?>

</html>