@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/products">Produk</a></li>
                    <li class="breadcrumb-item active">Tambah Produk</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <form action="/dashboard/products/add" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-column flex-md-row row-gap-2 row-gap-md-0 column-gap-md-2 w-100 mb-2">
                            <div class="w-100">
                                <label class="form-label">Kode</label>
                                <input value="{{ old('code') }}" type="text" class="form-control" name="code"
                                    placeholder="Masukkan Kode" required />
                            </div>
                            <div class="w-100">
                                <label class="form-label">Nama</label>
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                    placeholder="Masukkan Nama" required />
                            </div>
                        </div>
                        <div class="w-100 mb-2">
                            <label class="form-label">Deskripsi (Opsional)</label>
                            <textarea type="text" class="form-control" name="description" placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
                        </div>
                        <div class="d-flex flex-column flex-md-row row-gap-2 row-gap-md-0 column-gap-md-2 w-100 mb-2">
                            <div class="w-100">
                                <label class="form-label">Harga</label>
                                <input value="{{ old('price') }}" type="number" class="form-control" name="price"
                                    placeholder="Masukkan Harga" required />
                            </div>
                            <div class="w-100">
                                <label class="form-label">Diskon (Opsional)</label>
                                <input value="{{ old('discount') }}" type="number" class="form-control" name="discount"
                                    placeholder="Masukkan Diskon" />
                            </div>
                            <div class="w-100">
                                <label class="form-label">Diskon Berakhir Pada (Opsional)</label>
                                <input value="{{ old('discount_expires_at') }}" type="date" class="form-control"
                                    name="discount_expires_at" placeholder="Masukkan Diskon" />
                            </div>
                        </div>
                        <div class="w-100 mb-2">
                            <label class="form-label">Thumbnail</label>
                            <img id="thumbnailPreview" src="#" alt="thumbnail" class="d-none"
                                style="width: 200px; height: 200px; object-fit: cover; margin-bottom: 16px;" />
                            <input id="thumbnail" type="file" class="form-control" name="thumbnail"
                                accept=".jpg,.jpeg,.png,.webp,.git" required onchange="onThumbnailChange(this)" />
                            <p style="font-size: 14px; margin-top: 4px">Max size: 2 MB</p>
                        </div>
                        <div class="w-100 mb-2">
                            <label class="form-label">Status</label>
                            <select name="is_active" class="form-select" required>
                                <option value="true" {{ old('is_active') == 'true' ? 'selected' : '' }}>Aktif</option>
                                <option value="false" {{ old('is_active') == 'false' ? 'selected' : '' }}>Tidak Aktif
                                </option>
                            </select>
                        </div>
                        <button class="btn btn-primary text-white submit-button mt-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .submit-button {
            width: 100%;
        }

        @media (min-width: 768px) {
            .submit-button {
                width: max-content;
            }
        }
    </style>
@endsection

@section('script')
    <script type="module">
        const thumbnailPreview = $('#thumbnailPreview')
        const thumbnail = $('#thumbnail')

        window.onThumbnailChange = function(e) {
            const file = e.files[0]
            thumbnailPreview.attr('src', URL.createObjectURL(file))
            thumbnailPreview.removeClass('d-none')
            thumbnailPreview.addClass('d-block')
        }
    </script>
@endsection
