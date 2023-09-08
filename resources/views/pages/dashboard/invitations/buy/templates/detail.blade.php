@inject('carbon', 'Carbon\Carbon')
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
            <div
                class="d-flex w-100 flex-column flex-lg-row row-gap-3 row-gap-lg-0 column-gap-lg-3 {{ $isProductPurchased ? 'mt-3' : '' }}">
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
                            <p>{{ $product->description }}</p>
                            <a href="{{ $product->demo_url }}" target="blank" style="fw-medium">Lihat Demo</a>
                        </div>
                    </div>
                </div>
                <div class="price">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="margin-top: -4px">{{ $product->name }}</h4>
                            <div class="d-flex mt-2">
                                <p class="fw-medium {{ $product->price == 0 ? 'text-success' : ($product->price > 0 && $product->discount > 0 && $carbon::now()->lte(reverseFormatedDate($product->discount_expires_at)) ? 'text-danger' : '') }}"
                                    style="font-size: 14px; margin-top: -8px; text-decoration: {{ $product->price > 0 && $product->discount > 0 && $carbon::now()->lte(reverseFormatedDate($product->discount_expires_at)) ? 'line-through' : '' }}">
                                    {{ $product->price == 0 ? 'Gratis' : 'Rp ' . number_format($product->price, 0, ',', '.') }}
                                </p>
                                @if (
                                    $product->price > 0 &&
                                        $product->discount > 0 &&
                                        $carbon::now()->lte(reverseFormatedDate($product->discount_expires_at)))
                                    <p class="fw-medium ms-1" style="font-size: 14px; margin-top: -8px;">
                                        Rp {{ number_format($product->price - $product->discount, 0, ',', '.') }}
                                    </p>
                                @endif
                            </div>
                            @if (
                                $product->price > 0 &&
                                    $product->discount > 0 &&
                                    $carbon::now()->lte(reverseFormatedDate($product->discount_expires_at)))
                                <p style="font-size: 14px;">
                                    *Diskon akan berakhir pada
                                    {{ str_replace(' 00:00:00', '', $product->discount_expires_at) }}
                                </p>
                            @endif
                            @if (!$isProductPurchased)
                                <form action="/dashboard/invitations/templates/{{ $product->id }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->customer->id }}" name="customer_id" />
                                    @if ($product->price > 0)
                                        <div class="mb-2 mt-2">
                                            <label class="form-label">Metode Pembayaran</label>
                                            <select name="payment_method" class="form-select">
                                                <option value="BANK_TRANSFER">Bank Transfer</option>
                                            </select>
                                        </div>
                                    @endif
                                    <button class="btn btn-primary mt-3 text-white w-100">Beli</button>
                                </form>
                            @endif
                        </div>
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
                width: 300px;
            }
        }
    </style>
@endsection
