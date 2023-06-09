@extends('layout.layout')
@section('title', 'Agents')
@section('content')
    <div class="border-2 rounded-lg shadow-lg bg-white">
        <div class="relative overflow-x-auto shadow-md  p-3 ">
            <div class=" px-4 ">
                <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600 "> Liste Agents</h1>
            </div>
            <div class="w-full flex items-center justify-between p-3 mb-5">
                <form action="#" method="get">
                    <div class="relative  ">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd">
                                </path>
                            </svg>
                        </div>
                        <input type="search" id="searchInput" name="rechercher" placeholder="Rechercher un Agent"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg  w-64 focus:ring-blue-500 focus:border-blue-500 outline-none ">
                    </div>
                </form>
                <div>
                    <a href="{{ url('agents\create') }}">
                        <button
                            class="inline-flex items-center text-gray-100 bg-green-700 focus:ring-4 font-medium rounded-lg text-sm py-3 px-2 "
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round"d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="px-2">Ajouter Agent</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
                <table id="my-table" class="w-full text-sm text-left text-gray-500 border  bg-dark ">
                    <thead class="text-xs text-gray-100 uppercase bg-gray-500 px-4 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Agent nom
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Agent Prenom
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Agent Grade
                            </th>
                            <th scope="col" class="px-6 py-3">
                                action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agents as $item)
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap ">
                                    <div class="text-base font-semibold">
                                        {{ $item->nom_agent }}
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->prenom_agent }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->grade_agent }}
                                </td>
                                <td class="px-6 py-3 flex items-center ">
                                    <a href=" {{ url('/agents/' . $item->id_agent) }} " title="View Agent">
                                        <button type="button"
                                            class="text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-500 focus:ring-1 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-1.5 py-1 mr-2 text-center dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </a>
                                    <a href=" {{ url('/agents/' . $item->id_agent . '/edit') }} " title="View Agent">
                                        <button type="button"
                                            class=" text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-1 focus:outline-none focus:ring-green-500 font-medium rounded-lg text-sm px-1.5 py-1 text-center mr-2  dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </button>
                                    </a>
                                    <form method="post" action=" {{ url('/agents/' . $item->id_agent) }} ">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" title="Delete Agent" onclick=" return confirm('confirm delete ? ') " type="button"
                                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-1 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm px-1.5 py-1 text-center   dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var searchInput = document.getElementById("searchInput");
        searchInput.addEventListener("keyup", function() {
            var searchValue = this.value.toLowerCase();
            var rows = document.querySelectorAll("#my-table tbody tr");
            var rows = document.querySelectorAll("#my-table tbody tr");

            rows.forEach(function(row) {
                var rowData = row.textContent.toLowerCase();

                if (rowData.includes(searchValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
@endsection
