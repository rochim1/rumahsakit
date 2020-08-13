@extends('login.main')
@section('title','login')
@section('content')
	<body>

		<div class="wrapper">
			<div class="image-holder">
				<img src="images/registration-form-8.jpg" alt="">
			</div>
			<div class="form-inner">
				<form action="{{route('login')}}" method="POST">
					@csrf
					<div class="form-header">
						<h3>LogIn</h3>
						<img src="images/sign-up.png" alt="" class="@error('email') is-invalid @enderror sign-up-icon">
					</div>
					<div class="form-group">
						<label for="">E-mail:</label>
						<input type="text" name="email" class="form-control" data-validation="email">
					@error('email')
						<div class="invalid-feedback">
							email wajib diisi. <strong>{{ $message }}</strong>
						</div>
					@enderror
					</div>
					<div class="form-group" >
						<label for="">Password:</label>
						<input type="password" name="password" class="@error('email') is-invalid @enderror form-control" data-validation="length" data-validation-length="min8">
					@error('password')
						<div class="invalid-feedback">
							password salah. <strong>{{ $message }}</strong>
						</div>
					@enderror
					</div>
					<button>Buat Akun</button>
					<div class="socials">
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