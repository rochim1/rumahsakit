@extends('login.main')
@section('title','register')
@section('content')
	<body>
		<div class="wrapper">
			<div class="image-holder">
				<img src="images/registration-form-8.jpg" alt="">
			</div>
			<div class="form-inner">
			<form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
				@csrf
					<div class="form-header mt-5">
						<h3>Sign up</h3>
						<img src="images/sign-up.png" alt="" class="sign-up-icon">
					</div>
					<div class="form-group">
						<label for="">Username:</label>
					<input value="{{old('username')}}" name="username" type="text" class="form-control @error('username') is-invalid @enderror" data-validation="length alphanumeric" data-validation-length="3-12">
					@error('username')
						<div class="invalid-feedback">
							username wajib diisi.
						</div>
					@enderror
					</div>
					
					<div class="form-group">
						<label for="">E-mail:</label>
						<input value="{{old('email')}}" name="email" type="text" class="form-control @error('email') is-invalid @enderror" data-validation="email">
					@error('email')
						<div class="invalid-feedback">
							Email wajib di isi dengan benar.
						</div>
					@enderror
					</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

					

					<div class="form-group" >
						<label for="">Password:</label>
						<input name="password" type="password" class="form-control @error('password') is-invalid @enderror " data-validation="length" data-validation-length="min8">
					@error('password')
						<div class="invalid-feedback">
							Password harus diisi.
						</div>
					@enderror
					</div>

					<div class="form-group" >
						<label for="">Re-type Password:</label>
						<input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" data-validation="length" data-validation-length="min8">
					@error('password')
						<div class="invalid-feedback">
							Password harus diisi.
						</div>
					@enderror
					</div>
					<button type="submit">Buat Akun</button>
					<div class="socials mb-5">
						<p>Atau Login dengan</p>
						<a href="" class="socials-icon">
							<i class="zmdi zmdi-facebook"></i>
						</a>
						<a href="" class="socials-icon">
							<i class="zmdi zmdi-instagram"></i>
						</a>
						<a href="" class="socials-icon">
							<i class="zmdi zmdi-twitter"></i>
						</a>
						<a href="" class="socials-icon">
							<i class="zmdi zmdi-tumblr"></i>
						</a>
					</div>
				</form>
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/jquery.form-validator.min.js"></script>
		<script src="js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
@endsection