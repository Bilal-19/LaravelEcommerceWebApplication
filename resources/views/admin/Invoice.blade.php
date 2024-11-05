<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        table {
            width: 100%;
        }

        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
        }
    </style>
</head>

<body>

    <h2>CUSTOMER DETAILS: </h2>
    <table>
        <tr>
            <th>Customer Name</th>
            <td>{{ $findOrder->name }}</td>
        </tr>

        <tr>
            <th>Customer Address</th>
            <td>{{ $findOrder->receiving_address }}</td>
        </tr>

        <tr>
            <th>Customer Phone No</th>
            <td>{{ $findOrder->phone }}</td>
        </tr>
    </table>

    <h2>PRODUCT DETAILS: </h2>
    <table>
        <tr>
            <th>Product Title</th>
            <td>{{ $findOrder->product->title }}</td>
        </tr>

        <tr>
            <th>Product Price</th>
            <td>{{ $findOrder->product->price }}</td>
        </tr>

        <tr>
            <th>Product Image Preview</th>
            <td>
                <img src="{{ asset('products/'.$findOrder->product->image) }}" alt="..."
                    style="height: 100px; width: 100px; object-fit:cover; border-radius:50%;">
            </td>
        </tr>
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</html>

</body>
