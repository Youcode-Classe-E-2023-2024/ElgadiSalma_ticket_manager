<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php require_once "../../view/include/navbar.php"; ?>
<div class="bg-indigo-200 h-screen	">


  <div class="px-9 mx-9 flex justify-center">
    <div class="max-w-xs cursor-pointer rounded-lg bg-white p-2 shadow duration-150 hover:scale-105 hover:shadow-md">
      <img class="w-full rounded-lg object-cover object-center" src="https://images.unsplash.com/photo-1580477371194-4593e3c7c6cf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="product" />
      <div>
        <div class="my-6 flex items-center justify-between px-4">
          <p class="font-bold text-gray-500">Product Name</p>
          <p class="rounded-full bg-blue-500 px-2 py-0.5 text-xs font-semibold text-white">$120</p>
        </div>
        <div class="my-4 flex items-center justify-between px-4">
          <p class="text-sm font-semibold text-gray-500">First option</p>
          <p class="rounded-full bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600">23</p>
        </div>
        <div class="my-4 flex items-center justify-between px-4">
          <p class="text-sm font-semibold text-gray-500">Second option</p>
          <p class="rounded-full bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600">7</p>
        </div>
        <div class="my-4 flex items-center justify-between px-4">
          <p class="text-sm font-semibold text-gray-500">Third option</p>
          <p class="rounded-full bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600">1</p>
        </div>
        <div class="my-4 flex items-center justify-between px-4">
          <p class="text-sm font-semibold text-gray-500">Fourth option</p>
          <p class="rounded-full bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600">23</p>
        </div>
    </div>
  </div>
</div>
</div>

</body>
</html>