<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header("location:../User/connect.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php require_once "../../view/include/navbar.php"; ?>
<div class="flex flex-col justify-center h-screen bg-indigo-200 ">
    
        <div class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-2xl mx-auto border border-white bg-white ">
            <div class="w-full md:w-1/3 bg-white grid place-items-center">
                <img src="https://tailus.io/sources/blocks/end-image/preview/images/ux-design.svg" class="w-2/3 ml-auto" alt="illustration" loading="lazy" width="900" height="600">
            </div>
            <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                <div class="flex gap-5 item-center">
                    <p class="text-gray-500 font-medium hidden md:block">Vacations</p>
                    <p class="text-gray-500 font-medium hidden md:block">Vacations</p>
                </div>
            <form action="" method="get">
                <?php
                require_once "../../controller/Ticket/read_ticket.php";
                foreach ($tickets as $ticket):
                ?>
                <h3 class=" text-gray-800 md:text-3xl text-xl"><?php echo $ticket['titre']; ?></h3>
                <p class="md:text-xl text-gray-500 text-base"><?php echo $ticket['description']; ?></p>
                <p class="md:text-xl text-gray-500 text-base"><ins>Statut :</ins> <?php echo $ticket['etat']; ?></p>
                <p class="md:text-xl text-gray-500 text-base"><ins>Created at :</ins> <?php echo $ticket['date']; ?></p>
                <p class="md:text-xl text-gray-500 text-base"><ins>Priorite :</ins> <?php echo $ticket['priorite']; ?></p>
                
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                </div>
                <?php endforeach; ?>

                <div class="my-8 flex-col">
                    <div class="flex justify-between">
                        <h1><ins>Commentaires :</ins></h1>
                        <!-- <button class="py-1 px-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Ajouter commentaire</button> -->
                    </div>
                    <?php
                require_once "../../controller/Ticket/read_ticket.php";
                foreach ($commentaires as $commentaire):
                ?>
                    <p><?php echo $commentaire['text']; ?></p>
                    <p class="md:text-sm"><?php echo $commentaire['date_com']; ?></p>
                <?php endforeach; ?>

                <form action="../../controller/Ticket/add_commentaire.php" method="post">
                <input type="hidden" name="id" value="<?php echo $ticket['id_ticket']; ?>">
                    <div class="flex gap-2">

                <div class="relative h-10 w-full min-w-[200px]">
                <input
                class="peer h-full w-full rounded-[7px] border border-blue-gray-200 bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-pink-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                placeholder=" "
                />
                <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-pink-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-pink-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-pink-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                Ajouter Commentaire
                </label>
                </div>
                <button type="submit" name="submit" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Save</button></div>
                </form>
                </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
