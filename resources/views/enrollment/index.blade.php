@extends('layouts.hru')
@section('hru-layout')
<h2>{{$enrollment['title']}}</h2>
<div class="table-responsive small">
  @if(count($enrollment[$enrollment['title']]))
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Passport</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($enrollment[$enrollment['title']] as $item)
      <tr>
        <td><img class="me-3" src="{{ config('app.storge_url', 'https://www.enrollment.hru.co.ke') }}/storage/pictures/{{$item->passport_photo}}" alt="" width="48" height="48"></td>
        <td>
          {{$item->first_name}} {{$item->middle_name}} {{$item->last_name}}
        </td>
        <td>
          @if($item->status == 1)
          <span class="badge bg-success">Approved!</span>
          @elseif($item->status == 0)
          <span class="badge bg-danger">Pending</span>
          @endif

        </td>
        <td>
          <a href="{{route('show-enrollment', $item->id)}}" class="btn btn-primary">View application</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  Empty!
  @endif
</div>
@endsection