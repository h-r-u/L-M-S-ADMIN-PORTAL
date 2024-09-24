@extends('layouts.hru')
@section('hru-layout')
<h2>{{$course['title']}}</h2>
<div class="table-responsive small">
  @if(count($course[$course['title']]))
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Level</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($course[$course['title']] as $item)
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->level}}</td>
        <td>
          <a href="{{route('course-show', $item->id)}}" class="btn btn-primary"><span class="fas fa-eye"></span> View Course</a>
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