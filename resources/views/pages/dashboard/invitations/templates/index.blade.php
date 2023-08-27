@inject('carbon', 'Carbon\Carbon')
@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/invitations">Undangan</a></li>
                    <li class="breadcrumb-item active">Template</li>
                </ol>
            </nav>
            <div class="d-flex flex-wrap w-100 gap-3">
                @foreach ($products as $product)
                    <div class="card">
                        <img src="/uploads/{{ $product->thumbnail }}" class="card-img-top" alt="product"
                            style="object-fit: cover; height: 200px" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="d-flex">
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
                            <p class="card-text mt-2"
                                style="overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical;">
                                {{ $product->description }}</p>
                            <a href="/dashboard/invitations/templates/{{ $product->code }}"
                                class="btn btn-primary mt-3 text-white select-button">Pilih Template</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .card {
            width: 100%;
        }

        .select-button {
            width: 100%;
        }

        @media (min-width: 768px) {
            .card {
                width: calc(50% - 8px);
            }

            .select-button {
                width: auto
            }
        }

        @media (min-width: 992px) {
            .card {
                width: calc(33.33% - 11px)
            }
        }
    </style>
@endsection
