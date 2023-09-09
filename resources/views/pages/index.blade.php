@extends('layouts.default')

@section('content')
    <section id="home" class="py-5 bg-white">
        <div
            class="d-flex w-100 flex-column-reverse row-gap-2 row-gap-lg-0 flex-lg-row container mx-auto column-gap-lg-4 align-items-center">
            <div class="d-flex mx-auto mx-lg-0 w-100">
                <div class="my-auto mx-auto mx-lg-0 text-center text-lg-start">
                    <p class="text-dark my-auto fs-1 fw-bold" style="line-height: 40px">Buat Undangan Pernikahan Gratis</p>
                    <p class="fs-6 text-secondary mt-2">Buat undangan tanpa adanya batasan.</p>
                    <p class="fs-6 text-secondary">Explore banyak template menarik.</p>
                    <a href="/register" class="btn btn-primary text-white w-100 w-lg-auto btn-lg mt-3 mt-lg-5">Buat
                        Undanganmu
                        Sekarang</a>
                </div>
            </div>
            <img src="/images/ill-hand.png" alt="wedding" class="ill mx-auto mx-lg-0 ms-lg-auto" />
        </div>
    </section>
    <section id="template" class="py-5">
        <div
            class="container d-flex w-100 flex-column row-gap-2 row-gap-lg-0 flex-lg-row mx-auto column-gap-lg-5 align-items-center">
            <img src="/images/ill-prototyping.png" alt="wedding" class="ill mx-auto mx-lg-0" />
            <div class="d-flex flex-column mx-auto mx-lg-0 w-100">
                <div class="my-auto mx-auto mx-lg-0 text-center text-lg-end ms-lg-auto">
                    <p class="text-dark my-auto fs-1 fw-bold" style="line-height: 40px">Tersedia Banyak Template</p>
                    <p class="fs-6 mt-3">Bebas template yang sesuai dengan kebutuhanmu.</p>
                </div>
                <div class="d-flex w-100 template-list flex-wrap gap-3 mt-4">
                    @foreach ($products as $product)
                        <a href="{{ $product->demo_url }}" class="template-list-item" target="_blank">
                            <img src="/uploads/{{ $product->thumbnail }}" alt="template" class="w-100 h-100 rounded"
                                style="object-fit: cover" />
                        </a>
                    @endforeach
                    <a href="/dashboard/invitations/templates" class="btn btn-primary view-all-template mt-2 mx-auto"
                        target="_blank">Lihat Semua
                        Template</a>
                </div>
            </div>
        </div>
    </section>
    <section id="howTo" class="py-5 bg-white">
        <div
            class="container d-flex w-100 flex-column-reverse row-gap-2 row-gap-lg-0 flex-lg-row mx-auto column-gap-lg-3 align-items-center">
            <div class="d-flex flex-column mx-auto mx-lg-0 w-100">
                <div class="my-auto mx-auto mx-lg-0 text-center text-lg-start">
                    <p class="text-dark my-auto fs-1 fw-bold" style="line-height: 40px">Cara Pembuatan Undangan</p>
                    <p class="fs-6 mt-3">Pembuatan undangan yang sangat mudah dan cepat.</p>
                </div>
                <div class="d-flex align-items-center column-gap-3 w-100 mt-4">
                    <img src="/images/ill-login-flat.png" class="object-fit: cover" style="width: 55px" alt="how-to">
                    <p class="text-secondary">1. <a href="/register" class="fw-medium">Daftar</a> terlebih dahulu, atau <a
                            href="/login" class="fw-medium">login</a> jika sudah punya
                        akun
                    </p>
                </div>
                <div class="d-flex align-items-center column-gap-3 w-100 mt-2">
                    <img src="/images/ill-stats.png" class="object-fit: cover" style="width: 55px" alt="how-to">
                    <p class="text-secondary">2. Masuk pada <a href="/dashboard/invitations" class="fw-medium">menu
                            undangan</a> dan klik buat undangan
                    </p>
                </div>
                <div class="d-flex align-items-center column-gap-3 w-100 mt-2">
                    <img src="/images/ill-choose.png" class="object-fit: cover" style="width: 55px" alt="how-to">
                    <p class="text-secondary">3. Pilih template dan isi semua kolom yang diperlukan
                    </p>
                </div>
                <div class="d-flex align-items-center column-gap-3 w-100 mt-2">
                    <img src="/images/ill-add-files.png" class="object-fit: cover" style="width: 55px" alt="how-to">
                    <p class="text-secondary">4. Simpan, dan undangan kamu sudah siap digunakan
                    </p>
                </div>
            </div>
            <img src="/images/ill-rafiki.png" alt="wedding" class="ill mx-auto mx-lg-0" />
        </div>
    </section>
    <section id="feature" class="py-5">
        <div class="container mx-auto">
            <p class="text-dark my-auto fs-1 fw-bold w-full text-center text-lg-start" style="line-height: 40px">Fitur</p>
            <div class="mt-4 d-flex flex-wrap w-100 feature-list">
                <div class="card feature-list-item">
                    <div class="d-flex column-gap-3 card-body">
                        <i class="bi bi-phone fs-3 text-primary"></i>
                        <div>
                            <p class="fs-5 fw-bold text-primary">Design Moderen & Responsive</p>
                            <p style="font-size: 14px">Menggunakan desain yang moderen dengan adanya fitur responsive.</p>
                        </div>
                    </div>
                </div>
                <div class="card feature-list-item">
                    <div class="d-flex column-gap-3 card-body">
                        <i class="bi bi-images fs-3 text-primary"></i>
                        <div>
                            <p class="fs-5 fw-bold text-primary">Gallery Foto</p>
                            <p style="font-size: 14px">Bagikan moment-moment indahmu dengan pasanganmu.</p>
                        </div>
                    </div>
                </div>
                <div class="card feature-list-item">
                    <div class="d-flex column-gap-3 card-body">
                        <i class="bi bi-map fs-3 text-primary"></i>
                        <div>
                            <p class="fs-5 fw-bold text-primary">Navigasi Alamat & Lokasi</p>
                            <p style="font-size: 14px">Memudahkan para tamu untuk mencari alamatmu.</p>
                        </div>
                    </div>
                </div>
                <div class="card feature-list-item">
                    <div class="d-flex column-gap-3 card-body">
                        <i class="bi bi-heart fs-3 text-primary"></i>
                        <div>
                            <p class="fs-5 fw-bold text-primary">Love Story</p>
                            <p style="font-size: 14px">Ceritakan kisah cintamu bersama pasanganmu.</p>
                        </div>
                    </div>
                </div>
                <div class="card feature-list-item">
                    <div class="d-flex column-gap-3 card-body">
                        <i class="bi bi-music-note-beamed fs-3 text-primary"></i>
                        <div>
                            <p class="fs-5 fw-bold text-primary">Background Music</p>
                            <p style="font-size: 14px">Pilih music favoritmu agar undanganmu menjadi lebih menarik.</p>
                        </div>
                    </div>
                </div>
                <div class="card feature-list-item">
                    <div class="d-flex column-gap-3 card-body">
                        <i class="bi bi-stopwatch fs-3 text-primary"></i>
                        <div>
                            <p class="fs-5 fw-bold text-primary">Realtime Coutdown</p>
                            <p style="font-size: 14px">Hitung mundur otomatis ke tanggal acara kamu.</p>
                        </div>
                    </div>
                </div>
                <div class="card feature-list-item">
                    <div class="d-flex column-gap-3 card-body">
                        <i class="bi bi-gift fs-3 text-primary"></i>
                        <div>
                            <p class="fs-5 fw-bold text-primary">Gift Digital</p>
                            <p style="font-size: 14px">Mempermudah para tamu untuk mengirimkan amplop / gift secara
                                digital.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card feature-list-item">
                    <div class="d-flex column-gap-3 card-body">
                        <i class="bi bi-whatsapp fs-3 text-primary"></i>
                        <div>
                            <p class="fs-5 fw-bold text-primary">Share Via Whatsapp</p>
                            <p style="font-size: 14px">Bagikan undanganmu dengan langsung ke whatsapp.</p>
                        </div>
                    </div>
                </div>
                <div class="card feature-list-item">
                    <div class="d-flex column-gap-3 card-body">
                        <i class="bi bi-book fs-3 text-primary"></i>
                        <div>
                            <p class="fs-5 fw-bold text-primary">Buku Tamu</p>
                            <p style="font-size: 14px">Buku tamu digital, lihat ucapan-ucapan yang diberikan oleh para tamu
                                undangan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .ill {
            height: auto;
            width: 100%;
        }

        .template-list .template-list-item {
            width: 100%;
            height: 150px;
        }

        .view-all-template {
            width: 100%;
        }

        .feature-list {
            gap: 24px;
        }

        .feature-list .feature-list-item {
            width: 100%;
        }

        @media (min-width: 768px) {
            .ill {
                width: auto;
                height: 350px;
            }

            .template-list .template-list-item {
                width: calc(50% - 8px);
            }

            .view-all-template {
                width: max-content;
            }

            .feature-list .feature-list-item {
                width: calc(50% - 12px);
            }
        }

        @media (min-width: 992px) {
            .ill {
                height: 450px;
            }

            .template-list {
                padding-left: 40px;
            }
        }

        @media (min-width: 1200px) {
            .ill-hand {
                height: 500px;
            }

            .template-list {
                padding-left: 120px;
            }

            .feature-list .feature-list-item {
                width: calc(33% - 12px);
            }
        }
    </style>
@endsection
