<div>
    <header class="font-bold text-gray-600">SALES ITEMIZED TRANSACTION</header>
    <div class="mt-2">
        <table id="example" class="table-auto" style="width:100%">
            <thead class="font-normal">
                <tr>

                </tr>
            </thead>
            <tbody class="">
                @foreach ($sales as $sale)
                    <tr>
                        <td class="border-2 text-gray-700  px-3 py-1">
                            {{ $sale->sale_category->name }}
                        </td>
                        <td class="border-2 text-gray-700  px-3 py-1">
                            &#8369; {{ number_format($sale->amount, 2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <header class="font-bold mt-10 text-gray-600">EXPENSES ITEMIZED TRANSACTION</header>
    <div class="mt-2">
        <table id="example" class="table-auto" style="width:100%">
            <thead class="font-normal">
                <tr>

                </tr>
            </thead>
            <tbody class="">
                @foreach ($expenses as $expense)
                    <tr>
                        <td class="border-2 text-gray-700  px-3 py-1">
                            {{ $expense->expense_category->name }}
                        </td>
                        <td class="border-2 text-gray-700  px-3 py-1">
                            &#8369; {{ number_format($expense->amount, 2) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
