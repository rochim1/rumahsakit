{{-- {{Request::url()}}  --}}
{{-- // untuk mendapatkan url --}}
{{-- {{request()->segment(count(request()->segments()))}}  --}}
{{-- //untuk mendapatkan segment terakhir url --}}
@include('rumahsakit/header')
{{-- @include('rumahsakit/main_content') --}}
@yield('section')
@include('rumahsakit/footer')