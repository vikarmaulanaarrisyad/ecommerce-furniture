@push('css_vendor')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/summernote/summernote-bs4.min.css">
@endpush

@push('scripts_vendor')
    <!-- Summernote -->
    <script src="{{ asset('AdminLTE') }}/plugins/summernote/summernote-bs4.min.js"></script>
@endpush

@push('scripts')
    <script>
        //Initialize Summernote Elements
        $('.summernote').summernote({
            height: 200,
            fontName: ['']
        })

        $('.note-btn-group.note-fontname').remove()
        setTimeout(() => {
            $('.note-btn-group.note-fontname').remove()

        }, 300)
    </script>
@endpush
