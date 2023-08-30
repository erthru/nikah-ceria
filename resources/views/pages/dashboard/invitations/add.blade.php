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
                            <div class="d-flex flex-column flex-md-row row-gap-2 row-gap-md-0 column-gap-md-2 w-100 mb-2">
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
                                    <p style="font-size: 14px; margin-top: 4px;">Beli template lain <a
                                            href="/dashboard/invitations/templates" class="fw-medium">di sini</a></p>
                                </div>
                                <div class="w-100">
                                    <label class="form-label">Nama</label>
                                    <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                        placeholder="Cth: Romeo & Juliet Wedding" required />
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-body" style="background-color: #f4f4f4">
                        <p class="fw-medium fs-5">Data Pengantin</p>
                        <div class="d-flex flex-column flex-md-row row-gap-1 column-gap-3 mt-2">
                            <div class="w-100">
                                <div class="mb-2">
                                    <label class="form-label">Nama Pengantin Pria</label>
                                    <input value="{{ old('male_name') }}" type="text" class="form-control"
                                        name="male_name" placeholder="Masukkan Nama Pengantin Pria" required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Nama Ayah Pengantin Pria</label>
                                    <input value="{{ old('male_father_name') }}" type="text" class="form-control"
                                        name="male_father_name" placeholder="Masukkan Nama Ayah Pengantin Pria" required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Nama Ibu Pengantin Pria</label>
                                    <input value="{{ old('male_mother_name') }}" type="text" class="form-control"
                                        name="male_mother_name" placeholder="Masukkan Nama Ibu Pengantin Pria" required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Anak Keberapa Di Keluarga (Pengantin Pria)</label>
                                    <input value="{{ old('male_family_order') }}" type="number" class="form-control"
                                        name="male_family_order" placeholder="Cth: 1" required />
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="mb-2">
                                    <label class="form-label">Nama Pengantin Wanita</label>
                                    <input value="{{ old('female_name') }}" type="text" class="form-control"
                                        name="female_name" placeholder="Masukkan Nama Pengantin Wanita" required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Nama Ayah Pengantin Wanita</label>
                                    <input value="{{ old('female_father_name') }}" type="text" class="form-control"
                                        name="female_father_name" placeholder="Masukkan Nama Ayah Pengantin Wanita"
                                        required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Nama Ibu Pengantin Wanita</label>
                                    <input value="{{ old('female_mother_name') }}" type="text" class="form-control"
                                        name="female_mother_name" placeholder="Masukkan Nama Ibu Pengantin Wanita"
                                        required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Anak Keberapa Di Keluarga (Pengantin Wanita)</label>
                                    <input value="{{ old('female_family_order') }}" type="number" class="form-control"
                                        name="female_family_order" placeholder="Cth: 1" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="fw-medium fs-5">Foto Pengantin</p>
                        <div class="mt-2 d-flex flex-column flex-md-row row-gap-3 column-gap-2">
                            <div class="w-100">
                                <label class="form-label">Upload Foto Pengantin Pria</label>
                                <img id="malePhotoPreview" src="#" alt="male-photo" class="d-none rounded"
                                    style="width: 200px; height: 200px; object-fit: cover; margin-bottom: 16px;" />
                                <input type="file" class="form-control" name="male_photo"
                                    accept=".jpg,.jpeg,.png,.webp,.git" required onchange="onMalePhotoChange(this)" />
                                <p style="font-size: 14px; margin-top: 4px">Max size: 2 MB</p>
                            </div>
                            <div class="w-100">
                                <label class="form-label">Upload Foto Pengantin Wanita</label>
                                <img id="femalePhotoPreview" src="#" alt="female-photo" class="d-none rounded"
                                    style="width: 200px; height: 200px; object-fit: cover; margin-bottom: 16px;" />
                                <input type="file" class="form-control" name="female_photo"
                                    accept=".jpg,.jpeg,.png,.webp,.git" required onchange="onFemalePhotoChange(this)" />
                                <p style="font-size: 14px; margin-top: 4px">Max size: 2 MB</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="module">
        const malePhotoPreview = $('#malePhotoPreview')
        const femalePhotoPreview = $('#femalePhotoPreview')

        window.onMalePhotoChange = function(e) {
            const file = e.files[0]
            malePhotoPreview.attr('src', URL.createObjectURL(file))
            malePhotoPreview.removeClass('d-none')
            malePhotoPreview.addClass('d-block')
        }

        window.onFemalePhotoChange = function(e) {
            const file = e.files[0]
            femalePhotoPreview.attr('src', URL.createObjectURL(file))
            femalePhotoPreview.removeClass('d-none')
            femalePhotoPreview.addClass('d-block')
        }
    </script>
@endsection
