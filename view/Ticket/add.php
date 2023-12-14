<!-- component -->
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avito</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    </head>

    <?php require_once "../include/navbar.php"; ?>
    <body>

        

        
            <div class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center" >
                <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
            <!-- <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12">
                Registration Form 
            </div> -->
            <form action="">
            <div>
                 <input type="text" name="titre" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500"  placeholder="Titre "/>
            </div>

             <div>
                 <input type="text" name="description" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-8"  placeholder="Description"/>
            </div>

             <div>
             <select class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-8" name="category" id="category">
            <option selected disabled>Statut</option>
            <option value="">zz</option>
            </select>
             </div>

             <div>
             <input type="text" id="employeeSearch" oninput="filterOptions()" placeholder="Rechercher un employé">
            <select name="" id="assigneesSelect" multiple>
                <!-- Options d'assignation -->
                <option value="john_doe">John Doe</option>
                <option value="jane_doe">Jane Doe</option>
                <option value="bob_smith">Bob Smith</option>
                <option value="john_doe">John Doe</option>
                <option value="jane_doe">Jane Doe</option>
                <option value="bob_smith">Bob Smith</option>
                <!-- Ajoutez ici d'autres options d'assignation -->
            </select>

             </div>
            
            <div class="flex justify-center my-6">
                <button class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                    Créer Ticket
                </button>
            </div>
            
        </form>
            
        </div>
    </div>
</div>
    </body>

    
</html>