@extends('/layout.layout')
@section('title', "Informations sur l'agent")
@section('content')
    <div class="border-2 rounded-lg shadow-lg bg-white">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-3">
            <div class="flex items-center justify-center mb-5 ">
                <div class=" w-full p-3 ">
                    <div class=" px-4 ">
                        <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600">Informations sur l'agent</h1>
                    </div>
                    <div class="p-6 bg-white border border-gray-200 rounded-lg shadowdark:bg-gray-800 ">
                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 ">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nom</dt>
                                <dd class="text-lg font-semibold">{{ $agents->nom_agent }}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Prenom</dt>
                                <dd class="text-lg font-semibold">{{ $agents->prenom_agent }}</dd>
                            </div>
                            <div class="flex flex-col pt-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Grade</dt>
                                <dd class="text-lg font-semibold">{{ $agents->grade_agent }}</dd>
                            </div>
                        </dl>
                    </div>
                    <div class="px-6 py-3 flex justify-end">
                        <a href=" {{ url('/agents/' . $agents->id_agent . '/edit') }} " title="View Agent">
                            <button type="button"
                                class=" flex items-center text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-1 focus:outline-none focus:ring-green-500 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2  dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                <span class="p-2 ">
                                    Modifier
                                </span>
                            </button>
                        </a>
                        <form method="post" action=" {{ url('/agents/' . $agents->id_agent) }} ">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" title="Delete Agent" onclick=" return confirm('confirm delete ? ') "
                                type="button"
                                class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-1 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2   dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                <span class="p-2 ">
                                    Delete
                                </span>
                        </form>
                        <a href="{{ url('agents') }}">
                            <button type="button"
                                class="flex items-center text-blue-900 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-1 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2   dark:border-blue-800 dark:text-blue-800 dark:hover:text-white dark:hover:bg-blue-800 dark:focus:ring-blue-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 15l6-6m0 0l-6-6m6 6H9a6 6 0 000 12h3" />
                                </svg>
                                <span class="p-2 ">
                                    Précédent
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection