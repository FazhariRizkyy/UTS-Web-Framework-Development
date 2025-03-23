<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PAKET') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div>DATA PAKET</div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-5">
                    {{-- FORM ADD MEMBER --}}
                    <div class="w-80 bg-gray-100 rounded-xl p-4 ">
                        <div class="mb-5">
                            INPUT DATA PAKET
                        </div>
                        <form action="{{ route('paket.store') }}" method="post">
                            @csrf
                            <div class="mb-5">
                                <label for="nama_paket"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA
                                    PAKET</label>
                                <input name="nama_paket" type="text" id="nama_paket"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="mb-5">
                                <label for="deskripsi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DESKRIPSI</label>
                                <input name="deskripsi" type="text" id="deskripsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="mb-5">
                                <label for="harga"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">HARGA</label>
                                <input name="harga" type="number" id="harga"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Harga disini..." required>
                            </div>
                            <div class="mb-5">
                                <label for="durasi_hari"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DURASI/HARI</label>
                                <input name="durasi_hari" type="number" id="durasi_hari"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Masukan Durasi Hari...." required>
                            </div>
                            <div class="mb-5">
                                <label for="status_aktif"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">STATUS</label>
                                <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500""
                                    name="status_aktif" data-placeholder="Pilih Status" id="status_aktif">
                                    <option value="">Pilih...</option>
                                    <option value="AKTIF">AKTIF</option>
                                    <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SIMPAN</button>
                        </form>
                    </div>
                    {{-- TABLE MEMBER --}}
                    <div class="w-full">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NAMA PAKET
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            DESKRIPSI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            HARGA
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            DURASI/HARI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            STATUS
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($paket as $key => $p)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $paket->perPage() * ($paket->currentPage() - 1) + $key + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $p->nama_paket }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $p->deskripsi }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $p->harga }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $p->durasi_hari }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $p->status_aktif }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <button type="button" data-id="{{ $p->id }}"
                                                    data-modal-target="sourceModal" data-nama_paket="{{ $p->nama_paket }}"
                                                    data-deskripsi="{{ $p->deskripsi }}" data-harga="{{ $p->harga }}" 
                                                    data-durasi_hari="{{ $p->durasi_hari }}" data-status_aktif="{{ $p->status_aktif }}"
                                                    onclick="editSourceModal(this)"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                    Edit
                                                </button>
                                                <button
                                                    onclick="return memberDelete('{{ $p->id }}','{{ $p->nama_paket }}', '{{ $p->deskripsi }}', '{{ $p->harga }}', '{{ $p->durasi_hari }}', '{{ $p->status_aktif }}')"
                                                    class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $paket->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="mb-5">
                            <label for="nama_paket"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA
                                PAKET</label>
                            <input name="nama_paket" type="text" id="nama_paket_edit"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-5">
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DESKRIPSI</label>
                            <input name="deskripsi" type="text" id="deskripsi_edit"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-5">
                            <label for="harga"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">HARGA</label>
                            <input name="harga" type="number" id="harga_edit"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Harga disini..." required>
                        </div>
                        <div class="mb-5">
                            <label for="durasi_hari"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DURASI/HARI</label>
                            <input name="durasi_hari" type="number" id="durasi_hari_edit"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan Durasi Hari...." required>
                        </div>
                        <div class="mb-5">
                            <label for="status_aktif"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">STATUS</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500""
                                name="status_aktif" data-placeholder="Pilih Status" id="status_aktif_edit">
                                <option value="">Pilih...</option>
                                <option value="AKTIF">AKTIF</option>
                                <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

@if (Session::has('message'))
    <script>
        swal("Message", "{{ Session::get('message') }}", "success", {
            button: "oke",
            timer: 3000,
        });
    </script>
@elseif (Session::has('message_update'))
    <script>
        swal("Message", "{{ Session::get('message_update') }}", "success", {
            button: "oke",
            timer: 3000,
        });
    </script>
@endif

<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const paket = button.dataset.paket;
        const nama_paket = button.dataset.nama_paket;
        const deskripsi = button.dataset.deskripsi;
        const harga = button.dataset.harga;
        const durasi_hari = button.dataset.durasi_hari;
        const status_aktif = button.dataset.status_aktif;
        let url = "{{ route('paket.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE PAKET ${paket}`;

        document.getElementById('nama_paket_edit').value = nama_paket;
        document.getElementById('deskripsi_edit').value = deskripsi;
        document.getElementById('harga_edit').value = harga;
        document.getElementById('durasi_hari_edit').value = durasi_hari;
        document.getElementById('status_aktif_edit').value = status_aktif;

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let member = document.getElementById(modalTarget);
        member.classList.toggle('hidden');
    }

    const memberDelete = async (id, paket) => {
        swal({
            title: "Konfirmasi",
            text: `Apakah anda yakin untuk menghapus MEMBER ${paket} ?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then(async (willDelete) => {
            if (willDelete) {
                try {
                    await axios.post(`/paket/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    });
                    // Menampilkan pesan sukses setelah penghapusan
                    swal("Message", "Data berhasil dihapus!", "success", {
                        button: "oke",
                    }).then(() => {
                        location.reload(); // Reload halaman setelah menutup modal
                    });
                } catch (error) {
                    // Menampilkan pesan gagal jika terjadi kesalahan
                    swal("Message", "Data gagal dihapus!", "error", {
                        button: "oke",
                    });
                }
            }
        });
    }
</script>
