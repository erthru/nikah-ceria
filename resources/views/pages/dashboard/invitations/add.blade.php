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
                <form action="/dashboard/invitations/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if (count($products) == 0)
                            <div class="alert alert-warning">
                                Kamu belum memiliki template, silahkan beli template <a
                                    href="/dashboard/invitations/templates" class="fw-medium">di sini</a> (tersedia
                                banyak
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
                                    <p style="font-size: 14px; margin-top: 4px;">Nama tidak dapat diubah setelah disimpan
                                    </p>
                                </div>
                                <div class="w-100">
                                    <label class="form-label">Status</label>
                                    <select name="is_published" class="form-select" required>
                                        <option value="1"
                                            {{ old('is_published') ? (old('is_published') == 1 ? 'selected' : '') : 'selected' }}>
                                            Dipublikasi
                                        </option>
                                        <option value="0"
                                            {{ old('is_published') ? (old('is_published') == 0 ? 'selected' : '') : '' }}>
                                            Draft
                                        </option>
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if (count($products) > 0)
                        <div class="card-body" style="background-color: #f4f4f4">
                            <p class="fw-medium fs-5">Cover / Sampul Halaman</p>
                            <div class="w-100 mt-2">
                                <label class="form-label">Upload Cover / Sampul Halaman</label>
                                <img id="headerPreview" src="#" alt="male-photo" class="d-none rounded"
                                    style="width: 280px; height: 280px; object-fit: cover; margin-bottom: 16px;" />
                                <input type="file" class="form-control" name="header"
                                    accept=".jpg,.jpeg,.png,.webp,.git" required onchange="onHeaderChange(this)" />
                                <p style="font-size: 14px; margin-top: 4px">Max size: 2 MB</p>
                            </div>
                        </div>
                        <div class="card-body">
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
                                            name="male_father_name" placeholder="Masukkan Nama Ayah Pengantin Pria"
                                            required />
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Nama Ibu Pengantin Pria</label>
                                        <input value="{{ old('male_mother_name') }}" type="text" class="form-control"
                                            name="male_mother_name" placeholder="Masukkan Nama Ibu Pengantin Pria"
                                            required />
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
                                        <input value="{{ old('female_father_name') }}" type="text"
                                            class="form-control" name="female_father_name"
                                            placeholder="Masukkan Nama Ayah Pengantin Wanita" required />
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Nama Ibu Pengantin Wanita</label>
                                        <input value="{{ old('female_mother_name') }}" type="text"
                                            class="form-control" name="female_mother_name"
                                            placeholder="Masukkan Nama Ibu Pengantin Wanita" required />
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Anak Keberapa Di Keluarga (Pengantin Wanita)</label>
                                        <input value="{{ old('female_family_order') }}" type="number"
                                            class="form-control" name="female_family_order" placeholder="Cth: 1"
                                            required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="background-color: #f4f4f4">
                            <p class="fw-medium fs-5">Foto Pengantin</p>
                            <div class="mt-2 d-flex flex-column flex-md-row row-gap-3 column-gap-3">
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
                                    <img id="femalePhotoPreview" src="#" alt="female-photo"
                                        class="d-none rounded"
                                        style="width: 200px; height: 200px; object-fit: cover; margin-bottom: 16px;" />
                                    <input type="file" class="form-control" name="female_photo"
                                        accept=".jpg,.jpeg,.png,.webp,.git" required
                                        onchange="onFemalePhotoChange(this)" />
                                    <p style="font-size: 14px; margin-top: 4px">Max size: 2 MB</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium fs-5">Caption</p>
                            <div class="w-100 mb-3 mt-2">
                                <label class="form-label">Caption 1</label>
                                <textarea id="caption1" class="form-control" name="caption_1"
                                    placeholder="Cth: Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir. (QS. Ar-Rum 21)"
                                    required>{{ old('caption_1') }}</textarea>
                                <p class="text-primary fw-medium"
                                    style="margin-top: 4px; font-size: 14px; cursor: pointer;"
                                    onclick="copyToCaption1(true)">
                                    Salin Dari Contoh
                                </p>
                            </div>
                            <div class="w-100">
                                <label class="form-label">Caption 2</label>
                                <textarea id="caption2" class="form-control" name="caption_2"
                                    placeholder="Cth: Maha Suci Allah SWT, Yang telah menciptakan makhlukNya berpasang-pasangan. Ya Allah, perkenankanlah dan Ridhoilah Pernikahan kami"
                                    required>{{ old('caption_2') }}</textarea>
                                <p class="text-primary fw-medium"
                                    style="margin-top: 4px; font-size: 14px; cursor: pointer;"
                                    onclick="copyToCaption2(true)">
                                    Salin Dari Contoh
                                </p>
                            </div>
                        </div>
                        <div class="card-body" style="background-color: #f4f4f4">
                            <p class="fw-medium fs-5">Tambahkan 2 sampai 8 Foto Gallery Bersama Pasangan (Min: 2)</p>
                            <div class="w-100 d-flex align-items-center column-gap-3 mt-3" style="overflow-x: auto">
                                <label for="gallery1" class="rounded d-flex align-items-center"
                                    style="min-height: 100px; min-width: 100px; height: 100px; width: 100px; background-color: rgba(0, 0, 0, 0.1); cursor: pointer">
                                    <i id="gallery1Icon" class="bi bi-plus-circle-dotted mx-auto text-secondary d-block"
                                        style="font-size: 44px"></i>
                                    <img id="gallery1Preview" src="#" class="rounded w-100 h-100 d-none"
                                        alt="gallery" style="object-fit: cover" />
                                    <input id="gallery1" type="file" name="gallery_1"
                                        accept=".jpg,.jpeg,.png,.webp,.git" class="d-none"
                                        onchange="onGallery1Change(this)" required>
                                </label>
                                <label for="gallery2" class="rounded d-flex align-items-center"
                                    style="min-height: 100px; min-width: 100px; height: 100px; width: 100px; background-color: rgba(0, 0, 0, 0.1); cursor: pointer">
                                    <i id="gallery2Icon" class="bi bi-plus-circle-dotted mx-auto text-secondary d-block"
                                        style="font-size: 44px"></i>
                                    <img id="gallery2Preview" src="#" class="rounded w-100 h-100 d-none"
                                        alt="gallery" style="object-fit: cover" />
                                    <input id="gallery2" type="file" name="gallery_2"
                                        accept=".jpg,.jpeg,.png,.webp,.git" class="d-none"
                                        onchange="onGallery2Change(this)" required>
                                </label>
                                <label for="gallery3" class="rounded d-flex align-items-center"
                                    style="min-height: 100px; min-width: 100px; height: 100px; width: 100px; background-color: rgba(0, 0, 0, 0.1); cursor: pointer">
                                    <i id="gallery3Icon" class="bi bi-plus-circle-dotted mx-auto text-secondary d-block"
                                        style="font-size: 44px"></i>
                                    <img id="gallery3Preview" src="#" class="rounded w-100 h-100 d-none"
                                        alt="gallery" style="object-fit: cover" />
                                    <input id="gallery3" type="file" name="gallery_3"
                                        accept=".jpg,.jpeg,.png,.webp,.git" class="d-none"
                                        onchange="onGallery3Change(this)">
                                </label>
                                <label for="gallery4" class="rounded d-flex align-items-center"
                                    style="min-height: 100px; min-width: 100px; height: 100px; width: 100px; background-color: rgba(0, 0, 0, 0.1); cursor: pointer">
                                    <i id="gallery4Icon" class="bi bi-plus-circle-dotted mx-auto text-secondary d-block"
                                        style="font-size: 44px"></i>
                                    <img id="gallery4Preview" src="#" class="rounded w-100 h-100 d-none"
                                        alt="gallery" style="object-fit: cover" />
                                    <input id="gallery4" type="file" name="gallery_4"
                                        accept=".jpg,.jpeg,.png,.webp,.git" class="d-none"
                                        onchange="onGallery4Change(this)">
                                </label>
                                <label for="gallery5" class="rounded d-flex align-items-center"
                                    style="min-height: 100px; min-width: 100px; height: 100px; width: 100px; background-color: rgba(0, 0, 0, 0.1); cursor: pointer">
                                    <i id="gallery5Icon" class="bi bi-plus-circle-dotted mx-auto text-secondary d-block"
                                        style="font-size: 44px"></i>
                                    <img id="gallery5Preview" src="#" class="rounded w-100 h-100 d-none"
                                        alt="gallery" style="object-fit: cover" />
                                    <input id="gallery5" type="file" name="gallery_5"
                                        accept=".jpg,.jpeg,.png,.webp,.git" class="d-none"
                                        onchange="onGallery5Change(this)">
                                </label>
                                <label for="gallery6" class="rounded d-flex align-items-center"
                                    style="min-height: 100px; min-width: 100px; height: 100px; width: 100px; background-color: rgba(0, 0, 0, 0.1); cursor: pointer">
                                    <i id="gallery6Icon" class="bi bi-plus-circle-dotted mx-auto text-secondary d-block"
                                        style="font-size: 44px"></i>
                                    <img id="gallery6Preview" src="#" class="rounded w-100 h-100 d-none"
                                        alt="gallery" style="object-fit: cover" />
                                    <input id="gallery6" type="file" name="gallery_6"
                                        accept=".jpg,.jpeg,.png,.webp,.git" class="d-none"
                                        onchange="onGallery6Change(this)">
                                </label>
                                <label for="gallery7" class="rounded d-flex align-items-center"
                                    style="min-height: 100px; min-width: 100px; height: 100px; width: 100px; background-color: rgba(0, 0, 0, 0.1); cursor: pointer">
                                    <i id="gallery7Icon" class="bi bi-plus-circle-dotted mx-auto text-secondary d-block"
                                        style="font-size: 44px"></i>
                                    <img id="gallery7Preview" src="#" class="rounded w-100 h-100 d-none"
                                        alt="gallery" style="object-fit: cover" />
                                    <input id="gallery7" type="file" name="gallery_7"
                                        accept=".jpg,.jpeg,.png,.webp,.git" class="d-none"
                                        onchange="onGallery7Change(this)">
                                </label>
                                <label for="gallery8" class="rounded d-flex align-items-center"
                                    style="min-height: 100px; min-width: 100px; height: 100px; width: 100px; background-color: rgba(0, 0, 0, 0.1); cursor: pointer">
                                    <i id="gallery8Icon" class="bi bi-plus-circle-dotted mx-auto text-secondary d-block"
                                        style="font-size: 44px"></i>
                                    <img id="gallery8Preview" src="#" class="rounded w-100 h-100 d-none"
                                        alt="gallery" style="object-fit: cover" />
                                    <input id="gallery8" type="file" name="gallery_8"
                                        accept=".jpg,.jpeg,.png,.webp,.git" class="d-none"
                                        onchange="onGallery8Change(this)">
                                </label>
                            </div>
                            <p style="font-size: 14px; margin-top: 4px">Max size: 2 MB untuk masing - masing foto</p>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium fs-5">Background Music</p>
                            <div class="mt-2 w-100">
                                <label class="form-label">Upload Music</label>
                                <audio controls="controls" id="songPreview" class="mb-4 d-none">
                                    <source src="#" type="audio/mp4" />
                                </audio>
                                <input type="file" class="form-control" name="song" accept=".mp3,.wav,.m4a"
                                    required onchange="onSongChange(this)" />
                                <p style="font-size: 14px; margin-top: 4px">Max size: 7 MB</p>
                            </div>
                        </div>
                        <div class="card-body" style="background-color: #f4f4f4">
                            <p style="font-size: 14px;">* Acara, Tamu dan Gift Digital dapat ditambahkan setelah mengklik
                                Simpan pada halaman ini.</p>
                            <button class="btn btn-primary mt-3 text-white save-button">Simpan</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .save-button {
            width: 100%
        }

        @media(min-width: 768px) {
            .save-button {
                width: max-content;
            }
        }
    </style>
@endsection

@section('script')
    <script>
        const headerPreview = $("#headerPreview")
        const malePhotoPreview = $('#malePhotoPreview')
        const femalePhotoPreview = $('#femalePhotoPreview')
        const caption1 = $("#caption1")
        const caption2 = $("#caption2")
        const gallery1Icon = $("#gallery1Icon")
        const gallery1Preview = $("#gallery1Preview")
        const gallery2Icon = $("#gallery2Icon")
        const gallery2Preview = $("#gallery2Preview")
        const gallery3Icon = $("#gallery3Icon")
        const gallery3Preview = $("#gallery3Preview")
        const gallery4Icon = $("#gallery4Icon")
        const gallery4Preview = $("#gallery4Preview")
        const gallery5Icon = $("#gallery5Icon")
        const gallery5Preview = $("#gallery5Preview")
        const gallery6Icon = $("#gallery6Icon")
        const gallery6Preview = $("#gallery6Preview")
        const gallery7Icon = $("#gallery7Icon")
        const gallery7Preview = $("#gallery7Preview")
        const gallery8Icon = $("#gallery8Icon")
        const gallery8Preview = $("#gallery8Preview")
        const songPreivew = $("#songPreview")

        const caption1Text =
            'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir. (QS. Ar-Rum 21)'

        const caption2Text =
            'Maha Suci Allah SWT, Yang telah menciptakan makhlukNya berpasang-pasangan. Ya Allah, perkenankanlah dan Ridhoilah Pernikahan kami'

        function onHeaderChange(e) {
            const file = e.files[0]
            headerPreview.attr('src', URL.createObjectURL(file))
            headerPreview.removeClass('d-none')
            headerPreview.addClass('d-block')
        }

        function onMalePhotoChange(e) {
            const file = e.files[0]
            malePhotoPreview.attr('src', URL.createObjectURL(file))
            malePhotoPreview.removeClass('d-none')
            malePhotoPreview.addClass('d-block')
        }

        function onFemalePhotoChange(e) {
            const file = e.files[0]
            femalePhotoPreview.attr('src', URL.createObjectURL(file))
            femalePhotoPreview.removeClass('d-none')
            femalePhotoPreview.addClass('d-block')
        }

        function copyToCaption1(e) {
            caption1.html(caption1Text)
        }

        function copyToCaption2(e) {
            caption2.html(caption2Text)
        }

        function onGallery1Change(e) {
            const file = e.files[0]
            gallery1Preview.attr('src', URL.createObjectURL(file))
            gallery1Preview.removeClass('d-none')
            gallery1Preview.addClass('d-block')
            gallery1Icon.removeClass('d-block')
            gallery1Icon.addClass('d-none')
        }

        function onGallery2Change(e) {
            const file = e.files[0]
            gallery2Preview.attr('src', URL.createObjectURL(file))
            gallery2Preview.removeClass('d-none')
            gallery2Preview.addClass('d-block')
            gallery2Icon.removeClass('d-block')
            gallery2Icon.addClass('d-none')
        }

        function onGallery3Change(e) {
            const file = e.files[0]
            gallery3Preview.attr('src', URL.createObjectURL(file))
            gallery3Preview.removeClass('d-none')
            gallery3Preview.addClass('d-block')
            gallery3Icon.removeClass('d-block')
            gallery3Icon.addClass('d-none')
        }

        function onGallery4Change(e) {
            const file = e.files[0]
            gallery4Preview.attr('src', URL.createObjectURL(file))
            gallery4Preview.removeClass('d-none')
            gallery4Preview.addClass('d-block')
            gallery4Icon.removeClass('d-block')
            gallery4Icon.addClass('d-none')
        }

        function onGallery5Change(e) {
            const file = e.files[0]
            gallery5Preview.attr('src', URL.createObjectURL(file))
            gallery5Preview.removeClass('d-none')
            gallery5Preview.addClass('d-block')
            gallery5Icon.removeClass('d-block')
            gallery5Icon.addClass('d-none')
        }

        function onGallery6Change(e) {
            const file = e.files[0]
            gallery6Preview.attr('src', URL.createObjectURL(file))
            gallery6Preview.removeClass('d-none')
            gallery6Preview.addClass('d-block')
            gallery6Icon.removeClass('d-block')
            gallery6Icon.addClass('d-none')
        }

        function onGallery7Change(e) {
            const file = e.files[0]
            gallery7Preview.attr('src', URL.createObjectURL(file))
            gallery7Preview.removeClass('d-none')
            gallery7Preview.addClass('d-block')
            gallery7Icon.removeClass('d-block')
            gallery7Icon.addClass('d-none')
        }

        function onGallery8Change(e) {
            const file = e.files[0]
            gallery8Preview.attr('src', URL.createObjectURL(file))
            gallery8Preview.removeClass('d-none')
            gallery8Preview.addClass('d-block')
            gallery8Icon.removeClass('d-block')
            gallery8Icon.addClass('d-none')
        }

        function onSongChange(e) {
            const file = e.files[0]
            songPreivew.attr('src', URL.createObjectURL(file))
            songPreivew.removeClass('d-none')
            songPreivew.addClass('d-block')
        }
    </script>
@endsection
