document.addEventListener('DOMContentLoaded', function() {
    var menuButton = document.getElementById('menu-button');
    var sidebar = document.getElementById('sidebar');

    menuButton.addEventListener('click', function() {
        sidebar.classList.toggle('hidden');
        sidebar.classList.toggle('lg:block');
    });
});