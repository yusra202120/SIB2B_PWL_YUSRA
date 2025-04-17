@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Kategori:</label>
                <select id="filter_kategori" class="form-control">
                    <option value="">- Semua -</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        var table = $('#table_barang').DataTable({
            ajax: {
                url: "{{ url('/barang/list') }}",
                data: function (d) {
                    d.kategori_id = $('#filter_kategori').val();
                }
            },
            processing: true,
            serverSide: true,
            columns: [
                { data: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
                { data: 'barang_kode' },
                { data: 'barang_nama' },
                { data: 'kategori' },
                { data: 'harga_beli', className: 'text-right' },
                { data: 'harga_jual', className: 'text-right' },
                { data: 'aksi', orderable: false, searchable: false }
            ]
        });

        $('#filter_kategori').on('change', function () {
            table.ajax.reload();
        });
    });
</script>
@endpush
