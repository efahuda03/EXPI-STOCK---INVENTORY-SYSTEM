<!DOCTYPE html>
<html>
<head>
    <title>Inventory Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>{{ $title }}</h2>
        <p>Generated at: {{ $date }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Category</th>
                <th>Total Batches</th>
                <th>Total Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listProductBatch as $key => $product)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->category_name }}</td>
                <td>{{ $product->total_batches }}</td>
                <td>{{ $product->total_quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>