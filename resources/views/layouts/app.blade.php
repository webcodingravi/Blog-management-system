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

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />


    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">


    {{-- summernote --}}
    <link href="{{ asset('assets/summernote/summernote-lite.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('assets/jquery/jquery-3.6.0.min.js') }}"></script>



    {{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/dataTables.js') }}"></script>

    <script src="{{ asset('assets/dataTables/dataTables.bootstrap5.js') }}"></script>
    <link href="{{ asset('assets/dataTables/datatables.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('assets/dataTables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/dataTables/datatables.min.js') }}"></script>

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



    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/summernote/summernote-lite.min.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        setTimeout(() => {
            $("#box").fadeOut('slow')
        }, 3000);
    </script>

    @yield('script')

</body>

</html>
