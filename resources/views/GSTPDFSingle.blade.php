<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GST ROWS Bills PDF</title>
   
</head>
 <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #333;
        padding: 8px;
        text-align: left;
    }
    th {
        background: #eee;
    }
</style>
<body>
   
    <h1> GST Bills Record</h1>
    <p>I'm a Web Developer</p>

    <table class="table table-bordered">
      <p>ID :- {{ $getRecordRow->id }} </p>
      <p>Parties Type Name :- {{ $getRecordRow->get_parties_type_name->parties_type_name }} </p>
      <p>Invoice Date :- {{ date('d-m-Y', strtotime($getRecordRow->invoice_date )) }} </p>
      <p>Invoice No :- {{ $getRecordRow->invoice_no }} </p>
      <p>Item Description :- {{ $getRecordRow->item_description }} </p>
      <p>Total Amount :- {{ $getRecordRow->total_amount }} </p>
      <p>CGST Rate :- {{ $getRecordRow->cgst_rate }} </p>
      <p>SGST Rate :- {{ $getRecordRow->sgst_rate }} </p>
      <p>IGST Rate :- {{ $getRecordRow->igst_rate }} </p>
      <p>CGST Amount :- {{ $getRecordRow->cgst_amount }} </p>
      <p>SGST Amount :- {{ $getRecordRow->sgst_amount }} </p>
      <p>IGST Amount :- {{ $getRecordRow->igst_amount }} </p>
      <p>Tax Amount :- {{ $getRecordRow->tax_amount }} </p>
      <p>Net Amount :- {{ $getRecordRow->net_amount }} </p>
      <p>Declaration :- {{ $getRecordRow->declaration }} </p>
      <p>Created At :- {{ date('d-m-Y', strtotime($getRecordRow->created_at )) }} </p>
      <p>Updated At :- {{ date('d-m-Y', strtotime($getRecordRow->updated_at )) }} </p>
    </table>

</body>
</html> 