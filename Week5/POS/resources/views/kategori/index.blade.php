@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Manage')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ url('/kategori/create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Add Kategori
        </a>
    </div>

    {{-- Tempat untuk table DataTable --}}
    <div class="card card-primary">
        <div class="card-body">
            {!! $dataTable->table(['class' => 'table table-bordered table-striped']) !!}
        </div>
    </div>
</div>


@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
