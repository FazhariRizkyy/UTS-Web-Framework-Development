<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('LAPORAN TRANSAKSI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white dark:text-gray-100">
                    <div class="p-4 bg-blue-700 mb-2 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                PRINT DATA LAPORAN TRANSAKSI
                            </div>
                        </div>
                    </div>
                    <div>
                        <form class="w-full mx-auto my-5" method="POST" action="{{ route('laporan.store') }}">
                            @csrf
                            <div class="flex gap-5 my-5">
                                <div class="mb-5 w-full">
                                    <label for="dari"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dari</label>
                                    <input type="date" id="dari" name="dari"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="sampai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sampai</label>
                                    <input type="date" id="sampai" name="sampai"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        />
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <button type="submit" class=" bg-emerald-800 hover:bg-emerald-400 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm w-full sm:w-auto px-12 py-2.5 text-center dark:bg-emerald-500 dark:hover:bg-emerald-500 dark:focus:ring-emerald-500">Print</button>
                                <button type="reset" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-12 py-2.5 text-center dark:bg-red-00 dark:hover:bg-red-500 dark:focus:ring-red-500">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>