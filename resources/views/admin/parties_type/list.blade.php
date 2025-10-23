@extends('admin.layouts.app')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parties Type</h1>
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
              <h1 class="card-title">Search Parties Type</h1>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-2">
                    <label>ID</label>
                    <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="Enter ID" >
                  </div>
                   <div class="form-group col-md-4">
                    <label>Parties Type Name</label>
                    <input type="text" name="parties_type_name" value="{{ Request()->parties_type_name }}" class="form-control" placeholder="Enter Parties Type Name" >
                  </div>

                   <div class="form-group col-md-3">
                    <label>Created At</label>
                    <input type="date" name="created_at" value="{{ Request()->created_at }}" class="form-control" >
                  </div>
                   <div class="form-group col-md-3">
                    <label>Updated At</label>
                    <input type="date" name="updated_at" value="{{ Request()->updated_at }}" class="form-control" >
                  </div>

                  <div style="clear:both;"></div>
                  <br>
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Search</button>
                    <a href="{{ url('admin/parties_type') }}" class="btn btn-danger">Reset</a>
                  </div>



                </div>
                </div>
            </form>
          </div>


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parties Type List</h3>
                <a href="{{ url('admin/parties_type/add') }}" class="btn btn-primary float-right">Add New Parties Type</a>

                  <a href="{{ url('admin/parties_type/pdf_generator') }}" class="btn btn-default float-right mr-2">Generate PDF</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 40px">Parties Type Name</th>
                      <th style="width: 40px">Created At</th>
                      <th style="width: 40px">Updated At</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->parties_type_name  }}</td>
                      <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                      <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
                      <td>
                       <a href="{{ url('admin/parties_type/edit/'.$value->id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ url('admin/parties_type/delete/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fas fa-trash"></i></a>
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
