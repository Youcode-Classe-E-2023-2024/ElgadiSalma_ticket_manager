<!-- component -->
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avito</title>
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>

        <?php require_once "../include/navbar.php"; ?>

        
            <div class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center" >
                <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12">
                Registration Form 
            </div>
            <form action="">
            <div>
                 <input type="text" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500"  placeholder="Name "/>
            </div>
             <div>
                 <input type="email" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-8"  placeholder="Eamil Adress "/>
            </div>
             <div>
            <input type="text" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mb-8"  placeholder="Country "/>
            </div>
             <div>
            <input type="phone" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mb-8"  placeholder="Phone "/>
            </div>
            <div class="">
                <input type="password" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mb-8"  placeholder="Password " />
            </div>
            
            <div class="flex justify-center my-6">
                <button class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                    Create Account
                </button>
            </div>
            
        </form>
            
        </div>
    </div>
</div>
    </body>
</html>