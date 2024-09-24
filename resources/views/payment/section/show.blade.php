@extends('layouts.hru')
@section('hru-layout')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <div class="row p-3">
          <div class="col-12 card">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-credit-card"></i> Invoice
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Homeschool Robotics University</strong><br>
                    Kiambu County in Thika Town<br>
                   Along Magoko Road<br>
                    Phone:  0723273081<br>
                    Email: finance@hru.co.ke
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$result['student'][0]['first_name']}} {{$result['student'][0]['middle_name']}} {{$result['student'][0]['last_name']}}</strong><br>
                    Course: {{$result['student'][0]['course']}}<br>
                    Level: {{$result['student'][0]['level']}} graduate<br>
                    Phone: {{$result['student'][0]['phone_number']}}<br>
                    Email: {{$result['student'][0]['email']}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>@php date('y/d/m') @endphp</b><br>
                  <br>
                  <b>Order ID:</b> {{$result['order'][0]['order_id']}}<br>
                  <b>Payment Due:</b> {{$result['order'][0]['created_at']}}<br>
                  <b>Status:</b> 
                  @if($result['invoice'][0]['status'] === '1')
                  <span class="badge bg-success">Paid</span>
                  @elseif($result['invoice'][0]['status'] === '0')
                  <span class="badge bg-warning">Pending</span>
                  @endif
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Item</th>
                      <th>Description</th>
                      <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $subtotal = 0; $total = 0; @endphp
                    @if(count($result['item']) > 0)
                    @foreach($result['item'] as $item)
                    @php $item_total = $item['amount'] *= $item['quantity'] @endphp
                    <tr>
                      <td>{{$item['product']}}</td>
                      <td>{{$item['quantity']}}</td>
                      <td>{{$item['amount']}}</td>
                    </tr>

                    @php $subtotal += $item_total @endphp
                    @endforeach
                    @endif

                    @if(count($result['invoice']) > 0)
                    @foreach($result['invoice'] as $item)
                    <tr>
                      <td>Tution Fee</td>
                      <td>{{$result['student'][0]['level']}} in {{$result['student'][0]['course']}}</td>
                      <td>{{$item['amount']}}</td>
                    </tr>
                    @php 
                    $invoice_total =+ $item['amount'];
                    $total = $subtotal+$invoice_total;
                    @endphp
                    @endforeach
                    @endif
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="" alt="M-Pesa">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Money paid to Homeschool Robotics University is billed by Homeschool Robotics Technical Training Institute <b class="text-primary">H . R . T . T . I</b>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Powered by <b class="text-primary">H . R . T . T . I</b></p>

                  <div class="table-responsive">
                    @php $ap = 0; @endphp
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>@php echo number_format($total, 2); @endphp</td>
                      </tr>
                      <tr>
                        <th>Amount Paid: </th>
                        <td>
                          <span class="text-success">
                            @if(count($result['transaction']) > 0)
                            @foreach($result['transaction'] as $item)
                            @php $ap += $item['amount']; echo number_format($ap, 2); @endphp
                            @endforeach
                            @else
                            @php echo number_format($ap, 2); @endphp
                            @endif
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <th>Pending Balance:</th>
                        <td>
                          <span class="text-danger">
                            @php
                              $pb = $total - $ap;
                              echo number_format($pb, 2);
                            @endphp
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <th>Total Billable:</th>
                        <td>
                          <span class="badge bg-secondary text-lg">
                            @php echo number_format($total, 2); @endphp
                          </span>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <!-- <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div> -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection