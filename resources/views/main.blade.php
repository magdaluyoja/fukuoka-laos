<!DOCTYPE html>
<html lang="ja">
	<head>
	    @include('partials._head')
        @include('partials._stylesheets')
        @yield('css')
	</head>
	<body>
		@include('partials._header')
		@include('partials._topnav')
		<div class="container">
			@include('partials._errors')
			@include('partials._success')
			@yield('content')
		</div>
		@include('partials._footer')
        @include('partials._javascripts')
	</body>
</html>