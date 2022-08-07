@extends('layouts.app')

@section('title', 'Management User')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Management User</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Header
                </div>
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <p class="card-text">Content</p>
                </div>
            </div>
        </div>
    </div>
@endsection
