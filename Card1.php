<div class=" border border-gray-300 rounded-lg w-80">
    <div class="relative">
        <div class="flex flex-wrap gap-2 absolute end-0 m-2">
            <p class="rounded-lg  p-1 pe-3 ps-3 
            <?= ($Realiser->ETAT=="To do")?"bg-gray-200"
            :(($Realiser->ETAT=="Doing")?"bg-green-200"
            :(($Realiser->ETAT=="Done")?"bg-blue-200":"bg-red-200")) ?>
            ">
            <?= $Realiser->ETAT ?>
            </p>
        </div>
        <img class="rounded-t-lg" src="ClassImage.png" alt=""/>
    </div>
    <div class="p-5">
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900"><?= $Realiser->TITRE ?></h5>
        <small><?= $Realiser->TITRE ?></small>
        <br>
        <small class="text-gray-500">Link:<?= $Realiser->PIECE_JOINTE ?></small>
        <hr class="my-2">
        <p class="">competence</p>
        <br>
        <div class="flex  flex-wrap gap-7"> 
            <?php foreach($Competences as $Competence) : ?>   
            <p class="rounded-full border border-gray-700 p-2 cursor-default w-1/4 text-center"  title="<?= $Competence->DESCRIPTION?>"><?= $Competence->NOM?></p>
            <!-- <p class="rounded-full border border-gray-700 p-2">C2:HTML</p>
            <p class="rounded-full border border-gray-700 p-2">C3:CSS</p>
            <p class="rounded-full border border-gray-700 p-2">C4:JS</p>
            <p class="rounded-full border border-gray-700 p-2">C4:PHP</p>
            <p class="rounded-full border border-gray-700 p-2">C4:PHP</p> -->
            <?php endforeach ;?>
        </div>
        <br>
        <button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            View
        </button>
    </div>
</div>