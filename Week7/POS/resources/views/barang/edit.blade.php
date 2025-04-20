@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>

    <div class="card-body">
        @empty($barang)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data yang Anda cari tidak ditemukan.
            </div>
            <a href="{{ url('barang') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
            <form method="POST" action="{{ url('/barang/'.$barang->barang_id) }}" class="form-horizontal">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label class="col-2 col-form-label">Kategori</label>
                    <div class="col-10">
                        <select class="form-control" name="kategori_id" required>
                            <option value="">- Pilih Kategori -</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->kategori_id }}" {{ $item->kategori_id == $barang->kategori_id ? 'selected' : '' }}>
                                    {{ $item->kategori_nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Kode Barang</label>
                    <div class="col-10">
                        <input type="text" class="form-control" name="barang_kode" value="{{ old('barang_kode', $barang->barang_kode) }}" required>
                        @error('barang_kode')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Nama Barang</label>
                    <div class="col-10">
                        <input type="text" class="form-control" name="barang_nama" value="{{ old('barang_nama', $barang->barang_nama) }}" required>
                        @error('barang_nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Harga Beli</label>
                    <div class="col-10">
                        <input type="number" class="form-control" name="harga_beli" value="{{ old('harga_beli', $barang->harga_beli) }}" required>
                        @error('harga_beli')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Harga Jual</label>
                    <div class="col-10">
                        <input type="number" class="form-control" name="harga_jual" value="{{ old('harga_jual', $barang->harga_jual) }}" required>
                        @error('harga_jual')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-10 offset-2">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <a href="{{ url('barang') }}" class="btn btn-sm btn-default ml-1">Kembali</a>
                    </div>
                </div>
            </form>
        @endempty
    </div>
</div>
@endsection
