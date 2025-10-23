@extends('admin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>GST Bills</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('_message')

        <div class="row">
          <div class="col-md-12">

          <div class="card">
            <div class="card-header">
              <h1 class="card-title">Search GST Bills</h1>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-1">
                    <label>ID</label>
                    <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="Enter ID" >
                  </div>
                   <div class="form-group col-md-3">
                    <label>Parties Type Name</label>
                    <input type="text" name="parties_type_name" value="{{ Request()->parties_type_name }}" class="form-control" placeholder="Enter Parties Type Name" >
                  </div>
                  <div class="form-group col-md-2">
                    <label>Invoice Date</label>
                    <input type="date" name="invoice_date" value="{{ Request()->invoice_date }}" class="form-control">
                  </div>

                  <div class="form-group col-md-3">
                    <label>Invoice No</label>
                    <input type="text" name="invoice_no" value="{{ Request()->invoice_no }}" class="form-control" placeholder="Enter Invoice No" >
                  </div>

                   <div class="form-group col-md-3">
                    <label>Total Amount</label>
                    <input type="text" name="total_amount" value="{{ Request()->total_amount }}" class="form-control" placeholder="Enter Total Amount" >
                  </div>
                  <div style="clear:both;"></div>
                  <br>
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Search</button>
                    <a href="{{ url('admin/gst_bills') }}" class="btn btn-danger">Reset</a>
                  </div>
                </div>
                </div>
            </form>
          </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">GST Bills List</h3>            
                <a href="{{ url('admin/gst_bills/add') }}" class="btn btn-primary float-right">Add New GST Bills</a>
                <a href="{{ url('admin/gst_bills/pdf-download') }}" class="btn btn-default mr-2 float-right">Generate PDF</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Parties Type Name</th>
                      <th>Invoice Date</th>
                      <th>Invoice No</th>
                      <th>Total Amount</th>
                      <th>Tax Amount</th>
                      <th>Net Amount</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $totalAmount = 0;
                    @endphp

                  @forelse($getRecord as $value)

                  @php
                    $totalAmount = $totalAmount + $value->total_amount;
                    @endphp

                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->parties_type_name  }}</td>
                      <td>{{ date('d-m-Y', strtotime($value->invoice_date)) }}</td>
                    <td>{{ $value->invoice_no  }}</td>
                    <td>Rs.{{ $value->total_amount  }}</td>
                     <td>{{ $value->tax_amount  }}</td>
                     <td>{{ $value->net_amount  }}</td>
                      <td>
                        <a href="{{ url('admin/gst_bills/pdf_single_row_download/'.$value->id) }}" class="btn btn-secondary mr-1"><i class="fas fa-file-pdf"></i></a>
                        <a href="{{ url('admin/gst_bills/view/'.$value->id) }}" class="btn btn-primary mr-1"><i class="fas fa-eye"></i></a>
                       <a href="{{ url('admin/gst_bills/edit/'.$value->id) }}" class="btn btn-info mr-1"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ url('admin/gst_bills/delete/'.$value->id) }}" class="btn btn-danger mr-1" onclick="return confirm('Are you sure you want to delete?');"><i class="fas fa-trash"></i></a>
                        
                      </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="100%">Record Not Found.</td>
                    </tr>
                    @endforelse

                    @if(!empty($totalAmount))
                    <tr>
                        <th colspan ="4">Total (Rs)</th>
                        <td>Rs. {{ number_format($totalAmount, 2) }}</td>
                        <th colspan="3"></th>
                    </tr>

                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                </ul>
              </div>
            </div>      
          </div>
        </div>
       </div>
    </section>
    </div>
@endsection
