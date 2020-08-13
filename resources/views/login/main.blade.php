<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet"> 
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('Componentlogin/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
		
		<!-- STYLE CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('Componentlogin/css/style.css')}}">
    </head>
    
@yield('content')