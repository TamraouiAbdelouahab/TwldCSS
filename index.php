<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TailwindCss</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>
<style>
    form>button:hover svg
    {
        fill:white;
    }
    .LogOut:hover svg{
        fill:none;
        stroke: white;
    }
    @import url('https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap');
      body{
        font-family: "Source Code Pro", monospace;
      }
</style>
<body class="p-2.5 h-screen" style="box-sizing:border-box;">
    <div class="flex  h-full">
        <div class="w-1\6  pb-5 h-full rounded-2xl fixed">
            <form class="px-4 py-5 shadow-2xl rounded-2xl h-full " method="post"> 
                <button type="submit" class="px-3 py-3 rounded-xl w-full flex gap-3 hover:shadow-inner hover:bg-blue-500 hover:text-white
                <?= (!isset($_POST['CurrentBriefs']))?"text-white bg-blue-500":"" ?>"
                name="AllBriefs">
                    <div>
                        <svg width="24" height="24" 
                        <?= (!isset($_POST['CurrentBriefs']))?"fill=\"white\"":"fill=\"#2A78FF\"" ?>
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 12C0 8.8174 1.26428 5.76516 3.51472 3.51472C5.76516 1.26428 8.8174 0 12 0V12H24C24 15.1826 22.7357 18.2348 20.4853 20.4853C18.2348 22.7357 15.1826 24 12 24C8.8174 24 5.76516 22.7357 3.51472 20.4853C1.26428 18.2348 0 15.1826 0 12Z"/>
                            <path d="M15 0.377991C17.0754 0.915686 18.9693 1.99866 20.4853 3.51467C22.0013 5.03068 23.0843 6.92455 23.622 8.99999H15V0.377991Z" />
                        </svg>
                    </div>
                    <div>
                        <strong>
                            All briefs
                        </strong>
                    </div>
                </button>
                <br>
                <button type="submit" class="px-3 py-3  rounded-xl  w-full flex gap-3 hover:shadow-inner hover:bg-blue-500 hover:text-white
                <?= (isset($_POST['CurrentBriefs']))?"text-white bg-blue-500":"" ?>"
                name="CurrentBriefs">
                    <div>
                        <svg width="24" height="24" 
                        <?= (isset($_POST['CurrentBriefs']))?"fill=\"white\"":"fill=\"#2A78FF\"" ?>
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 0C5.37288 0 0 5.37288 0 12C0 18.6271 5.37288 24 12 24C18.6271 24 24 18.6271 24 12C24 5.37288 18.6271 0 12 0ZM17.5385 13.8462H12C11.7552 13.8462 11.5204 13.7489 11.3473 13.5758C11.1742 13.4027 11.0769 13.1679 11.0769 12.9231V4.61538C11.0769 4.37057 11.1742 4.13578 11.3473 3.96267C11.5204 3.78956 11.7552 3.69231 12 3.69231C12.2448 3.69231 12.4796 3.78956 12.6527 3.96267C12.8258 4.13578 12.9231 4.37057 12.9231 4.61538V12H17.5385C17.7833 12 18.0181 12.0973 18.1912 12.2704C18.3643 12.4435 18.4615 12.6783 18.4615 12.9231C18.4615 13.1679 18.3643 13.4027 18.1912 13.5758C18.0181 13.7489 17.7833 13.8462 17.5385 13.8462Z" />
                        </svg>  
                    </div>
                    <div>
                        <strong>
                            Current Briefs
                        </strong>
                    </div>
                </button>
                <br>
                <hr class="text-red">
                <br>
                <button type="submit" class="LogOut px-3 py-3  rounded-xl  w-full flex gap-3 hover:shadow-inner hover:bg-blue-500 hover:text-white"
                name="LogOut">
                    <div>
                        <svg width="22" height="22" stroke="#2A78FF" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 11H1M16 11L11 16M16 11L11 6M14.75 1H17.25C18.2446 1 19.1984 1.39509 19.9017 2.09835C20.6049 2.80161 21 3.75544 21 4.75V17.25C21 18.2446 20.6049 19.1984 19.9017 19.9017C19.1984 20.6049 18.2446 21 17.25 21H14.75"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div>
                        <strong>
                            Log out
                        </strong>
                    </div>
                </button>
            </form>
        </div>
        <?php
            if(!isset($_POST['CurrentBriefs'])){
        ?>
        <div class="w-4/5 ml-60 flex flex-wrap gap-4">
            <?php
                $Connexion = new PDO('mysql:host=localhost;dbname=bp15', "root", "A20002024");
                $StatementRealiser = $Connexion->prepare("select * from realiser inner join brief 
                using(id_brief)
                where id_apprenant = 1");
                $StatementRealiser->execute();
                $Realisers = $StatementRealiser->fetchAll(PDO::FETCH_OBJ);
                foreach($Realisers as $Realiser)
                {
                    $StatementCompetences = $Connexion->prepare("select * from concerne inner join competence using(id_competence)
                    where  id_brief = $Realiser->ID_BRIEF");
                    $StatementCompetences->execute();
                    $Competences = $StatementCompetences->fetchAll(PDO::FETCH_OBJ);
                    require "Card1.php";
                }                     
            ?>
        </div>
        <?php
            } else {
        ?>
        <div class="w-4/5 ml-60 pt-12 flex">
            <div class="h-full w-1/2">
                <img src="ClassImage.png" alt="" class="w-100">
                <br>
                <p class="text-xl font-bold">Competence:</p>
                <br>
                <div class="flex  flex-wrap gap-7">
                    <p class="rounded-full border border-gray-700 p-2 cursor-default w-1/4 text-center">jjkdjadak</p>
                    <p class="rounded-full border border-gray-700 p-2 cursor-default w-1/4 text-center">jjkdjadak</p>
                    <p class="rounded-full border border-gray-700 p-2 cursor-default w-1/4 text-center">jjkdjadak</p>
                    <p class="rounded-full border border-gray-700 p-2 cursor-default w-1/4 text-center">jjkdjadak</p>
                    <p class="rounded-full border border-gray-700 p-2 cursor-default w-1/4 text-center">jjkdjadak</p>
                </div>
            </div>
            <div class="h-full w-1/2 p-5">
                <p class="text-3xl font-semibold text-center">Gestion des briefs</p>
                <div class="flex flex-wrap justify-end">
                    <p class="rounded-lg  p-1 pe-3 ps-3 bg-gray-200 cursor-pointer text-center">To do</p>
                </div>
                <br>
                <div>
                    <small class="text-blue-500">Start date:</small>
                    <p class='text-2xl '>Monday 07 2024</p>
                </div>
                <div>
                    <small class="text-blue-500">End date:</small>
                    <p class='text-2xl'>Monday 07 2024</p>
                </div>
                <br>
                <div class="flex gap-3 ">
                    <p class='text-2xl'>attachment:</p>
                    <button>
                        <svg width="51" height="39" viewBox="0 0 51 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.1448 22.3124L26.2846 23.8012L25.1513 24.6688L24.0133 23.8075L25.1448 22.3124ZM23.2301 7.9739C23.2273 6.93837 24.0644 6.09658 25.1 6.09372C26.1355 6.09085 26.9773 6.92799 26.9801 7.96352L23.2301 7.9739ZM36.7313 15.8035L26.2846 23.8012L24.005 20.8236L34.4517 12.8259L36.7313 15.8035ZM24.0133 23.8075L13.5225 15.8677L15.7856 12.8776L26.2763 20.8173L24.0133 23.8075ZM23.2698 22.3176L23.2301 7.9739L26.9801 7.96352L27.0198 22.3072L23.2698 22.3176Z" fill="#222222"/>
                            <path d="M10.4688 25.5L10.4688 27.0937C10.4687 28.8542 12.3436 30.2812 14.6563 30.2812L35.5938 30.2813C37.9065 30.2813 39.7813 28.8542 39.7813 27.0938V25.5" stroke="#222222" stroke-width="3.75"/>
                        </svg>
                    </button>
                </div>
                <br>
                <div>
                    <button type="button" id="Etat">
                        <svg width="30" height="30" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="23" stroke="black" stroke-width="4"/>
                            <rect x="12" y="23" width="26" height="4" rx="1" fill="black"/>
                            <rect x="27" y="12" width="26" height="4" rx="1" transform="rotate(90 27 12)" fill="black"/>
                        </svg>
                    </button>
                    <form class="flex flex-col gap-5">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="LienInput">Lien:</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="LienInput" type="text" placeholder="Lien">
                            </div>
                            <div class="self-end">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    valider
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            } 
        ?>
    </div>
</body>
</html>