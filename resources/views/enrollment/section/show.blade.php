@extends('layouts.hru')
@section('hru-layout')
<div class="container col-xxl-8 px-4 py-5">
  @include('alert.alert')
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="{{ config('app.storge_url', 'https://www.enrollment.hru.co.ke') }}/storage/pictures/{{$enrollment->passport_photo}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
      <p class="lead">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Enrollment Type: <span class="badge bg-info">{{$enrollment['type']}}</span></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>First Name: {{$enrollment['first_name']}}</td>
            </tr>
            <tr>
              <td>Middle Name: {{$enrollment['middle_name']}}</td>
            </tr>
            <tr>
              <td>Last Name: {{$enrollment['last_name']}}</td>
            </tr>
            <tr>
              <td>Phone Number: {{$enrollment['phone_number']}}</td>
            </tr>
            <tr>
              <td>Email: {{$enrollment['email']}}</td>
            </tr>
            <tr>
              <td>Course: {{$enrollment['course']}}</td>
            </tr>
            <tr>
              <td>Level: {{$enrollment['level']}}</td>
            </tr>
            <tr>
              <td>Exam Location: {{$enrollment['exam_location']}}</td>
            </tr>
            <tr>
              <td>Intake: {{$enrollment['intake']}}</td>
            </tr>
            <tr>
              @if($enrollment['status'] == '1')
              <td>Status: <span class="badge bg-success">Active</td>
              @elseif($enrollment['status'] == '0')
              <td>Status: <span class="badge bg-danger">Pending Application</span></td>
              @endif
            </tr>
            <tr>
              <td>Created at: {{$enrollment['created_at']}}</td>
            </tr>
          </tbody>
        </table>
      </p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <form id="admit-form" action="{{route('patch-method', $enrollment->id)}}" method="POST">
          @csrf
          @method('patch')
          <button type="submit" form="admit-form" class="btn btn-primary btn-sm px-4 me-md-2">Admit</button>
        </form>
        <a href="{{ config('app.storge_url', 'https://www.enrollment.hru.co.ke') }}/storage/documents/{{$enrollment->essay}}" class="btn btn-outline-secondary btn-lg px-4" download><span class="fas fa-download"></span> Essay</a>
        <form id="discard-form" action="{{route('discard-method', $enrollment->id)}}" method="POST">
          @csrf
          @method('delete')
          <button type="submit" form="discard-form" class="btn btn-outline-danger btn-sm px-4">Discard</button>
        </form>        
      </div>
    </div>
  </div>
</div>
@endsection