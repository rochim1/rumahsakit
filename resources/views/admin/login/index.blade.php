<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{asset('Componentadmin/css/style.css')}}" rel="stylesheet">
    @yield('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    @yield('content')

    

    
    <!--**********************************
        Scripts
    ***********************************-->
    {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}



    <script src="{{asset('Componentadmin/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('Componentadmin/js/custom.min.js')}}"></script>
    <script src="{{asset('Componentadmin/js/settings.js')}}"></script>
    <script src="{{asset('Componentadmin/js/gleek.js')}}"></script>
    <script src="{{asset('Componentadmin/js/styleSwitcher.js')}}"></script>
        <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: {
                    judul: '',
                    surat: 'silahkan login',
                    pesan: 'anda login pada : ' + new Date().toLocaleString(),
                    array : [
                        {
                            content: 'isi pertama'
                        },
                        {
                            content: 'isi kedua'
                        },
                        {
                            content: 'isi ketiga'
                        }]
                }
            },

        });
    </script>
</body>

</html>
