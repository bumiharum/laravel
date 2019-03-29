<!DOCTYPE html>
<html>
<head>
	@include('layouts.head')
</head>
<body>
	{{-- @if(!Request::is('gtk')) --}}
	@include('layouts.nav')
	{{-- @endif --}}


		@yield('content')

		{{-- @if(!Request::is('posts/create')) --}}

{{-- @include('layouts.footer') --}}
	{{-- @endif --}}

	@include('layouts.javascript')

	@yield('scripts')

</body>
</html>
