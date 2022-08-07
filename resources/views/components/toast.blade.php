@push('scripts')
    @if (session()->has('success'))
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                icon: 'success',
                title: '{{ session('message') }}'
            });
        </script>
    @elseif (session()->has('errors'))
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });


            Toast.fire({
                icon: 'error',
                title: '{{ session('message') }}'
            });
        </script>
    @endif

@endpush

@push('scripts_vendor')
    <!-- SweetAlert2 -->
    <script src="{{ asset('AdminLTE/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('AdminLTE/plugins/toastr/toastr.min.js') }}"></script>
@endpush