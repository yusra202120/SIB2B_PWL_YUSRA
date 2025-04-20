@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header"><h3 class="card-title">{{ $page->title }}</h3></div>
    <div class="card-body">
        @if($kategori)
        <table class="table table-bordered">
            <tr><th>Kode</th><td>{{ $kategori->kategori_kode }}</td></tr>
            <tr><th>Nama</th><td>{{ $kategori->kategori_nama }}</td></tr>
        </table>
        <a href="{{ url('kategori') }}" class="btn btn-default btn-sm mt-3">Kembali</a>
        @else
        <div class="alert alert-danger">Data tidak ditemukan.</div>
        <a href="{{ url('kategori') }}" class="btn btn-default btn-sm">Kembali</a>
        @endif
    </div>
</div>
@endsection
