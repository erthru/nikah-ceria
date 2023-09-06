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
                        style="width: max-content; z-index: 20;" data-bs-toggle="modal" data-bs-target="#addEventModal">
                        <i class="bi bi-pencil-square"></i>
                        <span>Tambah</span>
                    </button>
                    <table id="eventTable" class="table table-striped nowrap w-100 ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nama</th>
                                <th>Tempat</th>
                                <th>Alamat</th>
                                <th>Koordinat</th>
                                <th>Tgl & Waktu</th>
                                <th>Perbarui</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invitationEvents as $ie)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $ie->name }}</td>
                                    <td>{{ $ie->place }}</td>
                                    <td>{{ $ie->address }}</td>
                                    <td>
                                        @if ($ie->latitude && $ie->longitude)
                                            <a href="#" class="btn btn-danger text-white">
                                                <i class="bi bi-geo-alt"></i>
                                                <span>Buka Di Maps</span>
                                            </a>
                                        @else
                                            Tidak tersedia
                                        @endif
                                    </td>
                                    <td>{{ $ie->event_at }}</td>
                                    <td>
                                        <button class="btn btn-warning text-white" data-bs-toggle="modal"
                                            data-bs-target="#updateEventModal"
                                            onclick="populateUpdateEventModal({{ json_encode($ie) }})">
                                            <i class="bi bi-pen"></i>
                                            <span>Perbarui</span>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger text-white">
                                            <i class="bi bi-trash"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
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
                    <table id="guestTable" class="table table-striped nowrap w-100 ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nama</th>
                                <th>Lihat Undangan</th>
                                <th>Perbarui</th>
                                <th>Hapus</th>
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
                    <table id="giftTable" class="table table-striped nowrap w-100 ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Bank</th>
                                <th>Atas Nama</th>
                                <th>No. Rekening</th>
                                <th>Perbarui</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="addEventModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/dashboard/invitations/{{ $invitation->id }}/other?ca=addEvent" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Acara</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Cth: Akad Nikah"
                                required />
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Tgl & Waktu</label>
                            <input type="datetime-local" class="form-control" name="event_at" required />
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Tempat</label>
                            <input type="text" class="form-control" name="place"
                                placeholder="Cth: Gedung Bele Li Mbu'i" required />
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="address" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Koordinat Latitude (Opsional)</label>
                            <input type="text" class="form-control" name="latitude"
                                placeholder="Masukkan Koordinat Latitude" />
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Koordinat Longitude (Opsional)</label>
                            <input type="text" class="form-control" name="longitude"
                                placeholder="Masukkan Koordinat Longitude" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateEventModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formUpdateEvent" action="#" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Perbarui Acara</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Nama</label>
                            <input id="updateEventName" type="text" class="form-control" name="name"
                                placeholder="Cth: Akad Nikah" required />
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Tgl & Waktu</label>
                            <input id="updateEventEventAt" type="datetime-local" class="form-control" name="event_at"
                                required />
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Tempat</label>
                            <input id="updateEventPlace" type="text" class="form-control" name="place"
                                placeholder="Cth: Gedung Bele Li Mbu'i" required />
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Alamat</label>
                            <textarea id="updateEventAddress" class="form-control" name="address" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Koordinat Latitude (Opsional)</label>
                            <input id="updateEventLatitude" type="text" class="form-control" name="latitude"
                                placeholder="Masukkan Koordinat Latitude" />
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Koordinat Longitude (Opsional)</label>
                            <input id="updateEventLongitude" type="text" class="form-control" name="longitude"
                                placeholder="Masukkan Koordinat Longitude" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
        const formUpdateEvent = $("#formUpdateEvent")
        const updateEventName = $('#updateEventName')
        const updateEventEventAt = $('#updateEventEventAt')
        const updateEventPlace = $('#updateEventPlace')
        const updateEventAddress = $('#updateEventAddress')
        const updateEventLatitude = $('#updateEventLatitude')
        const updateEventLongitude = $('#updateEventLongitude')

        setTimeout(function() {
            $('#eventTable').DataTable({
                lengthChange: false,
                responsive: true
            })

            $('#guestTable').DataTable({
                lengthChange: false,
                responsive: true
            })

            $('#giftTable').DataTable({
                lengthChange: false,
                responsive: true
            })
        }, 250);

        function populateUpdateEventModal(json) {
            const id = {!! json_encode($invitation->id) !!}
            const eventAtSplited = json.event_at.split(" ")
            const eventAt = `${eventAtSplited[0].split("/").reverse().join("-")}T${eventAtSplited[1]}`
            updateEventName.val(json.name)
            updateEventEventAt.val(eventAt)
            updateEventPlace.val(json.place)
            updateEventAddress.html(json.address)
            updateEventLatitude.val(json.latitude)
            updateEventLongitude.val(json.longitude)
            formUpdateEvent.attr('action', `/dashboard/invitations/${id}/other?ca=updateEvent&invitationEventId=${json.id}`)
        }
    </script>
@endsection
