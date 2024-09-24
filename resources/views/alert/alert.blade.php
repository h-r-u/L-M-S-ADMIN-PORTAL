@if(Session::has('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert"><img class="me-3" src="{{asset('/storage/theme/emoji/scare-face.png')}}" alt="" width="50" height="50">  {{Session::get("danger")}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <img class="me-3" src="{{asset('/storage/theme/emoji/cute-face.png')}}" alt="" width="50" height="50"> {{Session::get("success")}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(Session::has('warning'))
<div class="animate">
  <div class="alert alert-warning alert-dismissible border shadow-sm fade show fade" role="alert"><img class="me-3" src="{{asset('/storage/theme/emoji/sad-suprise-face.png')}}" alt="" width="50" height="50">{{Session::get("warning")}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif
@if(Session::has('errors'))
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert"><img class="me-3" src="{{asset('/storage/theme/emoji/sad-face.png')}}" alt="" width="50" height="50"> {{$error}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach
@endif
@if(Session::has('info'))
<div class="animate">
  <div class="alert alert-info alert-dismissible border shadow-sm fade show fade" role="alert"><img class="me-3" src="{{asset('/storage/theme/layout/welcome_home.png')}}" alt="" width="50" height="50">{{Session::get("info")}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif