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
<title>{{ config('app.name', 'STUDENT PORTAL') }}</title>
<link rel="icon" type="image/x-icon" href="{{asset('/storage/theme/favicon.png')}}">
<link href="{{ asset('bootstrap/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('fontawsam/all.min.css')}}" rel="stylesheet">
<!-- custom css -->
<link href="{{ asset('bootstrap/umemenetworks.css')}}" rel="stylesheet">
</head>
<body class="">
@include('layouts.hru.nav')
<main class="container">
@include('alert.alert')
@yield('guest-layout')
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