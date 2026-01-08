@extends('layout.main')
@section('title', 'Produk')

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="m-0 p-0"><strong>Produk</strong></p>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.produk.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Produk</a>
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $produk->nama }}</td>
                            <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td>{{ $produk->deskripsi }}</td>
                            {{-- asset img/produk/ --}}
                            <td>
                                <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal"
                                    data-bs-target="#modalGambar{{ $produk->id }}">
                                    <i class="fas fa-image"></i> Lihat Gambar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalGambar{{ $produk->id }}" tabindex="-1"
                                    aria-labelledby="modalLabel{{ $produk->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $produk->id }}">Gambar Produk:
                                                    {{ $produk->nama }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div class="mb-3">
                                                    <p class="fw-bold">Gambar Utama</p>
                                                    <img src="{{ asset( $produk->gambar) ?? '-' }}"
                                                        class="img-fluid rounded shadow-sm" alt="Utama"
                                                        style="max-height: 300px;">
                                                </div>
                                                <div class="row justify-content-center">
                                                    @if ($produk->gambar2)
                                                        <div class="col-md-6 mb-2">
                                                            <p class="fw-bold">Gambar Pendukung 1</p>
                                                            <img src="{{ asset( $produk->gambar2) ?? '-' }}"
                                                                class="img-fluid rounded shadow-sm" alt="Pendukung 1"
                                                                style="max-height: 200px;">
                                                        </div>
                                                    @endif
                                                    @if ($produk->gambar3)
                                                        <div class="col-md-6 mb-2">
                                                            <p class="fw-bold">Gambar Pendukung 2</p>
                                                            <img src="{{ asset( $produk->gambar3) ?? '-'  }}"
                                                                class="img-fluid rounded shadow-sm" alt="Pendukung 2"
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
                                <a href="{{ route('admin.produk.edit',$produk->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.produk.destroy',$produk->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
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
