@extends('admin.login.index')
@section('title','login-admin')
@section('style')
<style>
    #app {
        width: 100%;
        height: 200px;
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
                                    <input name="email" v-model="email" type="email" class="form-control"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input name="password" v-model="password" type="password" class="form-control"
                                        placeholder="Password">
                                </div>
                                <button class="btn login-form__btn submit w-100">Sign In</button>
                            </form>
                            @if (session('message'))
                                <div class="alert alert-danger" role="alert">         
                                    {{
                                    session('message')
                                    }}
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
