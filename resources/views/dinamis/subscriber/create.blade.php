{{-- buat form create untuk subscribers --}}
@extends('layout.main')
@section('title', 'Tambah Subscriber')

@section('content')
    <div class="card">
        <div class="card-header">
            <p><strong>Tambah Subscriber</strong></p>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.subscribers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.subscribers') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection