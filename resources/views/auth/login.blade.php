@extends('layouts.app')
@section('app-layout')
<header data-bs-theme="light">
</header>
<main>
  <div class="container marketing">
    <div class="b-example-divider"></div>
    <div class="container col-xl-10 col-xxl-8 px-4 py-1">
      <div class="row align-items-center g-lg-5 py-1">
        <div class="col-md-10 mx-auto col-lg-5">
          <form method="POST" action="{{ route('login') }}" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
             @csrf
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" :value="old('email')" required autofocus autocomplete="username">
              <label for="floatingInput">Email address</label>
              <x-input-error :messages="$errors->get('email')" class="text-danger" />
            </div>
            <div class="form-floating mb-3">
              <input type="password" name="password" required autocomplete="current-password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
              <x-input-error :messages="$errors->get('password')" class="text-danger" />
            </div>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" name="remember"> Remember me
              </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
            <hr class="my-4">
            <small class="text-body-secondary">
              @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
              @endif
            </small>
          </form>
        </div>
      </div>
    </div>

    <div class="b-example-divider"></div>
  </div>
</main>
@endsection