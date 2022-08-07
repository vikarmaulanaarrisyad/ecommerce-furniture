@push('css_vendor')
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@endpush

@push('scripts_vendor')
<!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('AdminLTE') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
@endpush

@push('scripts')
    <script>
        //Initialize Date Elements
        $('datepicker').datetimepicker({
            icons: {time: 'far fa-clock'},
            format: 'YYYY-MM-DD',
            locale:'id'
        })
        //Initialize Date Time Elements
        $('datetimepicker').datetimepicker({
            icons: {time: 'far fa-clock'},
            format: 'YYYY-MM-DD HH:mm',
            locale:'id'
        })

    </script>
@endpush
