<div x-data="{ report: @entangle('report') }">
    <div class="relative   flex space-x-2   items-end">
        <x-native-select label="Report" wire:model="report" class="w-96">
            <option selected hidden>Select an option</option>
            <option value="1">Sales Report</option>
            <option value="2">Expenses Report</option>
        </x-native-select>
        <x-button.circle icon="refresh" spinner orange />
    </div>
    <div class="mt-10">
        <div class="" x-show="report==1" x-cloak>
            <div class="flex justify-between items-center border-b pb-2">
                <x-button @click="printOut($refs.printContainer.outerHTML);" label="PRINT REPORT" dark
                    class="font-bold w-40" rounded icon="printer" />
                <div class="flex space-x-2">
                    <x-datetime-picker without-time placeholder="Date From" wire:model="date_from" />
                    <x-datetime-picker without-time placeholder="Date To" wire:model="date_to" />
                </div>
            </div>
            <div class="mt-10">
                <div x-ref="printContainer">
                    <div class="flex space-x-2 items-center">
                        <img src="{{ asset('images/LOGO.png') }}" class="h-16" alt="">
                        <div>
                            <h1 class="font-bold text-xl text-main">ROCKFORT EDUCATIONAL INSTITUTE INCORPORATED</h1>
                            <h1 class="leading-3 text-gray-600">National Highway, Brgy. San Pablo, Tacurong City S.K
                            </h1>
                        </div>
                    </div>
                    <div class="mt-5 text-center ">
                        <h1 class="font-bold text-xl text-gray-700">SALES REPORT</h1>
                        @if ($date_from && $date_to)
                            <h1 class="text-sm text-gray-500">(
                                {{ \Carbon\Carbon::parse($date_from)->format('F d, Y') }}
                                {{ $date_from != $date_to ? '- ' . \Carbon\Carbon::parse($date_to)->format('F d, Y') : '' }}
                                )</h1>
                        @endif
                    </div>
                    <div class="mt-10">
                        <table id="example" class="table-auto mt-5" style="width:100%">
                            <thead class="font-normal">
                                <tr>

                                </tr>
                            </thead>
                            <tbody class="">
                                @forelse ($reports as $report)
                                    <tr>
                                        <td colspan="4" class="border-2 text-gray-700  px-3 py-1">
                                            <h1>
                                                <span>OR #: </span>
                                                <span class="font-bold">{{ $report->or_number }}</span>
                                            </h1>
                                            <h1> <span>NAME: </span>
                                                <span class="font-bold">{{ $report->name }}</span>
                                            </h1>
                                        </td>
                                    </tr>
                                    @foreach ($report->sales_category_transactions as $sale)
                                        <tr>
                                            <td class=" text-gray-700  px-3 py-1">
                                            </td>
                                            <td class=" text-gray-700  px-3 py-1">
                                            </td>
                                            <td class="border-2  text-gray-700  px-3 py-1">
                                                {{ $sale->sale_category->name }}
                                            </td>
                                            <td class="border-2  text-gray-700  px-3 py-1">
                                                &#8369;{{ number_format($sale->amount, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class=""></td>
                                        <td class=""></td>
                                        <td class="text-right pr-1 text-gray-700">
                                            TOTAL:
                                        </td>
                                        <td class="border-2  text-gray-700 font-bold  px-3 py-1">
                                            &#8369;{{ number_format($report->total_amount, 2) }}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                <tr>
                                    <td class=""></td>
                                    <td class=""></td>
                                    <td class="text-right pr-1 text-gray-700">
                                        GRAND TOTAL:
                                    </td>
                                    <td class="border-2  text-gray-700 font-bold  px-3 py-1">
                                        &#8369;{{ number_format($reports->sum('total_amount'), 2) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="" x-show="report==2" x-cloak>
            Expenses
        </div>
    </div>
</div>
