@if (Route::has('login'))
		@auth
			@include('dashboard')
		@else
			@include('auth.login')
    @endauth
@endif