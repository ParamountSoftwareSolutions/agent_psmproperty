<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Psm Property</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{  asset('public/panel/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/panel/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/panel/assets/bundles/datatables/datatables.min.css') }}">
    <!-- Extra Style Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{  asset('public/panel/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{  asset('public/panel/assets/css/components.css') }}">

    <link rel="stylesheet" href="{{  asset('public/panel/assets/css/all.min.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{  asset('public/panel/assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('public/panel/assets/img/favicon.ico') }}'/>
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        @yield('content')
        @include('admin.includes.footer')
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('public/panel/assets/js/app.min.js') }}"></script>
<!-- JS Libraies -->
<script src="{{ asset('public/panel/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
<script src="{{ asset('public/panel/assets/js/page/index.js') }}"></script>
<script src="{{ asset('public/panel/assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('public/panel/assets/js/page/forms-advanced-forms.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('public/panel/assets/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('public/panel/assets/js/custom.js') }}"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        width: '27rem',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
        @if (Session()->has('message'))
    var type = "{{ Session::get('alert') }}";
    switch (type) {
        case'info':
            Toast.fire({
                icon: 'info',
                title: '{{ Session::get("message") }}'
            })
            break;
        case 'success':
            Toast.fire({
                icon: 'success',
                title: '{{ Session::get("message") }}'
            })
            break;
        case 'warning':
            Toast.fire({
                icon: 'warning',
                title: '{{ Session::get("message") }}'
            })
            break;
        case'error':
            Toast.fire({
                icon: 'error',
                title: '{{ Session::get("message") }}'
            })
            break;
    }
    @endif
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
</body>
</html>
