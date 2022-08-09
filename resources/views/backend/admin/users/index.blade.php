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
                    <button onclick="addForm(`{{ route('users.store') }}`)" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
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
@include('layouts.include.select2')

@push('scripts')
    <script>
        let modal = '#modal-form';

        function addForm(url, title = 'Tambah User') {
            $(modal).modal('show');
            $(`${modal} .modal-title`).text(title);
            $(`${modal} form`).attr('action', url);
            $(`${modal} [name=_method]`).val('POST');
            $(`${modal}  [name=password]`).attr('disabled',false);

            resetForm(`${modal} form`);
        }

        function editForm(url, title = 'Edit User') {
            $.get(url)
                .done(response => {
                    $(modal).modal('show');
                    $(`${modal} .modal-title`).text(title);
                    $(`${modal} form`).attr('action', url);
                    $(`${modal} [name=_method]`).val('PUT');
                    $(`${modal}  [name=password]`).attr('disabled',true);


                    resetForm(`${modal} form`);
                    loopForm(response.data);
                })
                .fail(errors => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: errors.responseJSON.message,
                        showConfirmButton: false,
                        timer: 2000
                    })
                });
        }

        function submitForm(originalForm) {
            $.post({
                    url: $(originalForm).attr('action'),
                    data: new FormData(originalForm),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false
                })
                .done(response => {
                    $(modal).modal('hide');

                    if (response.status = 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                    window.LaravelDataTables["users-table"].ajax.reload();
                })
                .fail(errors => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: errors.responseJSON.message,
                        showConfirmButton: false,
                        timer: 2000
                    })
                    if (errors.status == 422) {
                        loopErrors(errors.responseJSON.errors);
                        return;
                    }
                });
        }

        function deleteData(url) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "ingin menghapus data ini, data yang telah dihapus tidak dapat dikembalikan lagi.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
              }).then((result) => {
                if (result.isConfirmed) {
                  $.post(url, {
                    '_method': 'delete'
                })
                .done(response => {
                    if (response.status = 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                    window.LaravelDataTables["users-table"].ajax.reload();
                })
                .fail(errros => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: errros.responseJSON.message,
                        showConfirmButton: false,
                        timer: 2000
                    })
                        window.LaravelDataTables["users-table"].ajax.reload();
                    })
                }
            })
        }
    </script>
@endpush
