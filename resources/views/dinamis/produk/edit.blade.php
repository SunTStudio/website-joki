@extends('layout.main')
@section('title', 'Edit Produk')

@section('content')
    <div class="card">
        <div class="card-header">
            <p class="m-0 p-0"><strong>Edit Produk</strong></p>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ old('nama', $produk->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Mulai</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                                name="harga" value="{{ old('harga', $produk->harga) }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="estimasi" class="form-label">Estimasi Pengerjaan</label>
                            <input type="text" class="form-control @error('estimasi') is-invalid @enderror"
                                id="estimasi" name="estimasi" value="{{ old('estimasi', $produk->estimasi) }}"
                                placeholder="Contoh: 1-2 Hari">
                            @error('estimasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <a href="{{ route('admin.produk') }}" class="btn btn-sm btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Gambar Utama</label>
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <img id="preview-gambar" src="{{ asset($produk->gambar) }}" alt="Preview"
                                        class="img-fluid mb-2 rounded" style="max-height: 200px;">
                                    <input class="form-control @error('gambar') is-invalid @enderror" type="file"
                                        id="formFile" name="gambar" accept="image/*"
                                        onchange="previewImage(this, 'preview-gambar')">
                                    <small class="text-muted d-block mt-1">Upload gambar baru untuk mengganti</small>
                                    @error('gambar')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="gambar2" class="form-label">Gambar Pendukung 1 (Opsional)</label>
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <img id="preview-gambar2" src="{{ $produk->gambar2 ? asset($produk->gambar2) : '#' }}"
                                        alt="Preview" class="img-fluid mb-2 rounded"
                                        style="max-height: 150px; display: {{ $produk->gambar2 ? 'block' : 'none' }};">
                                    <input type="file" class="form-control @error('gambar2') is-invalid @enderror"
                                        id="gambar2" name="gambar2" accept="image/*"
                                        onchange="previewImage(this, 'preview-gambar2')">
                                    <small class="text-muted d-block mt-1">Upload gambar baru untuk mengganti</small>
                                    @error('gambar2')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar3" class="form-label">Gambar Pendukung 2 (Opsional)</label>
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <img id="preview-gambar3" src="{{ $produk->gambar3 ? asset($produk->gambar3) : '#' }}"
                                        alt="Preview" class="img-fluid mb-2 rounded"
                                        style="max-height: 150px; display: {{ $produk->gambar3 ? 'block' : 'none' }};">
                                    <input type="file" class="form-control @error('gambar3') is-invalid @enderror"
                                        id="gambar3" name="gambar3" accept="image/*"
                                        onchange="previewImage(this, 'preview-gambar3')">
                                    <small class="text-muted d-block mt-1">Upload gambar baru untuk mengganti</small>
                                    @error('gambar3')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
