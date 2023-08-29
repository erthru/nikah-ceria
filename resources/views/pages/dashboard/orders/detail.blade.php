@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/orders">Orderan</a></li>
                    <li class="breadcrumb-item active">Detail Orderan</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <h4 style="margin-bottom: -4px;">{{ $order->invoice }}</h4>
                </div>
                <div class="card-body" style="background-color: #f4f4f4">
                    <p class="fw-medium fs-5">Template Yang Dibeli</p>
                    <p class="mt-1 fw-medium">{{ $order->product->name }} (<span class="fw-bold">Rp {{ number_format($order->final_price, 0, ',', '.') }}</span>)</p>
                    <img src="/uploads/{{ $order->product->thumbnail }}" alt="product" class="mt-3 images rounded" />
                </div>
                <div class="card-body">
                    <p class="fw-medium fs-5">Pembeli</p>
                    <p class="mt-1 fw-medium">{{ $order->customer->name }}</p>
                </div>
                <div class="card-body" style="background-color: #f4f4f4">
                    <p class="fw-medium fs-5">Status</p>
                    @if (Auth::user()->role == 'CUSTOMER')
                        <p
                            class="fw-medium {{ $order->status == 'PAID' ? 'text-success' : ($order->status == 'CANCELED' ? 'text-danger' : 'text-warning') }}">
                            {{ translateStatus($order->status) }}</p>
                        @if ($order->status == 'UNPAID')
                            <p style="font-size: 14px;">*Abaikan jika sudah melakukan transfer</p>
                        @endif
                    @else
                        <form action="/dashboard/orders/{{ $order->id }}?ca=changeStatus" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-2 mt-1">
                                <label class="form-label">Ganti Status</label>
                                <select name="status" class="form-select">
                                    <option value="PAID" {{ $order->status == 'PAID' ? 'selected' : '' }}>Telah Dibayar
                                    </option>
                                    <option value="UNPAID" {{ $order->status == 'UNPAID' ? 'selected' : '' }}>Menunggu
                                        Pembayaran</option>
                                    <option value="CANCELED" {{ $order->status == 'CANCELED' ? 'selected' : '' }}>Dibatalkan
                                    </option>
                                </select>
                            </div>
                            <button class="mt-2 btn btn-primary text-white action-button">Simpan</button>
                        </form>
                    @endif
                </div>
                <div class="card-body">
                    <p class="fw-medium fs-5">Bukti Transfer</p>
                    @if ($order->transfer_proof)
                        <img id="savedTransferProof" src="/uploads/{{ $order->transfer_proof }}" alt="transferProof"
                            class="images mt-2 rounded" />
                    @else
                        <p id="noTransferProof">-</p>
                    @endif
                    @if ($order->status == 'UNPAID' && Auth::user()->role == 'CUSTOMER')
                        <form action="/dashboard/orders/{{ $order->id }}?ca=uploadTransferProof"
                            method="POST"
                            enctype="multipart/form-data" class="mt-1">
                            @method("PUT")
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">Upload Bukti Transfer</label>
                                <img id="transferProofPreview" src="#" alt="thumbnail" class="d-none rounded"
                                    style="width: 200px; height: 200px; object-fit: cover; margin-bottom: 16px;" />
                                <input type="file" class="form-control" name="transfer_proof"
                                    accept=".jpg,.jpeg,.png,.webp,.git" required onchange="onTransferProofChange(this)" />
                                <p style="font-size: 14px; margin-top: 4px">Max size: 2 MB</p>
                            </div>
                            <button class="btn btn-primary text-white action-button">Upload</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .action-button {
            width: 100;
        }

        .images {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        @media(min-width: 768px) {
            .action-button {
                width: max-content;
            }

            .images {
                width: 250px;
            }
        }
    </style>
@endsection

@section('script')
    <script type="module">
        const savedTransferProof = $('#savedTransferProof')
        const noTransferProof = $('#noTransferProof')
        const transferProofPreview = $('#transferProofPreview')

        window.onTransferProofChange = function(e) {
            const file = e.files[0]
            transferProofPreview.attr('src', URL.createObjectURL(file))
            transferProofPreview.removeClass('d-none')
            transferProofPreview.addClass('d-block')
            savedTransferProof.hide()
            noTransferProof.hide()
        }
    </script>
@endsection
