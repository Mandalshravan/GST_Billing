<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 9 PDF Generate</title>
   
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
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        @foreach($parties as $value)
        <tr>
          <td>{{ $value->id }}</td>
            <td>{{ $value->parties_type_name  }}</td>
            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
            <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
        </tr>
        @endforeach
    </table>  
</body>
</html>