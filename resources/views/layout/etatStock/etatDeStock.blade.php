@extends('layout.layout')

@section('title', 'état de Stock')

@section('content')
    <div class="border-2 rounded-lg shadow-lg bg-white">
        <div class="relative overflow-x-auto shadow-md  p-3 ">
            <div class=" px-4 ">
                <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600 ">état de Stock</h1>
            </div>
            <div class="w-full flex items-center justify-between p-3 mb-5">
                <div class="flex items-center">
                    <form action="#" method="get">
                        <div class="relative mr-3 ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="search" id="searchInput" name="rechercher"
                                class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg  w-64 focus:ring-blue-500 focus:border-blue-500 outline-none "
                                placeholder="Rechercher produit">
                        </div>
                    </form>
                    <div class="mr-2">
                        <select id="year-filter"
                            class=" block p-2 text-sm text-gray-500 border border-gray-300 rounded-lg  w-40 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            <option hidden value="">Choisir l'année</option>
                            <option value="">toutes les années</option>
                        </select>
                    </div>
                    <select id="quantity-alert-filter"
                        class="block p-2 text-sm text-gray-500 border border-gray-300 rounded-lg  w-40 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        <option hidden value="">Choisir la quantité alerte</option>
                        <option value="">toutes </option>
                    </select>
                </div>
                <div>
                    <a href="#" id="dropdownActionButton" onclick="exportTable()">
                        <button
                            class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg md:text-sm md:py-3 md:px-2 md:w-56  w-30 text-xs py-2 px-1 "
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            <span class="px-2">Tableau d'exportation</span>
                        </button>
                    </a>
                </div>
            </div>
            <table id="my-table" class="w-full text-sm text-left text-gray-500 border mb-5 bg-dark">
                <thead class="text-xs text-gray-100 uppercase bg-gray-500 px-4">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            Nom Produit
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Ref
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Date D'Entrée
                        </th>
                        <th scope="col" class="px-4 py-3">
                            QUANTITé initial
                        </th>
                        <th scope="col" class="px-4 py-3">
                            quantité retirée
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Quantité disponible
                        </th>
                        <th scope="col" class="px-4 py-3">
                            QUANTITÉ ALERT
                        </th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $item)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap ">
                                <div class="text-base font-semibold">
                                    {{ $item->nom_p }}
                                </div>
                            </th>
                            <td class="px-4 py-3">
                                {{ $item->ref_p }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->date_enter }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->qte_d }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->qte_d - $item->qte_p }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $item->qte_p }}
                            </td>
                            @if ($item->qte_p === 0)
                                <td class="flex px-4 py-3 text-red-700">
                                    <h5 class="px-3 py-2 bg-red-600 text-white rounded-full ">
                                        Épuisé
                                    </h5>
                                </td>
                            @elseif ($item->qte_p < 5)
                                <td class="flex px-4 py-3 text-yellow-700">
                                    <h5 class="px-3 py-2 bg-yellow-600 text-white rounded-full ">
                                        Qte limité
                                    </h5>
                                </td>
                            @else
                                <td class="flex px-4 py-3 text-green-700">
                                    <h5 class="px-3 py-2 bg-green-600 text-white rounded-full ">
                                        Disponible
                                    </h5>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const searchInput = document.getElementById("searchInput");
        const yearFilter = document.getElementById('year-filter');
        const quantityAlertFilter = document.getElementById('quantity-alert-filter');
        const tableRows = document.querySelectorAll('#my-table tbody tr');
        const yearsSet = new Set(); 
        const quantityAlertsSet = new Set(); 
        tableRows.forEach(function(row) {
            const dateCell = row.querySelector('td:nth-child(3)');
            const rowYear = dateCell.textContent.trim().split('-')[0];
            yearsSet.add(rowYear);

            const quantityAlertCell = row.querySelector('td:nth-child(7)');
            const quantityAlert = quantityAlertCell.textContent.trim();
            quantityAlertsSet.add(quantityAlert);
        });
        yearsSet.forEach(function(year) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearFilter.appendChild(option);
        });
        quantityAlertsSet.forEach(function(quantityAlert) {
            const option = document.createElement('option');
            option.value = quantityAlert;
            option.textContent = quantityAlert;
            quantityAlertFilter.appendChild(option);
        });
        searchInput.addEventListener("keyup", applyFilters);
        yearFilter.addEventListener('change', applyFilters);
        quantityAlertFilter.addEventListener('change', applyFilters);
        function applyFilters() {
            const searchValue = searchInput.value.toLowerCase();
            const selectedYear = yearFilter.value;
            const selectedQuantityAlert = quantityAlertFilter.value;

            tableRows.forEach(function(row) {
                const rowData = row.textContent.toLowerCase();
                const dateCell = row.querySelector('td:nth-child(3)');
                const rowYear = dateCell.textContent.trim().split('-')[0];
                const quantityAlertCell = row.querySelector('td:nth-child(7)');
                const rowQuantityAlert = quantityAlertCell.textContent.trim();

                if (
                    (rowData.includes(searchValue) || searchValue === '') &&
                    (rowYear === selectedYear || selectedYear === '') &&
                    (rowQuantityAlert === selectedQuantityAlert || selectedQuantityAlert === '')
                ) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
    <script>
        function exportTable() {
            var table = document.getElementById("my-table");
            var filteredRows = Array.from(table.querySelectorAll(
                "tbody tr:not([style='display: none;'])"));
            var filteredTable = document.createElement("table");
            var tableHead = table.querySelector("thead").cloneNode(true);
            filteredTable.appendChild(tableHead);
            var tbody = document.createElement("tbody");
            filteredRows.forEach(function(row) {
                tbody.appendChild(row.cloneNode(true));
            });
            filteredTable.appendChild(tbody);
            var workbook = XLSX.utils.table_to_book(filteredTable);
            var wbout = XLSX.write(workbook, {
                bookType: "xls",
                type: "array"
            });
            var blob = new Blob([wbout], {
                type: "application/vnd.ms-excel"
            });
            var anchor = document.createElement("a");
            const year = yearFilter.value;
            const currentDate = new Date();
            const fileName = year ? `Etat de stock_${year}.xls` :
                `Etat de stock_${currentDate.getFullYear()}-${currentDate.getMonth() + 1}-${currentDate.getDate()}.xls`;
            anchor.href = window.URL.createObjectURL(blob);
            anchor.download = fileName;
            anchor.click();
        }
    </script>
@endsection
