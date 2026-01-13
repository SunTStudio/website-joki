@extends('layout.main')
@section('title', 'Portofolio')

@section('content')
    <div class="card">
        <div class="card-header">
            <p><strong>Portofolio</strong></p>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.portofolio.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Portofolio</a>
            {{-- datatables berisi judul	deskripsi	gambar	gambar2	gambar3	gambar4 --}}
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($portofolios as $portofolio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $portofolio->judul }}</td>
                            <td>{{ $portofolio->deskripsi }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal"
                                    data-bs-target="#modalGambar{{ $portofolio->id }}">
                                    <i class="fas fa-image"></i> Lihat Gambar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalGambar{{ $portofolio->id }}" tabindex="-1"
                                    aria-labelledby="modalLabel{{ $portofolio->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $portofolio->id }}">Gambar
                                                    Portofolio:
                                                    {{ $portofolio->judul }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div class="mb-3">
                                                    <p class="fw-bold">Gambar Utama</p>
                                                    <img src="{{ asset('image/'.$portofolio->gambar) ?? '-' }}"
                                                        class="img-fluid rounded shadow-sm" alt="Utama"
                                                        style="max-height: 300px;">
                                                </div>
                                                <div class="row justify-content-center">
                                                    @if ($portofolio->gambar2)
                                                        <div class="col-md-6 mb-2">
                                                            <p class="fw-bold">Gambar Pendukung 1</p>
                                                            <img src="{{ asset('image/'.$portofolio->gambar2) ?? '-' }}"
                                                                class="img-fluid rounded shadow-sm" alt="Pendukung 1"
                                                                style="max-height: 200px;">
                                                        </div>
                                                    @endif
                                                    @if ($portofolio->gambar3)
                                                        <div class="col-md-6 mb-2">
                                                            <p class="fw-bold">Gambar Pendukung 2</p>
                                                            <img src="{{ asset('image/'.$portofolio->gambar3) ?? '-' }}"
                                                                class="img-fluid rounded shadow-sm" alt="Pendukung 2"
                                                                style="max-height: 200px;">
                                                        </div>
                                                    @endif
                                                    @if ($portofolio->gambar4)
                                                        <div class="col-md-6 mb-2">
                                                            <p class="fw-bold">Gambar Pendukung 3</p>
                                                            <img src="{{ asset('image/'.$portofolio->gambar4) ?? '-' }}"
                                                                class="img-fluid rounded shadow-sm" alt="Pendukung 3"
                                                                style="max-height: 200px;">
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.portofolio.edit', $portofolio->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.portofolio.destroy', $portofolio->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                autoWidth: false,
                scrollX: true,
                columnDefs: [{
                    targets: 0,
                    className: 'dt-body-center'
                }]
            });
        });
    </script>
@endsection
