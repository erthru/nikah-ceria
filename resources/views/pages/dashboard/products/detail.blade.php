@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/products">Produk</a></li>
                    <li class="breadcrumb-item active">Detail Produk</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <form action="/dashboard/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="d-flex flex-column flex-md-row row-gap-2 row-gap-md-0 column-gap-md-2 w-100 mb-2">
                            <div class="w-100">
                                <label class="form-label">Kode</label>
                                <input value="{{ $product->code }}" type="text" class="form-control" name="code"
                                    placeholder="Masukkan Nama" disabled />
                            </div>
                            <div class="w-100">
                                <label class="form-label">Nama</label>
                                <input value="{{ old('name') ? old('name') : $product->name }}" type="text"
                                    class="form-control" name="name" placeholder="Masukkan Nama" required />
                            </div>
                        </div>
                        <div class="w-100 mb-2">
                            <label class="form-label">Deskripsi (Opsional)</label>
                            <textarea type="text" class="form-control" name="description" placeholder="Masukkan Deskripsi">{{ old('description') ? old('description') : $product->description }}</textarea>
                        </div>
                        <div class="d-flex flex-column flex-md-row row-gap-2 row-gap-md-0 column-gap-md-2 w-100 mb-2">
                            <div class="w-100">
                                <label class="form-label">Harga</label>
                                <input value="{{ old('price') ? old('price') : $product->price }}" type="number"
                                    class="form-control" name="price" placeholder="Masukkan Harga" required />
                            </div>
                            <div class="w-100">
                                <label class="form-label">Diskon (Opsional)</label>
                                <input value="{{ old('discount') ? old('discount') : $product->discount }}" type="number"
                                    class="form-control" name="discount" placeholder="Masukkan Diskon" />
                            </div>
                            <div class="w-100">
                                <label class="form-label">Diskon Berakhir Pada (Opsional)</label>
                                <input
                                    value="{{ old('discount_expires_at') ? old('discount_expires_at') : implode('-', array_reverse(explode('/', str_replace(' 00:00:00', '', $product->discount_expires_at)))) }}"
                                    type="date" class="form-control" name="discount_expires_at"
                                    placeholder="Masukkan Diskon" />
                            </div>
                        </div>
                        <div class="w-100 mb-2">
                            <label class="form-label">Thumbnail</label>
                            <img id="thumbnailPreview"
                                src="{{ $product->thumbnail ? '/uploads/' . $product->thumbnail : '#' }}" alt="thumbnail"
                                class="{{ $product->thumbnail ? 'd-block' : 'd-none' }}"
                                style="width: 200px; height: 200px; object-fit: cover; margin-bottom: 16px;" />
                            <input id="thumbnail" type="file" class="form-control" name="thumbnail"
                                accept=".jpg,.jpeg,.png,.webp,.git" onchange="onThumbnailChange(this)" />
                        </div>
                        <div class="w-100 mb-2">
                            <label class="form-label">Status</label>
                            <select name="is_active" class="form-select" required>
                                <option value="true">Aktif</option>
                                <option value="false">Tidak Aktif</option>
                            </select>
                        </div>
                        <p class="mb-2 text-secondary" style="font-size: 14px;">Terakhir diperbarui pada:
                            {{ $product->updated_at }}</p>
                        <div class="mt-2 d-flex flex-column flex-md-row column-gap-md-2 row-gap-2 row-gap-md-0 w-100">
                            <button class="btn btn-primary text-white action-button">Simpan</button>
                            <button type="button" class="btn btn-danger text-white action-button" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/dashboard/products/{{ $product->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah kamu yakin dengan keputusan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .action-button {
            width: 100%;
        }

        @media (min-width: 768px) {
            .action-button {
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
