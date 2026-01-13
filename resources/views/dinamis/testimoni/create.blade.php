@extends('layout.main')
@section('title', 'Tambah Testimoni')

@section('content')
    <div class="card">
        <div class="card-header">
            <p><strong>Tambah Testimoni</strong></p>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.testimoni.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kerjaan_id" class="form-label">Jasa</label>
                    <select class="form-select" id="kerjaan_id" name="kerjaan_id" required>
                        <option value="">Pilih Jasa</option>
                        @foreach ($kerjaans as $kerjaan)
                            <option value="{{ $kerjaan->id }}" data-user-id="{{ $kerjaan->user_id }}"
                                {{ old('kerjaan_id') == $kerjaan->id ? 'selected' : '' }}>
                                {{ $kerjaan->judul }}</option>
                        @endforeach
                    </select>
                    @error('kerjaan_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Pengguna</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option value="">Pilih Pengguna dari Kerjaan yang dipilih</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating (1-5)</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5"
                        value="{{ old('rating') }}" required>
                    @error('rating')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.testimoni') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('kerjaan_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var userId = selectedOption.getAttribute('data-user-id');
            var userSelect = document.getElementById('user_id');

            if (userId) {
                userSelect.value = userId;
            } else {
                userSelect.value = "";
            }
        });
    </script>
@endsection
