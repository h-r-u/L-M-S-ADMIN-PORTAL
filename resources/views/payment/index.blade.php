@extends('layouts.hru')
@section('hru-layout')
<h2>Orders</h2>
<div class="table-responsive small">
  @if(count($order))
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Email</th>
        <th scope="col">Course</th>
        <th scope="col">Level</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($order as $item)
      <tr>
        <td>{{$item->order_id}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->course}}</td>
        <td>{{$item->level}}</td>
        <td>
        	@if($item->status === '1')
        		<span class="badge bg-success">complete</span>
        	@elseif($item->status === '0')
        		<span class="badge bg-warning">pending</span>
        	@endif
        </td>
        <td>
          <a href="{{route('payment-show', $item->id)}}" class="btn btn-primary">View order</a>
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