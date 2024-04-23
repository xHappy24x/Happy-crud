@extends('layouts.app')
  
@section('title', 'Quotaion Form')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Add Quotation</h1>
        <a href="{{ route('quotations') }}" class="btn btn-primary">Back</a>
    </div>
    <hr />
    <form action="{{ route('quotations.storeq') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <h4>RFQ #</h4>
                <input type="text" name="rfq" class="form-control" placeholder="RFQ #">
            </div>
            <div class="col">
                <h4>Quotation Date</h4>
                <input type="date" name="q_date" class="form-control" placeholder="Quotation Date">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <h4>Supplier Details</h4>
                <input type="text" name="s_detail" class="form-control" placeholder="Supplier Details">
            </div>
            <div class="col">
                <a href="{{ route('clients.createc') }}" class="btn btn-primary">Click here to Add New Client</a>
                <select name= "client_id" class="form-control">
                    @foreach ($clients as $rs)
                        <option value="{{$rs->id}}">{{$rs->b_name}}</option>
                    @endforeach
                </select>
            </div>
            
            
        </div>

        <div class="row mb-3">
            <div class="col">
                <h4>Service Slip Number</h4>
                <input type="text" name="ss_number" class="form-control" placeholder="Service Slip Number">
            </div>
            <div class="col">
                <h4>Model</h4>
                <input type="text" name="model" class="form-control" placeholder="Model">
            </div>
            <div class="col">
                <h4>Serial Number</h4>
                <input type="text" name="s_number" class="form-control" placeholder="Serial Number">
            </div>
        </div>

        <table class="table" id="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="table-body">
        <tr>
            <td>
                <div class="col">
                    <select name="product_id[]" class="form-control product-select">
                        @foreach ($products as $rs)
                            <option value="{{ $rs->id }}" data-price="{{ $rs->price }}">{{ $rs->p_name }}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="input-group qtyBox">
                    <button class="input-group-text decrement">-</button>
                    <input type="text" name="quantity[]" class="qty quantityInput" value="1" />
                    <button class="input-group-text increment">+</button>
                </div>
            </td>
            <td class="price" name="price" value="{{$rs->price}}"> </td>
            <td class="total"> <!-- Display the total price based on quantity here --> </td>
            <td><button type="button" name="add" id="add" class="btn btn-success">Add more</button></td>
        </tr>
    </tbody>
</table>



       
        <div class ="row mb-3">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Function to add a new row
        $("#add").click(function() {
            var html = '';
            html += '<tr>';
            html += '<td>';
            html += '<div class="col">';
            html += '<select name="product_id[]" class="form-control product-select">';
            @foreach ($products as $rs)
                html += '<option value="{{ $rs->id }}" data-price="{{ $rs->price }}">{{ $rs->p_name }}</option>';
            @endforeach
            html += '</select>';
            html += '</div>';
            html += '</td>';
            html += '<td>';
            html += '<div class="input-group qtyBox">';
            html += '<button type="button" class="input-group-text decrement">-</button>';
            html += '<input type="text" name="quantity[]" class="qty quantityInput" value="1" />';
            html += '<button type="button" class="input-group-text increment">+</button>';
            html += '</div>';
            html += '</td>';
            html += '<td class="price">'; // Display the price of the selected product here
            html += '</td>';
            html += '<td class="total">'; // Display the total price based on quantity here
            html += '</td>';
            html += '<td><button type="button" class="btn btn-danger remove">Remove</button></td>';
            html += '</tr>';
            $('#table-body').append(html);
        });

        // Function to remove a row
        $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
        });

        // Function to increment quantity
        $(document).on('click', '.increment', function(e) {
            e.preventDefault(); // Prevent default button behavior
            var inputField = $(this).siblings('.quantityInput');
            var currentValue = parseInt(inputField.val());
            inputField.val(currentValue + 1);
            calculateTotal($(this).closest('tr'));
        });

        // Function to decrement quantity
        $(document).on('click', '.decrement', function(e) {
            e.preventDefault(); // Prevent default button behavior
            var inputField = $(this).siblings('.quantityInput');
            var currentValue = parseInt(inputField.val());
            if (currentValue > 1) {
                inputField.val(currentValue - 1);
                calculateTotal($(this).closest('tr'));
            }
        });

        // Calculate total price
        function calculateTotal(row) {
    var price = parseFloat(row.find('.product-select option:selected').data('price'));
    var quantity = parseInt(row.find('.quantityInput').val());
    var total = price * quantity;
    row.find('.total').text(total.toFixed(2));

    // Format the total price as currency
    var formattedTotal = total.toLocaleString('en-US', { style: 'currency', currency: 'PHP' });

    row.find('.total').text(formattedTotal);
}

        // Calculate total price for existing rows on page load
        $('.product-select').each(function() {
            calculateTotal($(this).closest('tr'));
        });

        // Calculate total price when product selection or quantity changes
        $(document).on('change', '.product-select, .quantityInput', function() {
            calculateTotal($(this).closest('tr'));
        });
    });

    // Calculate total price when product selection changes
    $(document).on('change', '.product-select', function() {
    var row = $(this).closest('tr');
    var selectedOption = $(this).find('option:selected');
    var price = parseFloat(selectedOption.data('price'));
});

// $(document).ready(function() {
//         // Function to calculate and update total price
//         function updateTotalPrice(row) {
//             var price = $(row).find('.product-select option:selected').data('price');
//             var quantity = $(row).find('.quantityInput').val();
//             var total = price * quantity;
//             $(row).find('.total').text(total);
//         }
//     });

</script>



@endsection