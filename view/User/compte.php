<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
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
<body class="bg-indigo-200">
<?php require_once "../../view/include/navbar.php"; ?>

<div class="flex flex-col justify-center h-screen ">
    
        <div class="edit ">
          <div class="w-full md:w-1/2 grid place-items-center">
            <img src="../../image/utilisateur-anonyme.png" alt="">
          </div>
            
                
            <div class="w-full md:w-2/3 flex flex-col space-y-2 p-3">
              <?php
              require_once "../../controller/User/profil_c.php";
              foreach ($info_users as $user):
              ?>

                <h3 class=" text-gray-800 md:text-3xl text-xl">Mes informations</h3>
                <p class="md:text-xl text-gray-500 text-base"><ins>User Name </ins>: <?php echo $user['username']; ?></p>
                <p class="md:text-xl text-gray-500 text-base"><ins>Email </ins>: <?php echo $user['email']; ?></p>

                <?php endforeach; ?>
            </div>
        </div>
</div>

</body>
</html>