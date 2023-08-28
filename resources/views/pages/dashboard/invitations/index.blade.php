@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Undangan</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body d-flex flex-column w-100">
                    @can('act-as-customer')
                        <a href="/dashboard/invitations/add"
                            class="btn btn-primary text-white mx-auto mx-md-0 {{ Auth::user()->can('act-as-customer') ? 'button-add' : '' }}"
                            style="width: max-content; z-index: 20;">
                            <i class="bi bi-pencil-square"></i>
                            <span>Tambah</span>
                        </a>
                    @endcan
                    <table class="table table-striped nowrap w-100 ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nama</th>
                                <th>Pengantin Pria</th>
                                <th>Pengantin Wanita</th>
                                <th>Template</th>
                                <th>Diterbitkan</th>
                                @can('act-as-admin')
                                    <th>Pengguna</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invitations as $invitation)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        @if (Auth::user()->can('act-as-customer'))
                                            <a
                                                href="/dashboard/invitations/{{ $invitation->id }}">{{ $invitation->name }}</a>
                                        @else
                                            <span>{{ $invitation->name }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $invitation->male_name }}</td>
                                    <td>{{ $invitation->female_name }}</td>
                                    <td>{{ $invitation->product->name }}</td>
                                    <td>{{ $invitation->is_published ? 'Iya' : 'Tidak' }}</td>
                                    @can('act-as-admin')
                                        <td>{{ $invitation->customer->name }}</td>
                                    @endcan
                                </tr>
                            @endforeach
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
    <script type="module">
        setTimeout(function() {
            $('.table').DataTable({
                lengthChange: false,
                responsive: true
            })
        }, 250);
    </script>
@endsection
