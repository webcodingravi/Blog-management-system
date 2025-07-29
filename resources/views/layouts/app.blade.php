<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Blog Managment System</title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">


    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">

    {{-- summernote --}}
    <link href="{{ asset('assets/vendor/summernote/summernote-lite.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('assets/vendor/jquery/jquery-3.6.0.min.js') }}"></script>

    @routes
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>



</head>

<body>

    <!-- ======= Header ======= -->
    @include('layouts.header')

    @include('layouts.sidebar')


    @yield('content')



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"
        style="background: #cc9966; border:none"><i class="bi bi-arrow-up-short"></i></a>



    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- summernot js --}}
    <script src="{{ asset('assets/vendor/summernote/summernote-lite.min.js') }}"></script>

    {{-- dataTables --}}
    <script src="{{ asset('assets/vendor/dataTables/dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendor/dataTables/dataTables.bootstrap5.js') }}"></script>
    <link href="{{ asset('assets/vendor/dataTables/datatables.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/vendor/dataTables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dataTables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendor/dataTables/datatables.min.js') }}"></script>

    {{-- custom js --}}
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        setTimeout(() => {
            $("#box").fadeOut('slow')
        }, 3000);
    </script>

    @yield('script')

</body>

</html>
