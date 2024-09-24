@extends('layouts.hru')
@section('hru-layout')
<div class="container col-xxl-8 px-4 py-5">
  @include('alert.alert')
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="/storage/pictures/{{$course['cover_photo']}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
      <p class="lead">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Homeschool Robotics University: <span class="badge bg-info">Educating Africa</span></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><b>Course Name</b>: {{$course['name']}}</td>
            </tr>
            <tr>
              <td>Course Duration: {{$course['duration']}}</td>
            </tr>
            <tr>
              <td>Course Level: {{$course['level']}}</td>
            </tr>
            <tr>
              <td>Course Price: {{number_format($course['price'], 2)}}</td>
            </tr>
            <tr>
              @if($course['status'] == '1')
              <td>Course Status: <span class="badge bg-success">Available</td>
              @elseif($course['status'] == '0')
              <td>Course Status: <span class="badge bg-danger">Unavailable</span></td>
              @endif
            </tr>
            <tr>
              <td>Created at: {{$course['created_at']}}</td>
            </tr>
          </tbody>
        </table>
      </p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="{{route('course-edit', $course->id)}}"  class="btn btn-primary btn-sm px-4 me-md-2"><span class="fas fa-pencil"></span> Edit</a>
        <form id="discard-form" action="{{route('discard-method', $course->id)}}" method="POST">
          @csrf
          @method('delete')
          <button type="submit" form="discard-form" class="btn btn-outline-danger btn-sm px-4">Discard</button>
        </form>        
      </div>
    </div>
  </div>
</div>
@endsection