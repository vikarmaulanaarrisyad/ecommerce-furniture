@extends('layouts.app')

@section('title', 'Management User')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Management User</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-card>
                <x-slot name="header">
                    <button onclick="addForm(`{{ route('users.store') }}`)" class="btn btn-primary"><i
                            class="fas fa-plus-circle"></i> Tambah</button>
                </x-slot>
                <div class="dt-responsive table-responsive nowrap p-2">
                    {{ $dataTable->table(['class' => 'table table-striped '], true) }}
                </div>
            </x-card>
        </div>
    </div>
@include('backend.admin.users.modal-form')
@endsection

@include('layouts.include.datatables')
<x-toast />

@push('scripts')
    <script>
        function addForm(url) {
            $('.modal').modal('show')
        }
    </script>
@endpush
