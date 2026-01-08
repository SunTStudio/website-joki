@extends('layout.main')
@section('title', 'Pekerjaan Dibatalkan')

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="m-0 p-0"><strong>Data Pekerjaan Dibatalkan</strong></p>
        </div>
        <div class="card-body">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($batal as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_pemesan }}</td>
                            <td>{{ $item->produk->nama }}</td>
                            <td>Rp{{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-danger">{{ $item->status }}</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $item->id }}">
                                    <i class="fas fa-eye"></i> Detail
                                </button>

                                <!-- Detail Modal -->
                                <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail
                                                    Pesanan #{{ $item->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Nama Pemesan:</strong> {{ $item->nama_pemesan }}</p>
                                                        <p><strong>Email:</strong> {{ $item->email_pemesan }}</p>
                                                        <p><strong>No. HP:</strong> {{ $item->nohp_pemesan }}</p>
                                                        <p><strong>Produk:</strong> {{ $item->produk->nama }}</p>
                                                        <p><strong>Harga:</strong>
                                                            Rp{{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                                                        <p><strong>Estimasi:</strong> {{ $item->produk->estimasi }}</p>
                                                        <p><strong>Status:</strong> <span
                                                                class="badge bg-danger">{{ $item->status }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Pesan:</strong></p>
                                                        <p>{{ $item->pesan_pemesan }}</p>
                                                        @if ($item->file_pemesan)
                                                            <p><strong>File Pendukung:</strong> <a
                                                                    href="{{ asset('storage/' . $item->file_pemesan) }}"
                                                                    target="_blank">{{ $item->file_pemesan }}</a></p>
                                                        @endif
                                                    </div>
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
