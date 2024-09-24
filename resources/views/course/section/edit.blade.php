@extends('layouts.hru')
@section('hru-layout')
<form id="edit-form" action="{{route('course-update', $course->id)}}" method="POST" class="container col-xxl-8 px-4 py-5" enctype="multipart/form-data">
  @include('alert.alert')
  @csrf
  @method('patch')
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="/storage/pictures/{{$course['cover_photo']}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      <div class="form-floating mb-3">    
        <input type="file" name="cover_photo" class="form-control" required>
        <label>Cover Photo</label>
        <div class="invalid-feedback">
          Upload Cover Photo
        </div>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
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
              <td><b>Course Name</b>: 
                <div>
                  <input type="text" class="form-control" name="name" value="{{$course['name']}}">
                </div>
              </td>
            </tr>
            <tr>
              <td>Course Duration: {{$course['duration']}}</td>
            </tr>
            <tr>
              <td>Course Level: 
                <div class="form-floating mb-3">    
                  <select class="form-control" name="level" required>
                    <option value="{{$course['level']}}">Current Level: {{$course['level']}}</option>
                    <option value="up-skill">Up-skill Graduate Level</option>
                    <option value="artisan">Artisan Graduate Level</option>
                    <option value="up-skill">Craft-certificate Graduate Level</option>
                    <option value="diploma">Diploma Graduate Level</option>
                  </select>
                  <label>Select Education Level</label>
                  <div class="invalid-feedback">
                    Select Education Level
                  </div>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Course Price: {{number_format($course['price'], 2)}}</td>
            </tr>
            <tr>
              <td>
                <div class="form-floating mb-3">    
                  <select class="form-control" name="status" required>
                    <option value="{{$course['status']}}">Current Status: 
                      @if($course['status'] === '1')
                        Active
                      @else
                        Pending
                      @endif
                    </option>
                    <option value="1">Active</option>
                    <option value="0">Pending</option>
                  </select>
                  <label>Course Status</label>
                  <div class="invalid-feedback">
                    Select Education Level
                  </div>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Created at: {{$course['created_at']}}</td>
            </tr>
          </tbody>
        </table>
      </p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <button type="submit" form="edit-form" class="btn btn-outline-warning btn-sm px-4">Upload Changes</button>
        <a href="{{route('course-show', $course->id)}}" class="btn btn-outline-danger"><span class="fas fa-arrow-back"></span> Back</a>
      </div>
    </div>
  </div>
</form>
@endsection