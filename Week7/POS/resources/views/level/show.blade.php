@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ url('level') }}" class="btn btn-sm btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Kode Level</dt>
            <dd class="col-sm-9">{{ $level->level_kode }}</dd>

            <dt class="col-sm-3">Nama Level</dt>
            <dd class="col-sm-9">{{ $level->level_nama }}</dd>
        </dl>
    </div>
</div>
@endsection
