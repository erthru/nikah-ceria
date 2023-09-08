@extends('layouts.dashboard')

@section('content')
    <section class="py-1">
        <div class="mx-auto container">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
            <div class="w-100 d-flex gap-3 flex-column flex-md-row">
                <div class="card w-100 bg-primary text-white">
                    <div class="card-body">
                        <p class="fw-bold fs-4">{{ number_format($usersTotal, 0, ',', '.') }}</p>
                        <div class="d-flex align-items-center column-gap-2 mt-2">
                            <i class="bi bi-people fs-5"></i>
                            <span>Pengguna</span>
                        </div>
                    </div>
                </div>
                <div class="card w-100 bg-success text-white">
                    <div class="card-body">
                        <p class="fw-bold fs-4">{{ number_format($productsTotal, 0, ',', '.') }}</p>
                        <div class="d-flex align-items-center column-gap-2 mt-2">
                            <i class="bi bi-box fs-5"></i>
                            <span>Produk</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100 d-flex gap-3 flex-column flex-md-row mt-3">
                <div class="card w-100 bg-warning">
                    <div class="card-body">
                        <p class="fw-bold fs-4">{{ number_format($invitationsTotal, 0, ',', '.') }}</p>
                        <div class="d-flex align-items-center column-gap-2 mt-2">
                            <i class="bi bi-envelope-paper fs-5"></i>
                            <span>Undangan</span>
                        </div>
                    </div>
                </div>
                <div class="card w-100 bg-danger text-white">
                    <div class="card-body">
                        <p class="fw-bold fs-4">{{ number_format($ordersTotal, 0, ',', '.') }}</p>
                        <div class="d-flex align-items-center column-gap-2 mt-2">
                            <i class="bi bi-border-width fs-5"></i>
                            <span>Orderan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
