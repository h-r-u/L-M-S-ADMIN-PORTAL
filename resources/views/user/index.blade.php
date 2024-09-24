@extends('layouts.hru')
@section('hru-layout')
<h2>{{$user['title']}}</h2>
<div class="table-responsive small">
  @if(count($user[$user['title']]))
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($user[$user['title']] as $item)
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>
          <a href="{{route('show-user', $item->id)}}" class="btn btn-primary">View application</a>
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