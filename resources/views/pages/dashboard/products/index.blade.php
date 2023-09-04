@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Produk</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body d-flex flex-column w-100">
                    <a href="/dashboard/products/add" class="btn btn-primary text-white mx-auto mx-md-0 button-add"
                        style="width: max-content; z-index: 20;">
                        <i class="bi bi-pencil-square"></i>
                        <span>Tambah</span>
                    </a>
                    <table class="table table-striped nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Tgl Berakhir Diskon</th>
                                <th>Status</th>
                                <th>Thumbnail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td><a href="/dashboard/products/{{ $product->id }}">{{ $product->name }}</a></td>
                                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>Rp
                                        {{ $product->discount ? number_format($product->discount, 0, ',', '.') : '0' }}
                                    </td>
                                    <td>{{ $product->discount_expires_at ? str_replace('00:00:00', '', $product->discount_expires_at) : '-' }}
                                    </td>
                                    <td>{{ $product->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                                    <td>
                                        <img src="/uploads/{{ $product->thumbnail }}" alt="thumbnail" class="rounded"
                                            style="width: 80px; height: 80px; object-fit: cover;" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .button-add {
            margin-bottom: 16px;
        }

        @media (min-width: 768px) {
            .button-add {
                margin-bottom: -30px
            }
        }
    </style>
@endsection

@section('script')
    <script>
        setTimeout(function() {
            $('.table').DataTable({
                lengthChange: false,
                responsive: true
            })
        }, 250);
    </script>
@endsection
