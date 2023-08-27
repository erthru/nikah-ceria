@extends('layouts.default')

@section('content')
    <section class="section mx-auto container d-flex flex-column flex-md-row align-items-center pb-5">
        <div class="w-100">
            <img src="/images/ill-authentication.png" alt="authentication" class="w-100" />
        </div>
        <div class="w-100 form card">
            <div class="card-body">
                <p class="fw-bold fs-2 fs-lg-1">Login</p>
                <form action="/login" method="POST" class="w-100 mt-2">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label">Email address</label>
                        <input value="{{ old('email') }}" type="email" class="form-control" name="email"
                            placeholder="Masukkan Email" required />
                    </div>
                    <div class="mb-2 d-flex flex-column w-100">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password"
                            required />
                        <a href="/forgot-password" class="fw-medium ms-auto mt-1" style="font-size: 14px;">Lupa
                            Password?</a>
                    </div>
                    <button class="btn btn-primary text-white mt-2 w-100 md:w-md-0">Login</button>
                    <p class="mt-1">Belum punya akun? <a href="/register" class="fw-medium">Daftar Sekarang</a></p>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .section {
            width: 100%;
            margin-top: -40px;
        }

        .section .form {
            margin-top: -20px;
        }

        @media (min-width: 768px) {
            .section {
                column-gap: 40px;
                margin-top: 0;
            }

            .section .form {
                margin-top: 40px;
            }
        }

        @media (min-width: 992px) {
            .section {
                width: 80%;
                column-gap: 60px;
                margin-top: 40px;
            }
        }

        @media (min-width: 1200px) {
            .section {
                width: 70%;
                margin-top: 0;
                column-gap: 100px;
            }
        }
    </style>
@endsection
