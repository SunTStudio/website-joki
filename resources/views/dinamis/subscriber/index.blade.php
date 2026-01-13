@extends('layout.main')
@section('title', 'Daftar Subscriber')

@section('content')
    <div class="card">
        <div class="card-header">
            <p><strong>Daftar Subscriber</strong></p>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.subscribers.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Subscriber</a>
            <table class="table table-stripped table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Email</th>
                        <th>Tanggal Subscribe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at->format('d F Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.subscribers.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-delete">Hapus</button>
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
