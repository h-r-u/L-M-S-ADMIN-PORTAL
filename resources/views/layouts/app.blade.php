<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="description" content="">
<meta name="author" content="Umeme Networks ENgineering Solutions Limited">
<meta http-equiv="refresh-stop" content="10; url=/system/create-new-system/">
<meta name="generator" content="umeme_ke">
<title>{{ config('app.name', 'ADMINISTRATOR PORTAL') }}</title>
<link rel="icon" type="image/x-icon" href="{{asset('/storage/theme/favicon.png')}}">
<link href="{{ asset('bootstrap/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('fontawsam/all.min.css')}}" rel="stylesheet">
<!-- custom css -->
<link href="{{ asset('bootstrap/umemenetworks.css')}}" rel="stylesheet">
</head>
<body class="">
<div class="container">
  <header class="border-bottom lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="/">{{ config('app.name', 'STUDENT PORTAL') }}</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">
          <img class="me-3" src="{{asset('/storage/theme/favicon.png')}}" alt="" width="48" height="48">
        </a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="{{route('login')}}">Login</a>
      </div>
    </div>
  </header>
  <div class="nav-scroller py-1 mb-3 border-bottom">
    
  </div>
</div>
<main class="container">
@include('alert.alert')
@yield('app-layout')
</main>
@include('layouts.hru.footer')
<script src="{{ asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('jquery/jquery-3.7.0.min.js')}}"></script>
<script type="text/javascript">
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
    myModal.show();
  });
</script>
</body>
</html>