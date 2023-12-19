document.addEventListener('DOMContentLoaded', function () {
    fetchDataAndDisplay();

    function fetchDataAndDisplay() {
        fetch('../../controller/Ticket/mes_tickets.php')
            .then(response => response.json())
            .then(tickets => {
                displayData(tickets);
            })
            .catch(error => console.error('Error', error));
    }

    function displayData(tickets) {
        console.log('Displaying data:', tickets);

        const rows = tickets.map((ticket) => {
            return (
                `
                <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
                    <div class="mb-12 space-y-4">
                        <h3 class="text-2xl font-semibold text-purple-900">${ticket.titre}</h3>
                        <p class="mb-6 ">${ticket.description}</p>
                        <a href="./description.php?id=${ticket.id_ticket}" class="block font-medium text-purple-600">Know more</a>                    </div>
                    <img src="https://tailus.io/sources/blocks/end-image/preview/images/ux-design.svg" class="w-2/3 ml-auto" alt="illustration" loading="lazy" width="900" height="600">
                    <a href="#"class="block font-medium text-green-500">edit</a>
                    <a href="../../controller/Ticket/delete.php?id=${ticket.id_ticket}"class="block font-medium text-red-500">delete</a>
                </div>
                `
            );
        });

        document.getElementById('ticketContainer').innerHTML = rows.join('');
    }
});
