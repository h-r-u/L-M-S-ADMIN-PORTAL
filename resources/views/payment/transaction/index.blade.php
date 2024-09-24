@extends('layouts.hru')
@section('hru-layout')
<h2>Transactions</h2>
<div class="table-responsive small">
  @if(count($result['transaction']))
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Type</th>
        <th scope="col">ID</th>
        <th scope="col">Code</th>
        <th scope="col">Status</th>
        <th scope="col">Amount</th>
      </tr>
    </thead>
    <tbody>
      @foreach($result['transaction'] as $item)
      <tr>
        <td>{{$item->transaction_type}}</td>
        <td>{{$item->transaction_id}}</td>
        <td>{{$item->transaction_code}}</td>
        <td>
          @if($item->transaction_status == '1')
          <span class="badge bg-success">complete</span>
          @else
          <span class="badge bg-warning">pending</span>
          @endif
        </td>
        <td>{{$item->amount}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  Empty!
  @endif
</div>
@endsection