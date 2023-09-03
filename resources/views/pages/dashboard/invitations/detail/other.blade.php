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
                <div class="card-body">
                </div>
            </div>
        </div>
    </section>
@endsection
