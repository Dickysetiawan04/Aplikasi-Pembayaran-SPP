@extends('template')
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Order Saya</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>
        html {
            font-size: 14px;
        }
        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }
        .container {
            max-width: 960px;
        }
        .pricing-header {
            max-width: 700px;
        }
        .card-deck .card {
            min-width: 220px;
        }
        .border-top {
            border-top: 1px solid #e5e5e5;
        }
        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }
        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }
    </style>
</head>

<body>

                        @section('body')
                        <table class="table table-hover table-condensed">
                            <thead class="thead-light">
                                <th scope="col">#</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Status Pembayaran</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>#{{ ++$i }}</td>
                                        <td>{{ number_format($order->total_price, 2, ',', '.') }}</td>
                                        <td>
                                            @if ($order->payment_status == 1)
                                                Menunggu Pembayaran
                                            @elseif ($order->payment_status == 2)
                                                Sudah Dibayar
                                            @elseif ($order->payment_status == 3)
                                                Kadaluarsa
                                            @else
                                                Batal
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-success">
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endsection
</body>

</html>