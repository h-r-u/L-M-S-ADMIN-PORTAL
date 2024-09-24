@extends('layouts.hru')
@section('hru-layout')
<div class="container col-xxl-8 px-4 py-5">
  @include('alert.alert')
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="/storage/theme/avatar.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
      <p class="lead">
        <div class="table-responsive small">
			  <table class="table table-striped table-sm">
			    <thead>
			      <tr>
			        <th scope="col">Name</th>
			        <th scope="col">Email</th>
			        <th scope="col">Created at</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>{{$user->name}}</td>
			        <td>{{$user->email}}</td>
			        <td>{{$user->created_at}}</td>
			      </tr>
			    </tbody>
			  </table>
			</div>
      </p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <!-- <form id="discard-form" action="#delete" method="POST">
          @csrf
          @method('delete')
          <button type="submit" form="discard-form" class="btn btn-outline-danger btn-sm px-4">Discard</button>
        </form>  -->
        <a href="#" class="btn btn-outline-danger btn-sm">Discard</a>       
      </div>
    </div>
  </div>
</div>
@endsection