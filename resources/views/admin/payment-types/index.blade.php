<x-layouts.admin title="Manajemen Tipe Pembayaran">

    {{-- Toast Success --}}
    @if (session('success'))
        <div class="toast toast-bottom toast-center z-50">
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        </div>

        <script>
            setTimeout(() => {
                document.querySelector('.toast')?.remove()
            }, 3000)
        </script>
    @endif

    <div class="container mx-auto p-10">
        <div class="flex mb-6">
            <h1 class="text-3xl font-semibold">Manajemen Tipe Pembayaran</h1>
            <a href="{{ route('admin.payment-types.create') }}" class="btn btn-primary ml-auto">
                Tambah Tipe Pembayaran
            </a>
        </div>

        <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tipe Pembayaran</th>
                        <th class="w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($paymentTypes as $index => $type)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $type->nama }}</td>
                            <td>
                                <a href="{{ route('admin.payment-types.edit', $type->id) }}"
                                   class="btn btn-sm btn-primary mr-2">
                                    Edit
                                </a>
                                <button
                                    class="btn btn-sm bg-red-500 text-white"
                                    onclick="openDeleteModal(this)"
                                    data-id="{{ $type->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                Belum ada tipe pembayaran.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Delete Modal --}}
    <dialog id="delete_modal" class="modal">
        <form method="POST" class="modal-box">
            @csrf
            @method('DELETE')

            <h3 class="text-lg font-bold mb-4">Hapus Tipe Pembayaran</h3>
            <p>Apakah Anda yakin ingin menghapus tipe pembayaran ini?</p>

            <div class="modal-action">
                <button class="btn btn-primary" type="submit">Hapus</button>
                <button class="btn" type="button" onclick="delete_modal.close()">Batal</button>
            </div>
        </form>
    </dialog>

    <script>
        function openDeleteModal(button) {
            const id = button.dataset.id
            const form = document.querySelector('#delete_modal form')

            // set action sesuai resource
            form.action = `/admin/payment-types/${id}`

            delete_modal.showModal()
        }
    </script>

</x-layouts.admin>
