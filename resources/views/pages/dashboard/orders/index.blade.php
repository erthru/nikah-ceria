@extends('layouts.dashboard')

@section('content')
    <section class="pt-1 pb-3">
        <div class="container mx-auto">
            <nav aria-label="breadcrumb" style="margin-top: -10px">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Orderan</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body d-flex flex-column w-100">
                    <div class="table-responsive">
                        <table class="table table-striped nowrap w-100">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="module">
        $('.table').DataTable({
            lengthChange: false
        })
    </script>
@endsection
