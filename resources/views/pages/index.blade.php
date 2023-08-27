@extends('layouts.default')

@section('content')
    <section id="home" class="py-5 bg-white">
        <div
            class="d-flex w-100 flex-column-reverse row-gap-2 row-gap-lg-0 flex-lg-row container mx-auto column-gap-lg-4 align-items-center">
            <div class="d-flex mx-auto mx-lg-0 w-100">
                <div class="my-auto mx-auto mx-lg-0 text-center text-lg-start">
                    <p class="text-dark my-auto fs-1 fw-bold" style="line-height: 40px">Buat Undangan Pernikahan Gratis</p>
                    <p class="fs-6 text-secondary mt-2">Buat undangan tanpa adanya batasan.</p>
                    <p class="fs-6 text-secondary">Explore ratusan template menarik.</p>
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
                <img src="https://picsum.photos/1000/562" alt="template" class="mt-4 w-100">
            </div>
        </div>
    </section>
    <section class="py-5 bg-white">
        <div class="container mx-auto d-flex flex-column">
            <div class="d-flex flex-wrap w-100 template-list">
                <img src="https://picsum.photos/1000/562" alt="template-list" class="template-list-image rounded">
                <img src="https://picsum.photos/1000/562" alt="template-list" class="template-list-image rounded">
                <img src="https://picsum.photos/1000/562" alt="template-list" class="template-list-image rounded">
                <img src="https://picsum.photos/1000/562" alt="template-list" class="template-list-image rounded">
                <img src="https://picsum.photos/1000/562" alt="template-list" class="template-list-image rounded">
                <img src="https://picsum.photos/1000/562" alt="template-list" class="template-list-image rounded">
            </div>
            <a href="/dashboard/invitations/templates" class="btn btn-primary btn-lg text-white mx-auto mt-5"
                style="width: max-content">
                Lihat Semua Template
            </a>
        </div>
    </section>
    <section id="feature" class="py-5">
        <div class="container mx-auto">
            <p class="text-dark my-auto fs-1 fw-bold" style="line-height: 40px">Fitur</p>
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
                            <p style="font-size: 14px">Mempermudah para tamu untuk mengirimkan amplop / gift secara digital.
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

        .template-list {
            gap: 24px;
        }

        .template-list .template-list-image {
            width: calc(50% - 12px);
            height: auto;
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

            .template-list .template-list-image {
                width: calc(33% - 14px);
                height: auto;
            }

            .feature-list .feature-list-item {
                width: calc(50% - 12px);
            }
        }

        @media (min-width: 992px) {
            .ill {
                height: 450px;
            }
        }

        @media (min-width: 1200px) {
            .ill-hand {
                height: 500px;
            }

            .template-list .template-list-image {
                width: calc(33% - 12px);
                height: auto;
            }

            .feature-list .feature-list-item {
                width: calc(33% - 12px);
            }
        }
    </style>
@endsection
