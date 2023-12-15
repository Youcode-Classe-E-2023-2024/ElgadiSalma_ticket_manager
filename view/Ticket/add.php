<!-- component -->
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avito</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    </head>

<?php require_once "../../view/include/navbar.php"; ?>
    <body>

        

        
            <div class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center" >
                <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
            <!-- <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12">
                Registration Form 
            </div> -->
            <form action="">
            <div>
                 <input type="text" name="titre" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-8"  placeholder="Titre "/>
            </div>

             <div>
                 <input type="text" name="description" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 "  placeholder="Description"/>
            </div>
            <div class="">

            <select name="Priorite"  class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-8">
                <option selected disabled>priorite</option>
                <option <?php echo ($priorite['priorite'] == 'normal') ? 'selected' : ''; ?>>Normal</option>
                <option <?php echo ($priorite['priorite'] == 'urgent') ? 'selected' : ''; ?>>Urgent</option>
            </select>
            </div>

            <div class="relative inline-block">
            <input type="text" id="searchInput" placeholder="Search" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500">
            <div class="absolute max-h-40 w-full z-10 mt-2 bg-white border border-gray-300 rounded-md shadow-lg overflow-y-auto hidden"  id="dropdownContent">
                <?php
                if (!empty($users)) {
                    foreach ($users as $user) {
                    ?>
                        <div class="p-2">
                            <label><input type="checkbox" value="<?php echo $user['id_user']; ?>" class="mr-2"><?php echo $user['username']; ?></label>
                        </div>
                    <?php
                    }
                } else {
                    echo "Aucun utilisateur disponible."; // Message à afficher si $users est vide
                }
                ?>
            </div>
            </div>
            <button type="button" onclick="toggleDropdown()"><></button>

            
            <div class="flex justify-center my-6">
                <button class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                    Créer Ticket
                </button>
            </div>
            
        </form>
            
        </div>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const dropdownContent = document.getElementById('dropdownContent');
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    searchInput.addEventListener('input', filterOptions);

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelection);
    });

    function filterOptions() {
        const searchTerm = searchInput.value.toLowerCase();

        Array.from(dropdownContent.children).forEach(option => {
            const optionText = option.textContent.toLowerCase();
            option.style.display = optionText.includes(searchTerm) ? 'block' : 'none';
        });
    }

    function updateSelection() {
        const selectedOptions = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        // Display the selected options (customize based on your needs)
        console.log('Selected Options:', selectedOptions);
    }
    function toggleDropdown() {
        var dropdown = document.getElementById('dropdownContent');
        dropdown.classList.toggle('hidden');
    }
</script>

    </body>

    
</html>