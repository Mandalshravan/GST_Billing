@extends('admin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parties</h1>
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
              <h1 class="card-title">Search Parties</h1>
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
                  <div class="form-group col-md-3">
                    <label>Full Name</label>
                    <input type="text" name="full_name" value="{{ Request()->full_name }}" class="form-control" placeholder="Enter Full Name" >
                  </div>

                  <div class="form-group col-md-3">
                    <label>Phone No</label>
                    <input type="text" name="phone_no" value="{{ Request()->phone_no }}" class="form-control" placeholder="Enter Phone No" >
                  </div>

                   <div class="form-group col-md-2">
                    <label>Created At</label>
                    <input type="date" name="created_at" value="{{ Request()->created_at }}" class="form-control" >
                  </div>
                  

                  <div style="clear:both;"></div>
                  <br>
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Search</button>
                    <a href="{{ url('admin/parties') }}" class="btn btn-danger">Reset</a>
                  </div>



                </div>
                </div>
            </form>
          </div>


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parties List</h3>
                <a href="{{ url('admin/parties/add') }}" class="btn btn-primary float-right">Add New Parties</a>
                 <a href="{{ url('admin/parties/pdf') }}" class="btn btn-default float-right mr-2">Generate PDF</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Parties Type Name</th>
                      <th>Full Name</th>
                      <th>Phone No.</th>
                      <th>Address</th>
                      <th>Account Holder Name</th>
                      <th>Account Number</th>
                      <th>Bank Name</th>
                      <th>IFSC Code</th>
                      <th>Branch Address</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @forelse($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->parties_type_name  }}</td>
                      <td>{{ $value->full_name  }}</td>
                      <td>{{ $value->phone_no  }}</td>
                      <td>{{ $value->address  }}</td>
                      <td>{{ $value->account_holder_name  }}</td>
                      <td>{{ $value->account_no  }}</td>
                      <td>{{ $value->bank_name  }}</td>
                      <td>{{ $value->ifsc_code  }}</td>
                      <td>{{ $value->branch_address  }}</td>
                      <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                      <td>
                      <a href="{{ url('admin/parties/view/'.$value->id) }}" class="btn btn-primary mr-2 mb-2"><i class="fas fa-eye"></i></a>
                      <a href="{{ url('admin/parties/edit/'.$value->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                      <a href="{{ url('admin/parties/delete/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%">Record Not Found.</td>
                    </tr>
                    @endforelse
                   
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                   {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                   
                </ul>
              </div>
            </div>
           
          </div>
        </div>
       </div>
    </section>
    </div>
@endsection
