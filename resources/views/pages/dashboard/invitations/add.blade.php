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
                                    <input value="{{ old('name') ? old('name') : $tempName }}" type="text"
                                        class="form-control" name="name" placeholder="Masukkan Nama" required />
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
                                    <input value="{{ old('male_name') ? old('male_name') : $tempMaleName }}" type="text"
                                        class="form-control" name="male_name" placeholder="Masukkan Nama Pengantin Pria"
                                        required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Nama Ayah Pengantin Pria</label>
                                    <input
                                        value="{{ old('male_father_name') ? old('male_father_name') : $tempMaleFatherName }}"
                                        type="text" class="form-control" name="male_father_name"
                                        placeholder="Masukkan Nama Ayah Pengantin Pria" required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Nama Ibu Pengantin Pria</label>
                                    <input
                                        value="{{ old('male_mother_name') ? old('male_mother_name') : $tempMaleMotherName }}"
                                        type="text" class="form-control" name="male_mother_name"
                                        placeholder="Masukkan Nama Ibu Pengantin Pria" required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Anak Keberapa Dari Bersaudara (Pria)</label>
                                    <input
                                        value="{{ old('male_family_order') ? old('male_family_order') : $tempMaleFamilyOrder }}"
                                        type="text" class="form-control" name="male_family_order" placeholder="Cth: 1"
                                        required />
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="mb-2">
                                    <label class="form-label">Nama Pengantin Wanita</label>
                                    <input value="{{ old('female_name') ? old('female_name') : $tempFemaleName }}"
                                        type="text" class="form-control" name="female_name"
                                        placeholder="Masukkan Nama Pengantin Wanita" required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Nama Ayah Pengantin Wanita</label>
                                    <input
                                        value="{{ old('female_father_name') ? old('female_father_name') : $tempFemaleFatherName }}"
                                        type="text" class="form-control" name="female_father_name"
                                        placeholder="Masukkan Nama Ayah Pengantin Wanita" required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Nama Ibu Pengantin Wanita</label>
                                    <input
                                        value="{{ old('female_mother_name') ? old('female_mother_name') : $tempFemaleMotherName }}"
                                        type="text" class="form-control" name="female_mother_name"
                                        placeholder="Masukkan Nama Ibu Pengantin Wanita" required />
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Anak Keberapa Dari Bersaudara (Wanita)</label>
                                    <input
                                        value="{{ old('female_family_order') ? old('female_family_order') : $tempFemaleFamilyOrder }}"
                                        type="text" class="form-control" name="female_family_order" placeholder="Cth: 1"
                                        required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="fw-medium fs-5">Foto Pengantin</p>
                        <div class="mt-2 d-flex row-gap-3 column-gap-2">
                            <div class="w-100"></div>
                            <div class="w-100"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
