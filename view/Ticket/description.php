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
        <div class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-2xl mx-auto border border-white bg-white text-center">
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
                <h3 class="font-black text-gray-800 md:text-3xl text-xl"><?php echo $ticket['titre']; ?></h3>
                <p class="md:text-lg text-gray-500 text-base"><?php echo $ticket['description']; ?></p>
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
                </form>
            </div>
        </div>
    </div>
</body>
</html>
