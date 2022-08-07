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
                    <button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </x-slot>
                <div class="dt-responsive table-responsive nowrap p-2">
                    {{ $dataTable->table(['class' => 'table table-striped '], true) }}
                </div>
            </x-card>
        </div>
    </div>
    <x-toast />
@endsection

@include('layouts.include.datatables')
