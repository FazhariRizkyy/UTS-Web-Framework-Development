<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('FASILITAS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div>DATA FASILITAS</div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-5">
                    {{-- FORM ADD MEMBER --}}
                    <div class="w-full bg-gray-100 rounded-xl p-4 ">
                        <div class="mb-5">
                            INPUT DATA FASILITAS
                        </div>
                        <form action="{{ route('fasilitas.store') }}" method="post">
                            @csrf
                            <div class="mb-5">
                                <label for="nama_fasilitas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA
                                    FASILITAS</label>
                                <input name="nama_fasilitas" type="text" id="nama_fasilitas"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="mb-5">
                                <label for="deskripsi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DESKRIPSI</label>
                                <input name="deskripsi" type="text" id="deskripsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="mb-5">
                                <label for="status_tersedia"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">STATUS</label>
                                <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500""
                                    name="status_tersedia" data-placeholder="Pilih Status" id="status_tersedia">
                                    <option value="">Pilih...</option>
                                    <option value="TERSEDIA">TERSEDIA</option>
                                    <option value="TIDAK TERSEDIA">TIDAK TERSEDIA</option>
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
                                            NAMA DESTINASI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            DESKRIPSI
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
                                    @foreach ($fasilitas as $key => $f)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $fasilitas->perPage() * ($fasilitas->currentPage() - 1) + $key + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $f->nama_fasilitas }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $f->deskripsi }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $f->status_tersedia }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <button type="button" data-id="{{ $f->id }}" data-modal-target="sourceModal"
                                                    data-nama_fasilitas="{{ $f->nama_fasilitas }}" data-deskripsi="{{ $f->deskripsi }}"
                                                    data-status_tersedia="{{ $f->status_tersedia }}" onclick="editSourceModal(this)"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                    Edit
                                                </button>
                                                <button
                                                    onclick="return memberDelete('{{ $f->id }}','{{ $f->nama_fasilitas }}', '{{ $f->deskripsi }}', '{{ $f->status_tersedia }}')"
                                                    class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $fasilitas->links() }}
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
                            <label for="nama_fasilitas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NAMA
                                FASILITAS</label>
                            <input name="nama_fasilitas" type="text" id="nama_fasilitas_edit"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-5">
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DESKRIPSI</label>
                            <input name="deskripsi" type="text" id="deskripsi_edit"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-5">
                            <label for="status_tersedia"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">STATUS</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500""
                                name="status_tersedia" data-placeholder="Pilih Status" id="status_tersedia_edit">
                                <option value="">Pilih...</option>
                                <option value="TERSEDIA">TERSEDIA</option>
                                <option value="TIDAK TERSEDIA">TIDAK TERSEDIA</option>
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
    window.editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const fasilitas = button.dataset.fasilitas;
        const nama_fasilitas = button.dataset.nama_fasilitas;
        const deskripsi = button.dataset.deskripsi;
        const status_tersedia = button.dataset.status_tersedia;
        let url = "{{ route('fasilitas.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE FASILITAS ${fasilitas}`;

        document.getElementById('nama_fasilitas_edit').value = nama_fasilitas;
        document.getElementById('deskripsi_edit').value = deskripsi;
        document.getElementById('status_tersedia_edit').value = status_tersedia;

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
    };

    window.sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let member = document.getElementById(modalTarget);
        member.classList.toggle('hidden');
    };

    const memberDelete = async (id, fasilitas) => {
        swal({
            title: "Konfirmasi",
            text: `Apakah anda yakin untuk menghapus FASILITAS ${fasilitas} ?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then(async (willDelete) => {
            if (willDelete) {
                try {
                    await axios.post(`/fasilitas/${id}`, {
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