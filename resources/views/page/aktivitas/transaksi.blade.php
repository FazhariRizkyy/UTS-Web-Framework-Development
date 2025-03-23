<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('TRANSAKSI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-sky-800 p-4 rounded-xl mb-2 flex items-center justify-between ">
                        <div class="text-white">DATA TRANSAKSI</div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        KODE BOOKING
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        JUMLAH
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        METODE PEMBAYARAN
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        STATUS PEMBAYARAN
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TANGGAL PEMBAYARN
                                    </th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($transaksi as $key => $t)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $transaksi->perPage() * ($transaksi->currentPage() - 1) + $key + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $t->outlet->nama }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->kode_invoice }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->member->nama }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->tanggal }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->batas_waktu }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->tgl_bayar }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->biaya_tambahan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->diskon }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->pajak }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->status }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->dibayar }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->user->name }}
                                        </td>
                                        @can('role-A')
                                            <td class="px-6 py-4">
                                                <button type="button" data-id="{{ $t->id }}"
                                                    data-modal-target="sourceModal" data-tgl_bayar="{{ $t->tgl_bayar }}"
                                                    data-dibayar="{{ $t->dibayar }}" onclick="editSourceModal(this)"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                    Edit
                                                </button>
                                                <button
                                                    onclick="return transaksiDelete('{{ $t->id }}','{{ $t->outlet->nama }}')"
                                                    class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $transaksi->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>