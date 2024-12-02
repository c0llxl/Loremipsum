<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        h2 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Report</h1>

    <h2>Products</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Origin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->origin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Stocks</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{ $stock->id }}</td>
                    <td>{{ $stock->product->name ?? '-' }}</td>
                    <td>{{ ucfirst($stock->type) }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->source ?? '-' }}</td>
                    <td>{{ $stock->destination ?? '-' }}</td>
                    <td>{{ $stock->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
