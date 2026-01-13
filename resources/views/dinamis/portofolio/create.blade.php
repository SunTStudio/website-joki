@extends('layout.main')
@section('title','Buat Portofolio baru')

@section('content')
{{-- isi form : judul	deskripsi	gambar	gambar2	gambar3	gambar4 --}}
    <div class="card">
        <div class="card-header">
            <p><strong>Buat Portofolio Baru</strong></p>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                        name="judul" value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                        rows="3">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Utama</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                        name="gambar">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar2" class="form-label">Gambar Pendukung 1 (Opsional)</label>
                    <input type="file" class="form-control @error('gambar2') is-invalid @enderror" id="gambar2"
                        name="gambar2">
                    @error('gambar2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar3" class="form-label">Gambar Pendukung 2 (Opsional)</label>
                    <input type="file" class="form-control @error('gambar3') is-invalid @enderror" id="gambar3"
                        name="gambar3">
                    @error('gambar3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar4" class="form-label">Gambar Pendukung 3 (Opsional)</label>
                    <input type="file" class="form-control @error('gambar4') is-invalid @enderror" id="gambar4"
                        name="gambar4">
                    @error('gambar4')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.portofolio') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
