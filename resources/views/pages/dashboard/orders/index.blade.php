@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Orderan</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body d-flex flex-column w-100">
                    <table class="table table-striped nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Invoice</th>
                                <th>Produk</th>
                                @can('act-as-admin')
                                    <th>Pengguna</th>
                                @endcan
                                <th>Status</th>
                                <th>Metode Pembayaran</th>
                                <th>Total Yang Harus Dibayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td><a href="/dashboard/orders/{{ $order->id }}">{{ $order->invoice }}</a></td>
                                    <td>{{ $order->product->name }}</td>
                                    @can('act-as-admin')
                                        <td>{{ $order->customer->name }}</td>
                                    @endcan
                                    <td
                                        class="fw-medium {{ $order->status == 'PAID' ? 'text-success' : ($order->status == 'CANCELED' ? 'text-danger' : 'text-warning') }}">
                                        {{ translateStatus($order->status) }}</td>
                                    <td>{{ $order->payment_method == 'BANK_TRANSFER' ? 'Bank Transfer' : 'Virtual Account' }}
                                    </td>
                                    <td>Rp {{ number_format($order->final_price, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="module">
        setTimeout(function() {
            $('.table').DataTable({
                lengthChange: false,
                responsive: true
            })
        }, 250)
    </script>
@endsection
