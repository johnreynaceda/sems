@section('title', 'Overview')
<x-master-layout>
    <header class="text-xl text-main font-bold">STATISTICAL OVERVIEW</header>
    <div class="grid grid-cols-2 gap-10 mt-5">
        <div>
            <div class="grid grid-cols-2 gap-4 relative">
                <div class="bg-white border rounded-lg p-3 px-4">
                    <div class="flex justify-between border-b pb-1 items-end">
                        <h1 class="font-bold text-lg text-gray-600">TODAY SALES</h1>
                        <button
                            class="bg-green-600 rounded-lg grid place-content-center p-2 fill-white hover:bg-green-800">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5">
                                <path
                                    d="M11 2.04947V13.0001H21.9506C21.4489 18.0534 17.1853 22.0001 12 22.0001C6.47715 22.0001 2 17.5229 2 12.0001C2 6.81475 5.94668 2.55119 11 2.04947ZM13 0.542969C18.5535 1.02133 22.9788 5.44662 23.4571 11.0001H13V0.542969Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-1">
                        <h1 class="text-3xl font-bold text-gray-600">
                            &#8369;{{ number_format(\App\Models\SalesTransaction::whereDate('dot', now())->pluck('total_amount')->sum(),2) }}
                        </h1>
                    </div>
                </div>
                <div class="bg-white border rounded-lg p-3 px-4">
                    <div class="flex justify-between border-b pb-1 items-end">
                        <h1 class="font-bold text-lg text-gray-600">TODAY EXPENSES</h1>
                        <button class="bg-red-600 rounded-lg grid place-content-center p-2 fill-white hover:bg-red-800">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5">
                                <path
                                    d="M11 2.04947V13.0001H21.9506C21.4489 18.0534 17.1853 22.0001 12 22.0001C6.47715 22.0001 2 17.5229 2 12.0001C2 6.81475 5.94668 2.55119 11 2.04947ZM13 0.542969C18.5535 1.02133 22.9788 5.44662 23.4571 11.0001H13V0.542969Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-1">
                        <h1 class="text-3xl font-bold text-gray-600">
                            &#8369;{{ number_format(\App\Models\SalesTransaction::whereDate('dot', now())->pluck('total_amount')->sum(),2) }}
                        </h1>
                    </div>
                </div>
                <div class="bg-white border rounded-lg p-3 px-4">
                    <div class="flex justify-between border-b pb-1 items-end">
                        <h1 class="font-bold text-lg text-gray-600">TOTAL SALES</h1>
                        <button
                            class="bg-green-600 rounded-lg grid place-content-center p-2 fill-white hover:bg-green-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5">
                                <path
                                    d="M2.85858 2.87756L15.4293 1.08175C15.7027 1.0427 15.9559 1.23265 15.995 1.50601C15.9983 1.52943 16 1.55306 16 1.57672V22.4237C16 22.6999 15.7761 22.9237 15.5 22.9237C15.4763 22.9237 15.4527 22.922 15.4293 22.9187L2.85858 21.1229C2.36593 21.0525 2 20.6306 2 20.1329V3.86751C2 3.36986 2.36593 2.94794 2.85858 2.87756ZM17 3.00022H21C21.5523 3.00022 22 3.44793 22 4.00022V20.0002C22 20.5525 21.5523 21.0002 21 21.0002H17V3.00022ZM10.2 12.0002L13 8.00022H10.6L9 10.2859L7.39999 8.00022H5L7.8 12.0002L5 16.0002H7.39999L9 13.7145L10.6 16.0002H13L10.2 12.0002Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-1">
                        <h1 class="text-3xl font-bold text-gray-600">
                            &#8369;{{ number_format(\App\Models\SalesTransaction::pluck('total_amount')->sum(), 2) }}
                        </h1>
                    </div>
                </div>
                <div class="bg-white border rounded-lg p-3 px-4">
                    <div class="flex justify-between border-b pb-1 items-end">
                        <h1 class="font-bold text-lg text-gray-600">TOTAL EXPENSES</h1>
                        <button class="bg-red-600 rounded-lg grid place-content-center p-2 fill-white hover:bg-red-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5">
                                <path
                                    d="M2.85858 2.87756L15.4293 1.08175C15.7027 1.0427 15.9559 1.23265 15.995 1.50601C15.9983 1.52943 16 1.55306 16 1.57672V22.4237C16 22.6999 15.7761 22.9237 15.5 22.9237C15.4763 22.9237 15.4527 22.922 15.4293 22.9187L2.85858 21.1229C2.36593 21.0525 2 20.6306 2 20.1329V3.86751C2 3.36986 2.36593 2.94794 2.85858 2.87756ZM17 3.00022H21C21.5523 3.00022 22 3.44793 22 4.00022V20.0002C22 20.5525 21.5523 21.0002 21 21.0002H17V3.00022ZM10.2 12.0002L13 8.00022H10.6L9 10.2859L7.39999 8.00022H5L7.8 12.0002L5 16.0002H7.39999L9 13.7145L10.6 16.0002H13L10.2 12.0002Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-1">
                        <h1 class="text-3xl font-bold text-gray-600">
                            &#8369;{{ number_format(\App\Models\ExpenseTransaction::pluck('total_amount')->sum(), 2) }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>

                <livewire:itemized-transaction />

            </div>
        </div>
    </div>
</x-master-layout>
