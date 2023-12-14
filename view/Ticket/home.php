<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>avito</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
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
<body class="bg-indigo-200	 lg:flex">
    
    <?php require_once "../include/navbar.php"; ?>
    
    <div class="lg:w-full lg:ml-64 px-6 py-8 flex flex-col	">

    <h1 class="text-4xl text-purple-500 py-4 text-center font-bold">Tous les tickets</h1>

    <div class="relative mt-6 max-w-lg py-8 text-gray-900 mx-auto flex gap-x-3">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>

        <input class="w-full border border-black rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" type="text" id="searchInput" placeholder="Search">        
    

    <div class="select">
        <select name="category" id="category">
            <option value="all" selected>Category</option>
                <option value="">zz</option>
        </select>
    </div>
</div>
    <div class="container m-auto px-6 text-gray-500 md:px-12 flex flex-wrap	 xl:px-0">
        <div class="mx-auto grid gap-6 md:w-3/4 lg:w-full lg:grid-cols-3">
            <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
                <div class="mb-12 space-y-4">
                    <h3 class="text-2xl font-semibold text-purple-900">Graphic Design</h3>
                    <p class="mb-6">Obcaecati, quam? Eligendi, nulla numquam natus laborum porro at cum, consectetur ullam tempora ipsa iste officia sed officiis! Incidunt ea animi officiis.</p>
                    <a href="#" class="block font-medium text-purple-600">Know more</a>
                </div>
                <img src="https://tailus.io/sources/blocks/end-image/preview/images/graphic.svg" class="w-2/3 ml-auto -mb-12" alt="illustration" loading="lazy" width="900" height="600">
            </div>
            <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
                <div class="mb-12 space-y-4">
                    <h3 class="text-2xl font-semibold text-purple-900">UI Design</h3>
                    <p class="mb-6">Obcaecati, quam? Eligendi, nulla numquam natus laborum porro at cum, consectetur ullam tempora ipsa iste officia sed officiis! Incidunt ea animi officiis.</p>
                    <a href="#" class="block font-medium text-purple-600">Know more</a>
                </div>
                <img src="https://tailus.io/sources/blocks/end-image/preview/images/ui-design.svg" class="w-2/3 ml-auto" alt="illustration" loading="lazy" width="900" height="600">
            </div>
            <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
                <div class="mb-12 space-y-4">
                    <h3 class="text-2xl font-semibold text-purple-900">UI Design</h3>
                    <p class="mb-6">Obcaecati, quam? Eligendi, nulla numquam natus laborum porro at cum, consectetur ullam tempora ipsa iste officia sed officiis! Incidunt ea animi officiis.</p>
                    <a href="#" class="block font-medium text-purple-600">Know more</a>
                </div>
                <img src="https://tailus.io/sources/blocks/end-image/preview/images/ui-design.svg" class="w-2/3 ml-auto" alt="illustration" loading="lazy" width="900" height="600">
            </div>
            <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
                <div class="mb-12 space-y-4">
                    <h3 class="text-2xl font-semibold text-purple-900">UX Design</h3>
                    <p class="mb-6">Obcaecati, quam? Eligendi, nulla numquam natus laborum porro at cum, consectetur ullam tempora ipsa iste officia sed officiis! Incidunt ea animi officiis.</p>
                    <a href="#" class="block font-medium text-purple-600">Know more</a>
                </div>
                <img src="https://tailus.io/sources/blocks/end-image/preview/images/ux-design.svg" class="w-2/3 ml-auto " alt="illustration" loading="lazy" width="900" height="600">
            </div>
        </div>
    </div>

 </div>
<!-- </div> -->
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuButton = document.getElementById('menu-button');
        var sidebar = document.getElementById('sidebar');

        menuButton.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('lg:block');
        });
    });
</script>

</html>