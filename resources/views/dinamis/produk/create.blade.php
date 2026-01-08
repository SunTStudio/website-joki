@extends('layout.main')
@section('title', 'Buat Produk Baru')

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="m-0 p-0"><strong>Buat Produk Baru</strong></p>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Mulai</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                                name="harga" value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="estimasi" class="form-label">Estimasi Pengerjaan</label>
                            <input type="text" class="form-control @error('estimasi') is-invalid @enderror"
                                id="estimasi" name="estimasi" value="{{ old('estimasi') }}" placeholder="Contoh: 1-2 Hari">
                            @error('estimasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Utama</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                                name="gambar">
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="gambar2" class="form-label">Gambar Pendukung 1 (Opsional)</label>
                            <input type="file" class="form-control @error('gambar2') is-invalid @enderror" id="gambar2"
                                name="gambar2">
                            @error('gambar2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gambar3" class="form-label">Gambar Pendukung 2 (Opsional)</label>
                            <input type="file" class="form-control @error('gambar3') is-invalid @enderror" id="gambar3"
                                name="gambar3">
                            @error('gambar3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin.produk') }}" class="btn btn-sm btn-secondary">Batal</a>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
