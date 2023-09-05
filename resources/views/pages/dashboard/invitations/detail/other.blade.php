@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/invitations">Undangan</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard/invitations/{{ $invitation->id }}">Detail Undangan</a>
                    </li>
                    <li class="breadcrumb-item active">Lain-Lain</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body d-flex flex-column w-100">
                    <p class="fw-bold fs-4" style="margin-top: -4px">Acara</p>
                    <button
                        class="mt-2 btn btn-primary text-white mx-auto mx-md-0 {{ Auth::user()->can('act-as-customer') ? 'button-add' : '' }}"
                        style="width: max-content; z-index: 20;">
                        <i class="bi bi-pencil-square"></i>
                        <span>Tambah</span>
                    </button>
                    <table class="table table-striped nowrap w-100 ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body d-flex flex-column w-100">
                    <p class="fw-bold fs-4" style="margin-top: -4px">Tamu</p>
                    <button
                        class="mt-2 btn btn-primary text-white mx-auto mx-md-0 {{ Auth::user()->can('act-as-customer') ? 'button-add' : '' }}"
                        style="width: max-content; z-index: 20;">
                        <i class="bi bi-pencil-square"></i>
                        <span>Tambah</span>
                    </button>
                    <table class="table table-striped nowrap w-100 ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body d-flex flex-column w-100">
                    <p class="fw-bold fs-4" style="margin-top: -4px">Gift Digital</p>
                    <button
                        class="mt-2 btn btn-primary text-white mx-auto mx-md-0 {{ Auth::user()->can('act-as-customer') ? 'button-add' : '' }}"
                        style="width: max-content; z-index: 20;">
                        <i class="bi bi-pencil-square"></i>
                        <span>Tambah</span>
                    </button>
                    <table class="table table-striped nowrap w-100 ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        .button-add {
            margin-bottom: 16px !important;
        }

        @media (min-width: 768px) {
            .button-add {
                margin-bottom: -30px !important;
            }
        }
    </style>
@endsection

@section('script')
    <script>
        setTimeout(function() {
            $('.table').DataTable({
                lengthChange: false,
                responsive: true
            })
        }, 250);
    </script>
@endsection
