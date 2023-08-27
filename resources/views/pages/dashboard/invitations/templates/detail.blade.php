@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/invitations">Undangan</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/invitations/templates">Template</a></li>
                    <li class="breadcrumb-item active">Detail Template</li>
                </ol>
            </nav>
            @if ($isProductPurchased)
                <div class="alert alert-success">
                    Kamu telah mempunyai template ini, <a href="/dashboard/invitations/add" class="fw-medium">buat undangan
                        sekarang</a>
                </div>
            @endif
            <div class="d-flex w-100 flex-column flex-lg-row row-gap-3 row-gap-lg-0 column-gap-lg-3">
                <div class="w-100" style="flex: 1 1 0%">
                    <a href="/uploads/{{ $product->thumbnail }}" target="blank">
                        <div class="position-relative">
                            <img src="/uploads/{{ $product->thumbnail }}" alt="product" class="w-100 rounded"
                                style="height: 300px; object-fit: cover;" />
                            <div class="position-absolute rounded w-100 h-100"
                                style="background-color: rgba(0, 0, 0, 0.7); top: 0; left:0; z-index: 20;"></div>
                            <i class="bi bi-eye position-absolute"
                                style="z-index: 30; top: 50%; left: 50%; transform: translate(-50%); font-size: 40px; color: #d3d3d3; margin-top: -20px"></i>
                        </div>
                    </a>
                    <div class="card mt-3">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="price">
                    <div class="card">
                        <div class="card-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
<style>
    .price {
        width: 100%;
    }

    @media(min-width: 992px) {
        .price {
            width: 250px;
        }
    }
</style>
@endsection