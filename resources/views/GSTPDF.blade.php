<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GST Bills PDF</title>
   
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
    <h1> {{ $title }}</h1>
    <p> {{ $date }}</p>

    <p>I'm a Web Developer</p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Parties Type Name</th>
            <th>Invoice Date</th>
            <th>Invoice No</th>
            <th>Item Description</th>
            <th>Total Amount</th>
             <th>CGST Rate</th>
            <th>SGST Rate</th>
            <th>IGST Rate</th>
            
        </tr>
        @foreach($getRecord as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->parties_type_name }}</td>
            <td>{{ date('d-m-Y', strtotime($value->invoice_date)) }}</td>
            <td>{{ $value->invoice_no }}</td>
            <td>{{ $value->item_description }}</td>
            <td>{{ $value->total_amount }}</td>
            <td>{{ $value->cgst_rate }}</td>
            <td>{{ $value->sgst_rate }}</td>
            <td>{{ $value->igst_rate }}</td>
            
        </tr>
        @endforeach
    </table>  
    <br>

      <table class="table table-bordered">
        <tr>
           
            <th>CGST Amount</th>
            <th>SGST Amount</th>
            <th>IGST Amount</th>
            <th>Tax Amount</th>
            <th>Net Amount</th>
            <th>Declaration</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        @foreach($getRecord as $value)
        <tr>
            
            <td>{{ $value->cgst_amount }}</td>
            <td>{{ $value->sgst_amount }}</td>
            <td>{{ $value->igst_amount }}</td>
            <td>{{ $value->tax_amount }}</td>
            <td>{{ $value->net_amount }}</td>
            <td>{{ $value->declaration }}</td>
            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
            <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
        </tr>
        @endforeach
    </table>  
</body>
</html> 