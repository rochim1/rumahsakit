{{-- @unless (Auth::check())
<div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
  <strong>warning!</strong> You are not sign in. redirect to login menu in 5 second
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endunless --}}

@if(Session::has('credential'))
{{-- untuk cek credential user yang login --}}
    {{-- {{ dd(Session::get('credential')[1]) }} --}}
@endif

@include('admin.header')
<!--**********************************
            Content body start
        ***********************************-->
        
@yield('content')
<!--**********************************
            Content body end
        ***********************************-->
@include('admin.footer')
