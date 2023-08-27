@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/invitations">Undangan</a></li>
                    <li class="breadcrumb-item active">Tambah Undangan</li>
                </ol>
            </nav>
            <div class="card">
                <form action="/dashboard/invitations/add" method="POST">
                    @csrf
                    <div class="card-body">
                        @if (count($products) == 0)
                            <div class="alert alert-warning">
                                Kamu belum memiliki template, silahkan beli template <a
                                    href="/dashboard/invitations/templates" class="fw-medium">di sini</a> (tersedia banyak
                                template
                                gratis)
                            </div>
                        @else
                            <div
                                class="d-flex flex-column flex-md-row row-gap-2 row-gap-md-0 column-gap-md-2 w-100 mb-2 mt-3">
                                <div class="w-100">
                                    <label class="form-label">Template</label>
                                    <select name="product_id" class="form-select" required>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ $product->id == old('product_id') ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p style="font-size: 14px; margin-top: 4px;">Beli template lain di sini</p>
                                </div>
                                <div class="w-100">
                                    <label class="form-label">Nama</label>
                                    <input value="{{ old('name') ? old('name') : $tempName }}" type="text"
                                        class="form-control" name="name" placeholder="Masukkan Nama" required />
                                </div>
                                <div class="w-100">
                                    <label class="form-label">Slug</label>
                                    <input value="{{ old('slug') ? old('slug') : $tempSlug }}" type="text"
                                        class="form-control" name="slug" placeholder="Masukkan Slug" required />
                                    <p style="font-size: 14px; margin-top: 4px;">Dapat diakses nanti di: <a href="#"
                                            target="blank" class="fw-medium"></a></p>
                                </div>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
