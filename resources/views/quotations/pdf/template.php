<!DOCTYPE html>
<html>
<head>
    <title>Quotation PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <p>hfdjsfjkfhskjfhsfhfsfsfk</p>
    <br>
<<table class="table table-hover">
        <thead class="table-primary">
            <tr>
                
                <th>RFQ #</th>
                <th>Quotations Date</th>
                <th>Supplier Details</th>
                <th>Servie Slip Number</th>
                <th>Model</th>
                <th>Serial Number</th>
                <th>Business Name</th>
                <th>Product Name</th>
                
            </tr>
        </thead>

        <tbody>
            @foreach($quotations as $rs)
            <tr>
            
                        
                        <td class="align-middle">{{ $rs->rfq }}</td>
                        <td class="align-middle">{{ $rs->q_date }}</td>
                        <td class="align-middle">{{ $rs->s_detail }}</td>
                        <td class="align-middle">{{ $rs->ss_number }}</td>
                        <td class="align-middle">{{ $rs->model }}</td>
                        <td class="align-middle">{{ $rs->s_number }}</td>
                        <td class="align-middle">{{ $rs->clients->b_name}}</td>
                        <td class="align-middle">{{ $rs->products->p_name}}</td>
           
            </tr>
            @endforeach
        </tbody>
</body>
</html>