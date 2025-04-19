<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('RIWAYAT TRANSAKSI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex items-center justify-between">
                    <div>DATA RIWAYAT TRANSAKSI</div>
                    <div>
                        <a href="#" onclick="return functionAdd()"
                            class="bg-sky-600 p-2 hover:bg-sky-400 text-white rounded-xl">Add</a>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ID USER
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        ID PAKET WISATA
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TANGGAL TRANSAKSI
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        JUMLAH TIKET
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TOTAL HARGA
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        METODE PEMBAYARAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        STATUS TRANSAKSI
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($riwayat as $r)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $r->id_user }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->id_paket_wisata }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->tanggal_transaksi }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->jumlah_tiket}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->total_harga }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->metode_pembayaran }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $r->status_transaksi }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50" onclick="sourceModalClose()"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose()"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-6">
                        <div class="mb-5">
                            <label for="id_user"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID USER</label>
                            <input type="text" id="id_user" name="id_user"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="id_paket_wisata"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID PAKET WISATA</label>
                            <input type="text" id="id_paket_wisata" name="id_paket_wisata"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_transaksi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TANGGAL TRANSAKSI</label>
                            <input type="date" id="tanggal_transaksi" name="tanggal_transaksi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="jumlah_tiket"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JUMLAH TIKET</label>
                            <input type="number" id="jumlah_tiket" name="jumlah_tiket"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="total_harga"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TOTAL HARGA</label>
                            <input type="number" id="total_harga" name="total_harga"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="metode_pembayaran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">METODE PEMBAYARAN</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="metode_pembayaran" data-placeholder="Pilih Metode Pembayaran">
                                <option value="">Pilih...</option>
                                <option value="Kartu Kredit">Kartu Kredit</option>
                                <option value="Transfer Ban">Transfer Bank</option>
                                <option value="E-Wallet">E-Wallet</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="status_transaksi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">STATUS TRANSAKSI</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="status_transaksi" data-placeholder="Pilih Status Transaksi">
                                <option value="">Pilih...</option>
                                <option value="Pending">Pending</option>
                                <option value="Sukses">Sukses</option>
                                <option value="Gagal">Gagal</option>
                                <option value="Dibatalkan">Dibatalkan</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" onclick="sourceModalClose()"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const functionAdd = () => {
            const formModal = document.getElementById('formSourceModal');
            const modal = document.getElementById('sourceModal');

            // Set form action URL
            let url = "{{ route('riwayat.store') }}";
            document.getElementById('title_source').innerText = "Tambah Riwayat Transaksi";
            formModal.setAttribute('action', url);

            // Display the modal
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Ensure CSRF token is added once
            if (!formModal.querySelector('input[name="_token"]')) {
                let csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                formModal.appendChild(csrfToken);
            }
        }
    </script>
</x-app-layout>