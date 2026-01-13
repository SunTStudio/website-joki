@extends('layout.main')
@section('title', 'Detail Kerjaan')
@section('style')
    <style>
        /* Timeline CSS */
        .timeline {
            list-style: none;
            padding: 0;
            position: relative;
            margin-bottom: 0;
        }

        .timeline:before {
            top: 0;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 2px;
            background-color: #eaecf4;
            left: 15px;
            margin-left: -1.5px;
        }

        .timeline-item {
            margin-bottom: 20px;
            position: relative;
        }

        .timeline-marker {
            position: absolute;
            background: #4e73df;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            border: 3px solid #fff;
            left: 7px;
            top: 5px;
            z-index: 1;
            box-shadow: 0 0 0 3px #eaecf4;
        }

        .timeline-content {
            margin-left: 40px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .modal-body img {
            height: 60vh;
        }
    </style>
@endsection
@section('content')

    <div class="row">
        <!-- Kolom Kiri: Detail Info Kerjaan -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <p class="m-0 p-0"><strong>Detail Kerjaan</strong></p>
                </div>
                <div class="card-body">
                    <p><strong>Judul:</strong> {{ $kerjaan->judul }}</p>
                    <p><strong>Deskripsi:</strong> {{ $kerjaan->deskripsi }}</p>
                    <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($kerjaan->deadline)->format('d M Y') }}
                    </p>
                    <p><strong>Harga:</strong> Rp {{ number_format($kerjaan->harga, 0, ',', '.') }}</p>
                    <hr>
                    <p><strong>Status Pengerjaan:</strong> {{ $kerjaan->status_pengerjaan }}</p>
                    <p><strong>Status Pembayaran:</strong> {{ $kerjaan->status_pembayaran }}</p>
                    <p><strong>Bukti Pembayaran:</strong>
                        @if ($kerjaan->bukti_pembayaran)
                            <a href="{{ asset($kerjaan->bukti_pembayaran) }}" target="_blank">Lihat
                                Bukti</a>
                        @else
                            Belum ada
                        @endif
                    </p>
                    <p><strong>Source Code:</strong>
                        @if ($kerjaan->source_code)
                            <a href="{{ $kerjaan->source_code }}" target="_blank">{{ $kerjaan->source_code }}</a>
                        @else
                            Belum ada
                        @endif
                    </p>
                    <div class="mt-3">
                        @if ($kerjaan->status_pengerjaan == 'selesai')
                            <a href="{{ route('admin.selesai') }}" class="btn btn-secondary btn-sm">Kembali</a>
                        @elseif ($kerjaan->status_pengerjaan == 'batal')
                            <a href="{{ route('admin.batal') }}" class="btn btn-secondary btn-sm">Kembali</a>
                        @else
                            <a href="{{ route('admin.proses') }}" class="btn btn-secondary btn-sm">Kembali</a>
                        @endif
                        <a href="{{ route('admin.kerjaan.edit', $kerjaan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        {{-- update pengerjaan --}}
                        @if ($kerjaan->status_pengerjaan != 'selesai')
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#updateStatusModal">
                                Update Pengerjaan
                            </button>

                            <!-- Modal Update Status -->
                            <div class="modal fade" id="updateStatusModal" tabindex="-1"
                                aria-labelledby="updateStatusModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateStatusModalLabel">Update Status Pengerjaan
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.kerjaan.update-status', $kerjaan->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="status_pengerjaan" class="form-label">Status
                                                        Pengerjaan</label>
                                                    <select class="form-select" id="status_pengerjaan"
                                                        name="status_pengerjaan">
                                                        <option value="pending"
                                                            {{ $kerjaan->status_pengerjaan == 'pending' ? 'selected' : '' }}>
                                                            Pending</option>
                                                        <option value="proses"
                                                            {{ $kerjaan->status_pengerjaan == 'proses' ? 'selected' : '' }}>
                                                            Proses</option>
                                                        <option value="selesai"
                                                            {{ $kerjaan->status_pengerjaan == 'selesai' ? 'selected' : '' }}>
                                                            Selesai</option>
                                                        <option value="batal"
                                                            {{ $kerjaan->status_pengerjaan == 'batal' ? 'selected' : '' }}>
                                                            Batal</option>
                                                    </select>
                                                </div>
                                                {{-- catatan --}}
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Catatan Pengerjaan</label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $kerjaan->catatan_pengerjaan) }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status_pembayaran" class="form-label">Status
                                                        Pembayaran</label>
                                                    <select class="form-select" id="status_pembayaran"
                                                        name="status_pembayaran">
                                                        <option value="Belum Lunas"
                                                            {{ $kerjaan->status_pembayaran == 'Belum Lunas' ? 'selected' : '' }}>
                                                            Belum Lunas</option>
                                                        <option value="Lunas"
                                                            {{ $kerjaan->status_pembayaran == 'Lunas' ? 'selected' : '' }}>
                                                            Lunas</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="source_code" class="form-label">Source Code (Link)</label>
                                                    <input type="text" class="form-control" id="source_code"
                                                        name="source_code" value="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- revisi --}}
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#revisiModal">
                                Revisi
                            </button>

                            <!-- Modal Revisi -->
                            <div class="modal fade" id="revisiModal" tabindex="-1" aria-labelledby="revisiModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="revisiModalLabel">Ajukan Revisi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.kerjaan.revisi', $kerjaan->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="catatan_revisi" class="form-label">Catatan Revisi</label>
                                                    <textarea class="form-control" id="catatan_revisi" name="catatan_revisi" rows="3" required></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Kirim Revisi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Tengah: Proses Pengerjaan -->
        <div class="col-lg-4 ">
            @foreach ($prosesKerjaan as $proses)
                <div class="card mb-2">
                    <div class="card-header">
                        <p class="m-0 p-0"><strong>Proses Pengerjaan</strong></p>
                    </div>
                    <div class="card-body">
                        @php
                            $badgeClass = 'bg-secondary';
                            switch (strtolower($proses->status_progres)) {
                                case 'pending':
                                    $badgeClass = 'bg-secondary';
                                    break;
                                case 'proses':
                                    $badgeClass = 'bg-warning';
                                    break;
                                case 'selesai':
                                    $badgeClass = 'bg-success';
                                    break;
                                case 'batal':
                                    $badgeClass = 'bg-danger';
                                    break;
                                case 'revisi':
                                    $badgeClass = 'bg-info';
                                    break;
                            }
                        @endphp
                        <p><strong>Status Pengerjaan:</strong> <span
                                class="badge {{ $badgeClass }}">{{ $proses->status_progres }}</span></p>
                        <p><strong>Catatan:</strong> {{ $proses->deskripsi }}</p>
                        <p><strong>Tanggal:</strong> {{ $proses->created_at->format('d M Y H:i') }}</p>
                        {{-- source code link --}}
                        <p><strong>Source Code:</strong>
                            @if ($proses->source_code)
                                <a href="{{ $proses->source_code }}" target="_blank">{{ $proses->source_code }}</a>
                            @else
                                Belum ada
                            @endif
                        </p>

                    </div>

                </div>
            @endforeach
        </div>

        <!-- Kolom Kanan: Timeline Pengerjaan -->
        <div class="col-lg-4 mb-4">
            <div class="card  shadow">
                <div class="card-header">
                    <p class="m-0 p-0"><strong>Timeline Penanganan Kerjaan</strong></p>
                </div>
                <div class="card-body">
                    <ul class="timeline">
                        <!-- Status Awal -->
                        <li class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="font-weight-bold mb-1">Kerjaan Dibuat</h6>
                                <small class="text-muted">{{ $kerjaan->created_at->format('d F Y H:i') }}</small>
                                <p class="mb-0 text-sm">Kerjaan berhasil dibuat dan menunggu proses selanjutnya.</p>
                            </div>
                        </li>

                        @foreach ($timelines as $timeline)
                            @php
                                $markerClass = 'bg-secondary'; // default
                                $title = ucwords(str_replace('_', ' ', $timeline->status_progres));

                                switch ($timeline->status_progres) {
                                    case 'pending':
                                        $markerClass = 'bg-secondary';
                                        break;
                                    case 'proses':
                                        $markerClass = 'bg-warning';
                                        break;
                                    case 'selesai':
                                        $markerClass = 'bg-success';
                                        break;
                                    case 'batal':
                                        $markerClass = 'bg-danger';
                                        break;
                                }
                            @endphp
                            <li class="timeline-item">
                                <div class="timeline-marker {{ $markerClass }}"></div>
                                <div class="timeline-content">
                                    <h6 class="font-weight-bold mb-1">{{ $title }}</h6>
                                    <small class="text-muted">{{ $timeline->created_at->format('d F Y H:i') }}</small>
                                    <p class="mb-0 text-sm">{{ $timeline->deskripsi }}</p>
                                    @if ($timeline->source_code)
                                        <p class="mb-0 text-muted small"><a href="{{ $timeline->source_code }}"
                                                target="_blank">Source Code</a></p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
