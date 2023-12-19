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
    <style>
        .edit{
            background-color: beige;
            display: flex;
            flex-direction: column;
            width: 25rem;
            height: 30rem;
            border-radius: 10px;
            justify-content: center;
            align-items: center;
            align-self: center;
            }
    </style>
</head>
<body class=" ">
<?php require_once "../../view/include/navbar.php"; ?>
<div class="flex flex-col justify-center h-screen bg-indigo-200 ">
    <div class="edit">
    
    <form action="">
<div class="flex w-72 flex-col gap-6">
<form action="../../controller/Ticket/edit.php" method="post">
        <?php
        require_once "../../controller/Ticket/read_ticket.php";
        foreach ($tickets as $ticket):
        ?>
        <h3 class="text-gray-800 md:text-3xl text-xl"><?php echo $ticket['titre']; ?></h3>
        <p class="md:text-xl text-gray-500 text-base"><?php echo $ticket['description']; ?></p>
        <p class="md:text-xl text-gray-500 text-base"><ins>Created at :</ins> <?php echo $ticket['date']; ?></p>
        <p class="md:text-xl text-gray-500 text-base"><ins>Priorite :</ins> <?php echo $ticket['priorite']; ?></p>
        <div class="select">
        <select name="statut" id="statut">
        

            <option selected disabled>Statut</option>
            <option value=<?php echo ($statut == 'To Do') ? 'selected' : ''; ?>>To Do</option>
            <option value=<?php echo ($statut == 'Doing') ? 'selected' : ''; ?>>Doing</option>
            <option value=<?php echo ($statut == 'Done') ? 'selected' : ''; ?>>Done</option>
        </select>
        </div>
        
        <?php endforeach; ?>
        <input type="submit" placeholder="Save" class="py-2 px-4 bg-blue-700 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
</div>
</form>
    
</div>
</div>

</body>
</html>
