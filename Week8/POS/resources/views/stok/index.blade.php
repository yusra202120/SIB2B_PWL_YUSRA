@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title ?? 'Data Stok' }}</h3>
        <div class="card-tools">
            <a href="{{ url('stok/create') }}" class="btn btn-sm btn-primary mt-1">Tambah</a>
            <button onclick="modalAction('{{ url('stok/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
        </div>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-striped table-hover table-sm" id="table_stok">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Petugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

{{-- Modal AJAX --}}
<div id="myModal" 
     class="modal fade animate shake" 
     tabindex="-1" 
     role="dialog" 
     data-backdrop="static" 
     data-keyboard="false" 
     aria-hidden="true">
</div>
@endsection

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function () {
            $('#myModal').modal('show');
        });
    }

    var tableStok;

    $(document).ready(function () {
        tableStok = $('#table_stok').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ url('stok/list') }}",
                type: "POST",
                data: function(d) {
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [
                { data: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
                { data: 'barang.barang_nama' },
                { data: 'stok_tanggal' },
                { data: 'stok_jumlah', className: 'text-right' },
                { data: 'user.username' },
                { data: 'aksi', orderable: false, searchable: false, className: 'text-center' }
            ]
        });
    });
</script>
@endpush
