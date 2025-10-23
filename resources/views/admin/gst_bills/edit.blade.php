@extends('admin.layouts.app')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit GST Bills</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">

         <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit GST Bills</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ url('admin/gst_bills/edit/'.$getRecord->id) }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Parties Type Name<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <select name="parties_type_id" class="form-control" required>
                            <option value="">Select Parties Type Name</option>
                            @forelse($getPartiesType as $value)
                            <option {{ ($getRecord->parties_type_id == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->parties_type_name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                  </div>
                
                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Invoice Date<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                      <input type="date" value="{{ $getRecord->invoice_date }}" name="invoice_date" class="form-control" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Invoice No<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" value="{{ $getRecord->invoice_no }}" name="invoice_no" class="form-control"  placeholder="Invoice No" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Item Description<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <textarea name ="item_description" class="form-control" placeholder="Item Description" required>{{ $getRecord->item_description }}</textarea>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Total Amount<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" value="{{ $getRecord->total_amount }}" name="total_amount" class="form-control"  placeholder="Total Amount" required>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">CGST Rate<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" value="{{ $getRecord->cgst_rate }}" name="cgst_rate" class="form-control"  placeholder="CGST Rate" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">SGST Rate<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" value="{{ $getRecord->sgst_rate }}" name="sgst_rate" class="form-control"  placeholder="SGST Rate" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">IGST Rate<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" value="{{ $getRecord->igst_rate }}" name="igst_rate" class="form-control"  placeholder="IGST Rate" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">CGST Amount<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" value="{{ $getRecord->cgst_amount }}" name="cgst_amount" class="form-control"  placeholder="CGST Amount" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">SGST Amount<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" value="{{ $getRecord->sgst_amount }}" name="sgst_amount" class="form-control"  placeholder="SGST Amount" required>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">IGST Amount<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" value="{{ $getRecord->igst_amount }}" name="igst_amount" class="form-control"  placeholder="IGST Amount" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Tax Amount<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" value="{{ $getRecord->tax_amount }}" name="tax_amount" class="form-control"  placeholder="Tax Amount" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Net Amount<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" value="{{ $getRecord->net_amount }}" name="net_amount" class="form-control"  placeholder="Net Amount" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Declaration<span style="color:red;">*</span></label>
                    <div class="col-sm-8">
                        <textarea name ="declaration" class="form-control" placeholder="Declaration" required> {{ $getRecord->declaration }}</textarea>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                  <a href="{{ url('admin/gst_bills') }}" class="btn btn-default float-right">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>

        </div>
</div>
</div>

</div>
@endsection