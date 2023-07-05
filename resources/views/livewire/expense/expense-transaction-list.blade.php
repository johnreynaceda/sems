<div>
    <div>
        {{ $this->table }}
    </div>
    <x-modal wire:model.defer="view_transaction">
        <x-card title="ITEMIZED TRANSACTION">
            <div>
                <div class="border border-yellow-500 p-2 bg-gray-50 rounded-lg">
                    <header class="text-red-600 font-medium">Note:</header>
                    <p>{{ $note }}</p>
                </div>
                <table id="example" class="table-auto mt-5" style="width:100%">
                    <thead class="font-normal">
                        <tr>
                            <th class="border  text-left px-2 text-sm font-medium text-gray-700 py-2">
                                FEE NAME
                            </th>
                            <th class="border  text-left px-2 text-sm font-medium text-gray-700 py-2">
                                AMOUNT
                            </th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($transaction_data as $item)
                            <tr>
                                <td class="border text-gray-700 uppercase  px-3 py-1">
                                    {{ $item->expense_category->name }}
                                </td>
                                <td class="border text-gray-700 uppercase  px-3 py-1">
                                    &#8369;{{ number_format($item->amount, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat negative label="Close" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
