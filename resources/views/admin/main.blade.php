<!DOCTYPE html>
<html dir="ltr" lang="ja">
	<head>
	    @include('admin.partials._head')
        @include('admin.partials._stylesheets')
        @yield('styles')
	</head>
	<body>
		@include('admin.partials._preloader')
		<div id="main-wrapper">
			@include('admin.partials._header')
			@include('admin.partials._leftnav')
			<div class="page-wrapper">
				@yield('content')
			</div>
			@include('admin.partials._footer')
		</div>
        @include('admin.partials._javascripts')
        @yield('scripts')
	</body>
</html>