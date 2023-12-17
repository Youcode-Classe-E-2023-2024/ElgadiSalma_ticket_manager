<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Avito</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>

</head>

<?php require_once "../../view/include/navbar.php"; ?>
    <body>

        <div class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center" >
        <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
        <form action="../../controller/Ticket/add_ticket.php" method="post">
            <div>
                <input type="text" name="titre" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-8"  placeholder="Titre " required/>
            </div>

            <div>
                <input type="text" name="description" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 "  placeholder="Description"required/>
            </div>

            <div class="">
                <select name="priorite" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-8" required>
                    <option selected disabled>Priorité</option>
                    <?php include_once '../../controller/Ticket/add_ticket.php';?>
                    <option value="normal" <?php echo ($priorite == 'normal') ? 'selected' : ''; ?>>Normal</option>
                    <option value="urgent" <?php echo ($priorite == 'urgent') ? 'selected' : ''; ?>>Urgent</option>
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
                            <label><input type="checkbox" name="selected_users[]" multiple value="<?php echo $user['id_user']; ?>" class="mr-2"><?php echo $user['username']; ?></label>
                        </div>
                    <?php
                    }
                } else {
                    echo "utilisateurs indisponibles";
                }
                ?>
            </div>
            </div>

            <button type="button" onclick="toggleDropdown()">^_^</button>

        <div class="flex justify-center my-6">
            <button type="submit" class="rounded-full p-3 w-full sm:w-56 bg-gradient-to-r from-sky-600 to-teal-300 text-white text-lg font-semibold">
                Créer Ticket
            </button>
        </div>

        </form>   
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