document.addEventListener('DOMContentLoaded', function () {
    var ticketData;

    var prioriteSelect = document.getElementById('priorite');
    var statutSelect = document.getElementById('statut');
    var searchInput = document.getElementById('searchInput');

    prioriteSelect.addEventListener('change', fetchDataAndDisplay);
    statutSelect.addEventListener('change', fetchDataAndDisplay);
    searchInput.addEventListener('keyup', Search);

    fetchDataAndDisplay();

    function fetchDataAndDisplay() {
        var priorite = prioriteSelect.value;
        var statut = statutSelect.value;

        console.log('Fetching data  - Priorite:', priorite, 'Statut:', statut);

        fetch(`../../controller/Ticket/filter_tickets.php?priorite=${priorite}&statut=${statut}`)
            .then(response => response.json())
            .then(tickets => {
                ticketData = tickets;
                displayData(tickets);
            })
            .catch(error => console.error('Error', error));
    }

    function Search() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const filteredTickets = ticketData.filter(ticket => ticket.titre.toLowerCase().includes(searchTerm));
        displayData(filteredTickets);
    }

    function displayData(tickets) {
        console.log('Displaying data:', tickets);

        const rows = tickets.map((ticket) => {
            return (
                `<div class="container m-auto px-6 text-gray-500 md:px-12 flex flex-wrap xl:px-0">
                    <div class="mx-auto grid gap-6 md:w-3/4 lg:w-full lg:grid-cols-3">
                        <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
                            <div class="mb-12 space-y-4">
                                <h3 class="text-2xl font-semibold text-purple-900">UX ${ticket.titre}</h3>
                                <p class="mb-6">${ticket.description}</p>
                                <a href="#" class="block font-medium text-purple-600">Know more</a>
                            </div>
                            <img src="https://tailus.io/sources/blocks/end-image/preview/images/ux-design.svg" class="w-2/3 ml-auto" alt="illustration" loading="lazy" width="900" height="600">
                        </div>
                    </div>
                </div>`
            );
        });

        document.getElementById('ticketContainer').innerHTML = rows.join('');
    }
});