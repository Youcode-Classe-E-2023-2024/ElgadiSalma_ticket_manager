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
    <script src="../../js/main.js"></script>
    <style>
         select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            border: 0 !important;
            background: #f4fffe;
            background-image: none;
            flex: 1;
            padding: 0 .5em;
            color: rgb(65, 62, 69);
            cursor: pointer;
            font-size: 1em;
            font-family: 'Open Sans', sans-serif;
        }

        select::-ms-expand {
            display: none;
        }

        .select {
            position: relative;
            display: flex;
            width: 20em;
            height: 3em;
            line-height: 3;
            background: #5c6664;
            overflow: hidden;
            border-radius: .35em;
            border: 1px solid black;
        }

        option {
            text-align: center;
        }

        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            right: 0;
            padding: 0 1em;
            background: #f4fffe;
            /* border-bottom: 1px solid black; */

            cursor: pointer;
            pointer-events: none;
            transition: .25s all ease;
        }

        .select:hover::after {
            color: #00b9a8;}
    </style>
</head>

<body class="bg-indigo-200 lg:flex">

    <?php require_once "../../view/include/navbar.php"; ?>

    <div class="lg:w-full lg:ml-64 px-6 py-8 flex flex-col ">

        <h1 class="text-4xl text-purple-500 py-4 text-center font-bold">Tous les tickets</h1>

        <form id="filterForm" method="GET" class="relative mt-6 max-w-2xl py-8 text-gray-900 mx-auto flex flex-col gap-3	">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>

            <input class="w-full border border-black rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" type="text" id="searchInput" placeholder="Search">
            <div class="flex gap-3">
                <div class="select">
                <select name="priorite" id="priorite">
                    <option value="all" selected>Priorite</option>
                    <?php include_once '../../controller/Ticket/add_ticket.php';?>
                    <option value="normal" <?php echo ($priorite == 'normal') ? 'selected' : ''; ?>>Normal</option>
                    <option value="urgent" <?php echo ($priorite == 'urgent') ? 'selected' : ''; ?>>Urgent</option>
                </select>
            </div>

            <div class="select">
                <select name="statut" id="statut">
                    <option value="all" selected>Statut</option>
                    <option value="To Do" <?php echo ($statut == 'To Do') ? 'selected' : ''; ?>>To Do</option>
                    <option value="Doing" <?php echo ($statut == 'Doing') ? 'selected' : ''; ?>>Doing</option>
                    <option value="Done" <?php echo ($statut == 'Done') ? 'selected' : ''; ?>>Done</option>
                </select>
            </div>
            

            <div class="select">
            <select name="assignedTo" id="assignedTo">
            <?php include_once '../../controller/Ticket/filter_tickets.php';?>
                <option value="all" <?php echo ($assignedTo == 'all') ? 'selected' : ''; ?>>All</option>
                <option value="me" <?php echo ($assignedTo == 'me') ? 'selected' : ''; ?>>Me</option>
</select>
            </div>
            </div>
        </form>

        <a href="./description.php">
            <div class="container m-auto px-6 text-gray-500 md:px-12 flex flex-wrap	 xl:px-0">
        <div class="mx-auto grid gap-6 md:w-3/4 lg:w-full lg:grid-cols-3">
        <div id="ticketContainer">
        </div>     
       </div>
        </div>


        </a>
    </div>
</body>

</html>
