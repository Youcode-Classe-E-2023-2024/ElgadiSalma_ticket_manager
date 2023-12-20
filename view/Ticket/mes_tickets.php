<?php
session_start();

if(!isset($_SESSION['id_user'])){
    header("location:../User/connect.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>avito</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="../../js/mine.js"></script>
</head>
<style>
    .container{
            display:flex;
            flex-wrap:wrap;
            flex-direction:row;
            justify-content:space-between;
            width:100%;
            margin: 0 auto;
            gap: 25px;
        }
        .container p{
            font-size: 11px;
            padding: 10px 15px;
            /* white-space: ; */
        }
</style>
<body class="bg-indigo-200 lg:flex">

    <?php require_once "../../view/include/navbar.php"; ?>

    <div class="lg:w-full lg:ml-64 px-6 py-8 flex flex-col ">

        <h1 class="text-4xl text-purple-500 py-4 text-center font-bold">Tous mes tickets</h1>

        <?require_once "../../controller/Ticket/mes_tickets.php";?>
        

        <div id="ticketContainer" class="container">
       </div>

    </div>
</body>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuButton = document.getElementById('menu-button');
        var sidebar = document.getElementById('sidebar');

        menuButton.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('lg:block');
        });
    });
</script> -->

</html>