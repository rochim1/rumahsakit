@extends('admin.login.index')
@section('title','login-admin')
@section('style')
<style>
    #app {
        width: 100%;
        height: 200px;
    }

    .is-invalid {
        border: 1px solid red;
    }

</style>

@endsection
@section('content')
<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a id="top_title" class="text-center" href="index.html">
                                <h6>@{{ times}}</h6>
                                <h6>@{{ dates}}</h6>
                                <h4>Admin login</h4>
                            </a>

                            <form class="mt-5 mb-5 login-input" method="post" action="{{route('log_admin')}}">
                                @csrf
                                <div class="form-group">
                                    <input value="{{ old('email') }}" name="email" v-model="email" type="email"
                                        class="@error('email') is-invalid @enderror form-control" placeholder="Email">

                                    @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input data-validation-length="min8" name="password" v-model="password"
                                        type="password" class="@error('password') is-invalid @enderror form-control"
                                        placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-check form-check-inline mb-3 mt-0">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineCheckbox1">remember me</label>
                                </div>
                                <button class="btn login-form__btn submit w-100">Sign In</button>
                            </form>
                            @if (session('message'))
                            <div class="alert alert-danger" role="alert">
                                {{
                                    session('message')
                                    }}
                            </div>
                            {{-- {{
                                dd(Cookie::get('credential'))
                            }} --}}
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger" role="alert">

                                ditemukan {{ $jumlah = $errors->count()}}
                                @if ($jumlah >1) beberapa error @else error @endif
                                : <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <script>
                                var login = new Vue({

                                })

                            </script>





                            <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html"
                                    class="text-primary">Sign Up</a> now</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
