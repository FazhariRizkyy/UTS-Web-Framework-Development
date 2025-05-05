<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('TRANSAKSI') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex items-center justify-between">
                    <div>DATA TRANSAKSI</div>
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
                                    <th scope="col" class="px-4 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        KODE PAKET
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        KODE TRANSAKSI
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
                                        TANGGAL PEMBAYARAN
                                    </th>
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
                                            {{ $t->id_paket }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->kode_transaksi }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->jumlah }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->metode_pembayaran }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->status_pembayaran }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $t->tanggal_pembayaran }}
                                        </td>
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
                            <label for="id_paket"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PAKET</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="id_paket" name="id_paket" data-placeholder="Pilih Paket">
                                <option value="">Pilih...</option>
                                @foreach ($paket as $o)
                                    <option value="{{ $o->id }}">
                                        {{ $o->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="jumlah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JUMLAH</label>
                            <input name="jumlah" type="text" id="jumlah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-5">
                            <label for="metode_pembayaran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">METODE PEMBAYARAN</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="metode_pembayaran" data-placeholder="Pilih Metode Pembayaran">
                                <option value="">Pilih...</option>
                                <option value="TRANSFER">TRANSFER</option>
                                <option value="E-WALLET">E-WALLET</option>
                                <option value="CASH">CASH</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="status_pembayaran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">STATUS PEMBAYARAN</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="status_pembayaran" data-placeholder="Pilih Status Pemabayaran">
                                <option value="">Pilih...</option>
                                <option value="DIBAYAR">DIBAYAR</option>
                                <option value="GAGAL">GAGAL</option>
                                <option value="PENDING">PENDING</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="tanggal_pembayaran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TANGGAL PEMBAYARAN</label>
                            <input name="tanggal_pembayaran" type="date" id="tanggal_pembayaran"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
            let url = "{{ route('transaksi.store') }}";
            document.getElementById('title_source').innerText = "Add Jurusan";
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

        const sourceModalClose = () => {
            document.getElementById('sourceModalEdit').classList.add('hidden');
            document.getElementById('sourceModal').classList.add('hidden');
        }

    </script>
</x-app-layout>
