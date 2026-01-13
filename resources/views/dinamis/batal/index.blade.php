@extends('layout.main')
@section('title', 'Kerjaan Batal')

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="m-0 p-0"><strong>Kerjaan Batal</strong></p>
        </div>
        <div class="card-body">
            {{-- create tambah kerjaan --}}
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Kerjaan</th>
                        <th>Deskripsi</th>
                        <th>Deadline</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Status Pembayaran</th>
                        <th>Source Code</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($batal as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->deadline }}</td>
                            <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-warning">{{ $item->status_pengerjaan }}</span>
                            </td>
                            <td>
                                @if ($item->status_pembayaran == 'Lunas')
                                    <button type="button" class="badge bg-success border-0" data-bs-toggle="modal"
                                        data-bs-target="#modalBukti{{ $item->id }}">
                                        {{ $item->status_pembayaran }} <i class="fas fa-image"></i>
                                    </button>

                                    <!-- Modal Bukti Pembayaran -->
                                    <div class="modal fade" id="modalBukti{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="modalBuktiLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalBuktiLabel{{ $item->id }}">Bukti
                                                        Pembayaran</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset($item->bukti_pembayaran) }}"
                                                        class="img-fluid rounded" alt="Bukti Pembayaran">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="badge bg-danger">{{ $item->status_pembayaran }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->source_code)
                                    <a href="{{ $item->source_code }}" target="_blank"
                                        class="btn btn-sm btn-primary">Lihat</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $item->id }}">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                                <a href="{{ route('admin.kerjaan.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm text-white">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.kerjaan.destroy', $item->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>

                                <!-- Detail Modal -->
                                <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail
                                                    Pekerjaan #{{ $item->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Nama Pemesan:</strong> {{ $item->user->name }}</p>
                                                        <p><strong>Judul:</strong> {{ $item->judul }}</p>
                                                        <p><strong>Deskripsi:</strong> {{ $item->deskripsi }}</p>
                                                        <p><strong>Deadline:</strong> {{ $item->deadline }}</p>
                                                        <p><strong>Harga:</strong>
                                                            Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Status Pengerjaan:</strong> <span
                                                                class="badge bg-warning">{{ $item->status_pengerjaan }}</span>
                                                        </p>
                                                        <p><strong>Status Pembayaran:</strong>
                                                            @if ($item->status_pembayaran == 'Lunas')
                                                                <span
                                                                    class="badge bg-success">{{ $item->status_pembayaran }}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-danger">{{ $item->status_pembayaran }}</span>
                                                            @endif
                                                        </p>
                                                        @if ($item->bukti_pembayaran)
                                                            <p><strong>Bukti Pembayaran:</strong> <a
                                                                    href="{{ asset($item->bukti_pembayaran) }}"
                                                                    target="_blank">Lihat Bukti</a></p>
                                                        @endif
                                                        @if ($item->source_code)
                                                            <p><strong>Source Code:</strong> <a
                                                                    href="{{ $item->source_code }}"
                                                                    target="_blank">{{ $item->source_code }}</a></p>
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
