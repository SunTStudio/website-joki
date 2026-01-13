@extends('layout.main')
@section('title','Dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <p><strong>Testimoni Pengguna</strong></p>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.testimoni.create') }}" class="btn btn-sm btn-primary mb-2">Tambahkan Testimoni Baru <i></i></a>
        <table class="table table-stripped table-bordered" id="DataTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Pengguna</th>
                    <th>Jasa</th>
                    <th>Deskripsi</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimoni as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->kerjaan->judul }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->rating }}</td>
                        <td>
                        <a href="{{ route('admin.testimoni.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.testimoni.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">Hapus</button>
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
            $('#DataTable').DataTable({
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