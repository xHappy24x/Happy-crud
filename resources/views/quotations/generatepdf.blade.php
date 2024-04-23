<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>RFQ#: </h2>
    <h2>Quotation date: </h2>
    <br>
    <br>
    <br>
    <p>Dear Ma'am/Sir</p>
    <p>We are pleased to submit our quotation for the case mentioned below for your kind consideration</p>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>RFQ #</th>
                <th>Quotations Date</th>
                <th>Supplier Details</th>
                <th>Business Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach($quotations as $rs)
                    <tr>
                        <td class="align-middle">{{ $rs->rfq }}</td>
                        <td class="align-middle">{{ $rs->q_date }}</td>
                        <td class="align-middle">{{ $rs->s_detail }}</td>
                        <td class="align-middle">{{ $rs->clients->b_name }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</body>
</html>