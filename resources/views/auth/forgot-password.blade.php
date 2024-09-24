@extends('layouts.guest')
@section('guest-layout')
<div class="b-example-divider"></div>
@include('alert.alert')
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-lg-5 py-5">
    <div class="col-lg-7 text-center text-lg-start">
      <p class="col-lg-10 fs-4">
        <img src="{{asset('/storage/theme/emoji/suspect-face.png')}}" class="d-block mx-lg-auto img-fluid" alt="Smartboma" width="700" height="500" loading="lazy" style="border-radius: 8px;">
      </p>
      <p class="col-lg-10 fs-4">
        <h2>Forgot your password?</h2>
        No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.<br>
        <b>#pamoja_tunaimarika</b>
      </p>
    </div>
    <div class="col-md-10 mx-auto col-lg-5">
      <form method="POST" action="{{ route('password.email') }}" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
         @csrf
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" :value="old('email')" required autofocus autocomplete="username">
          <label for="floatingInput">Email address</label>
          <x-input-error :messages="$errors->get('email')" class="text-danger" />
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Recover Account</button>
        <hr class="my-4">
        <small class="text-body-secondary">Do you have your account details already?</small><br>
        <small class="text-body-secondary">
          @if (Route::has('password.request'))
            <a href="/">
                {{ __('Signin instead') }}
            </a>
          @endif
        </small>
      </form>
    </div>
  </div>
</div>

<div class="b-example-divider"></div>
@endsection