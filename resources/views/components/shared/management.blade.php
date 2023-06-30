@props([
    'title' => '',
])
<div class="grid grid-cols-5 gap-10">
    <div class="relative">
        <div class="flex flex-col flex-grow px-4 bg-white rounded-lg bg-opacity-10">
            <nav class="flex-1 space-y-1 bg-white">
                <p class="px-4 pt-4 text-xs font-semibold text-main uppercase">
                    SALES
                </p>
                <ul>
                    <li>
                        <a class="{{ request()->routeIs('sales-transaction') ? 'bg-orange-50 text-main fill-main' : '' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 fill-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-orange-50 hover:scale-95 hover:text-main hover:fill-main"
                            href="{{ route('sales-transaction') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                <path
                                    d="M14 18V20L16 21V22H8L7.99639 21.0036L10 20V18H2.9918C2.44405 18 2 17.5511 2 16.9925V4.00748C2 3.45107 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44892 22 4.00748V16.9925C22 17.5489 21.5447 18 21.0082 18H14ZM4 5V14H20V5H4Z">
                                </path>
                            </svg>
                            <span class="ml-2">
                                Transaction
                            </span>
                        </a>
                        <a class="{{ request()->routeIs('sales-category') ? 'bg-orange-50 text-main fill-main' : '' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 fill-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-orange-50 hover:scale-95 hover:text-main hover:fill-main"
                            href="{{ route('sales-category') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                <path
                                    d="M11 19V9H4V19H11ZM11 7V4C11 3.44772 11.4477 3 12 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V8C2 7.44772 2.44772 7 3 7H11ZM13 5V19H20V5H13ZM5 16H10V18H5V16ZM14 16H19V18H14V16ZM14 13H19V15H14V13ZM14 10H19V12H14V10ZM5 13H10V15H5V13Z">
                                </path>
                            </svg>
                            <span class="ml-2">
                                Category
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
            <nav class="flex-1 space-y-1 bg-white">
                <p class="px-4 pt-4 text-xs font-semibold text-main uppercase">
                    EXPENSES
                </p>
                <ul>
                    <li>
                        <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 fill-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-orange-50 hover:scale-95 hover:text-main hover:fill-main"
                            href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                <path
                                    d="M14 18V20L16 21V22H8L7.99639 21.0036L10 20V18H2.9918C2.44405 18 2 17.5511 2 16.9925V4.00748C2 3.45107 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44892 22 4.00748V16.9925C22 17.5489 21.5447 18 21.0082 18H14ZM4 5V14H20V5H4Z">
                                </path>
                            </svg>
                            <span class="ml-2">
                                Transaction
                            </span>
                        </a>
                        <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 fill-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-orange-50 hover:scale-95 hover:text-main hover:fill-main"
                            href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                <path
                                    d="M11 19V9H4V19H11ZM11 7V4C11 3.44772 11.4477 3 12 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V8C2 7.44772 2.44772 7 3 7H11ZM13 5V19H20V5H13ZM5 16H10V18H5V16ZM14 16H19V18H14V16ZM14 13H19V15H14V13ZM14 10H19V12H14V10ZM5 13H10V15H5V13Z">
                                </path>
                            </svg>
                            <span class="ml-2">
                                Category
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="col-span-4 ">
        <div class="relative">
            <header class="font-bold text-main text-lg border-b">{{ $title }}</header>
            <div class="mt-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
