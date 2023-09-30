<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/assets/jquery/js/jquery.js"></script>
    <title>{{ $invitation->name . ' | Nikah Ceria' }}</title>

    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body style="background-color: #efefef; display: flex; width: 100%; align-items: center">
    <main style="margin: auto; width: 100%; max-width: 540px; background-color: white; overflow-x: hidden;">
        <!-- INTRO FULL PAGE -->
        <section style="min-height: 100vh; position: relative; padding: 32px;">
            <div
                style="z-index: 10; position: absolute; top:0; left:0; color: white; padding-top: 60px; height: 100%; display: flex; flex-direction: column; width: 100%">
                <p style="width: 100%; text-align: center; font-size: 18px; ">The Wedding of</p>
                <p
                    style="width: 100%; font-weight: 600; text-align: center; font-size: 32px; margin-top: 6px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                    {{ $invitation->name }}
                </p>
                <p style="width: 100%; text-align: center; margin-top: 8px; font-size: 14px">
                    {{ $carbon::parse(reverseFormatedDate($invitationEvents[0]->event_at))->dayName }}
                    {{ $carbon::parse(reverseFormatedDate($invitationEvents[0]->event_at))->format('d M Y') }}
                </p>
                <div
                    style="margin-top: auto; padding-bottom: 100px; display: flex; width: 100%; flex-direction: column">
                    <p style="width: 100%; text-align: center; font-size: 18px;">Dear:</p>
                    <p style="width: 100%; text-align: center; font-size: 24px; margin-top: 2px;">
                        {{ $invitationGuest->name }}</p>
                    <a href="#fec"
                        style="margin: 0 auto; margin-top: 18px; padding: 10px 28px; color: white; border-radius: 6px; border: 1px solid white; background-color: saddlebrown;">Buka
                        Undangan</a>
                    <p style="width: 100%; text-align: center; font-size: 12px; margin-top: 10px;">*Mohon maaf apabila
                        ada kesalahan penulisan nama/gelar</p>
                </div>
            </div>
            <img src="/uploads/{{ $invitation->gallery_1 }}" alt="gallery-1"
                style="height: 100vh; width: 100%; object-fit: cover; position: absolute; top:0; left: 0" />
            <div
                style="position: absolute; width: 100%; height: 100%; left:0; top:0; background-color: rgba(0, 0, 0, 0.6)">
            </div>
        </section>
        <!-- FIRST EVENT COUNTDOWN -->
        <section id="fec"
            style="min-height: 100vh; position: relative; padding: 32px; display: flex; flex-direction: column">
            <div
                style="padding-bottom: 50px; margin-top: auto; position: relative; z-index: 10; color: saddlebrown; display: flex; flex-direction: column">
                <p style="width: 100%; text-align: center; font-size: 18px; ">The Wedding of</p>
                <p
                    style="width: 100%; font-weight: 600; text-align: center; font-size: 32px; margin-top: 6px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                    {{ $invitation->name }}
                </p>
                <p style="width: 100%; text-align: center; margin-top: 8px; font-size: 14px">
                    We invited you to celebrate our wedding</p>
                <p style="width: 100%; text-align: center; margin-top: 4px; font-size: 14px">
                    {{ $carbon::parse(reverseFormatedDate($invitationEvents[0]->event_at))->dayName }}
                    {{ $carbon::parse(reverseFormatedDate($invitationEvents[0]->event_at))->format('d M Y') }}
                </p>
                <div style="margin: 0 auto; display: flex; column-gap: 38px; color: black; margin-top: 38px;">
                    <div style="text-align: center">
                        <p id="days" style="font-size: 34px; font-weight: 600">0</p>
                        <p style="margin-top: 4px;">Hari</p>
                    </div>
                    <div style="text-align: center">
                        <p id="hours" style="font-size: 34px; font-weight: 600">0</p>
                        <p style="margin-top: 4px;">Jam</p>
                    </div>
                    <div style="text-align: center">
                        <p id="minutes" style="font-size: 34px; font-weight: 600">0</p>
                        <p style="margin-top: 4px;">Menit</p>
                    </div>
                    <div style="text-align: center">
                        <p id="seconds" style="font-size: 34px; font-weight: 600">0</p>
                        <p style="margin-top: 4px;">Detik</p>
                    </div>
                </div>
            </div>
            <img src="/uploads/{{ $invitation->gallery_2 }}" alt="gallery-2"
                style="height: 80vh; width: 100%; object-fit: cover; position: absolute; top:0; left: 0" />
            <div
                style="position: absolute; width: 100%; height: 60%; left:0; bottom:0; background-image: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,0.8))">
            </div>
            <div
                style="position: absolute; width: 100%; height: 60%; left:0; bottom:0; background-image: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,0.9))">
            </div>
            <div
                style="position: absolute; width: 100%; height: 60%; left:0; bottom:0; background-image: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1))">
            </div>
            <div
                style="position: absolute; width: 100%; height: 60%; left:0; bottom:0; background-image: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1))">
            </div>
            <div
                style="position: absolute; width: 100%; height: 60%; left:0; bottom:0; background-image: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1))">
            </div>
        </section>
        <!-- CAPTION -->
        <section style="position: relative; display: flex; flex-direction: column; margin-top: -20px;">
            <div
                style="background-color: white; width: 100%; height: 60px; border-radius: 50%; z-index: 10; position: relative">
            </div>
            <div style="padding: 80px 32px; background-color: saddlebrown; margin-top: -28px;">
                <img src="/uploads/{{ $invitation->gallery_3 ? $invitation->gallery_3 : $invitation->gallery_2 }}"
                    alt="gallery-3" style="width: 100%; height: 250px; object-fit: cover" />
                <p style="text-align: justify; width: 100%; color: white; margin-top: 16px">
                    {{ $invitation->caption }}</p>
            </div>
            <div
                style="background-color: white; width: 100%; height: 60px; border-radius: 50%; z-index: 10; position: relative; margin-top: -28px">
            </div>
        </section>
        <!-- MALE & FEMALE -->
        <section style="position: relative; display: flex; flex-direction: column; padding: 32px; margin-top: 42px;">
            <div
                style="padding: 3px; border-radius: 6px; background-color: saddlebrown; width: max-content; margin: 0 auto;">
                <img src="/uploads/{{ $invitation->male_photo }}" alt="male"
                    style="width: 180px; height: 180px; object-fit: cover;">
            </div>
            <p
                style="width: 100%; text-align: center; margin-top: 14px; font-size: 34px; font-weight: 600; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                {{ $invitation->male_name }}</p>
            <p style="widht: 100%; text-align: center; margin-top: 6px; font-size: 14px">
                Putra Dari
            </p>
            <p style="widht: 100%; text-align: center; margin-top: 6px;">
                Bpk. {{ $invitation->male_father_name }} dan Ibu {{ $invitation->male_mother_name }}
            </p>
            <p style="widht: 100%; text-align: center; margin-top: 28px; color: saddlebrown; font-size: 46px;">
                &
            </p>
            <div
                style="padding: 3px; border-radius: 6px; background-color: saddlebrown; width: max-content; margin: 28px auto 0 auto;">
                <img src="/uploads/{{ $invitation->female_photo }}" alt="male"
                    style="width: 180px; height: 180px; object-fit: cover;">
            </div>
            <p
                style="width: 100%; text-align: center; margin-top: 14px; font-size: 34px; font-weight: 600; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                {{ $invitation->female_name }}</p>
            <p style="widht: 100%; text-align: center; margin-top: 6px; font-size: 14px">
                Putri Dari
            </p>
            <p style="widht: 100%; text-align: center; margin-top: 6px;">
                Bpk. {{ $invitation->female_father_name }} dan Ibu {{ $invitation->female_mother_name }}
            </p>
        </section>
        <!-- EVENTS -->
        <section
            style="position: relative; padding: 32px; margin-top: 42px; background-color: saddlebrown; color: white">
            <p style="widht: 100%; text-align: center; 6px; font-size: 28px;">
                Save
            </p>
            <p
                style="widht: 100%; text-align: center; font-size: 39px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                ~ The Date ~
            </p>
            @foreach ($invitationEvents as $invitationEvent)
                <div
                    style="margin-top: 24px; border-radius: 6px; position: relative; height: 566px; background-color: white; display: flex; flex-direction: column">
                    <img src="/uploads/{{ $invitation['gallery_' . $loop->index + 4] ? $invitation['gallery_' . $loop->index + 4] : $invitation->gallery_1 }}"
                        alt="gallery-4" style="width: 100%; height: 75%; object-fit: cover; border-radius: 6px">
                    <div
                        style="position: absolute; width: 100%; height: 60%; left:0; bottom:0; background-image: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1))">
                    </div>
                    <div
                        style="position: absolute; width: 100%; height: 60%; left:0; bottom:0; background-image: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1))">
                    </div>
                    <div
                        style="position: absolute; width: 100%; height: 60%; left:0; bottom:0; background-image: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1))">
                    </div>
                    <div
                        style="position: absolute; width: 100%; height: 60%; left:0; bottom:0; background-image: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1))">
                    </div>
                    <div style="margin-top: -100px; position: relative; z-index: 10; padding: 0 16px;">
                        <p
                            style="font-size: 41px; color: saddlebrown; width: 100%; text-align: right; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-weight: 600">
                            {{ $invitationEvent->name }}</p>
                        <div style="height: 2px; background-color: black; width: 88%; margin-top: 16px"></div>
                        <p style="color: black; margin-top: 16px; font-weight: 600">
                            {{ $carbon::parse(reverseFormatedDateWithTime($invitationEvent->event_at))->dayName }}
                            {{ $carbon::parse(reverseFormatedDateWithTime($invitationEvent->event_at))->format('d M Y') }}
                        </p>
                        <p style="color: black; margin-top: 4px; font-size: 14px">
                            Pukul
                            {{ $carbon::parse(reverseFormatedDateWithTime($invitationEvent->event_at))->format('H:m') }}
                            - Selesai
                        </p>
                        <p style="color: black; margin-top: 16px; font-size: 14px;;">Bertempat di</p>
                        <p style="color: black; margin-top: 4px; font-size: 14px; font-weight: 600">
                            {{ $invitationEvent->place }}</p>
                        <p style="color: black; margin-top: 4px; font-size: 14px; margin-bottom: 12px">
                            {{ $invitationEvent->address }}</p>
                        @if ($invitationEvent->latitude && $invitationEvent->longitude)
                            <a href="https://maps.google.com/?q={{ $invitationEvent->latitude }},{{ $invitationEvent->longitude }}"
                                style="font-size: 12px; background-color: saddlebrown; padding: 6px 12px; border-radius: 6px; color: white">Buka
                                Lokasi</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </section>
        <!-- GALLERY -->
        <section style="padding: 32px;">
            <p
                style="width: 100%; text-align: center; font-size: 39px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                Momen Bahagia Kami
            </p>
            <p style="width: 100%; text-align: center; font-size: 18px; margin-top: 10px;">Galeri Foto</p>
            <img id="previewedGallery" src="/uploads/{{ $invitation->gallery_1 }}" alt="previewed-gallery"
                style="width: 100%; margin-top: 38px; height: 60vh; object-fit: cover; border-radius: 6px">
            <div style="width: 100%; display: flex; margin-top: 16px; overflow-x: auto; gap: 10px">
                <img src="/uploads/{{ $invitation->gallery_1 }}" alt="galleries"
                    style="min-width: 80px; max-width: 80px; min-height: 80px; max-height: 80px; object-fit: cover; border-radius: 6px; cursor: pointer"
                    onclick="setPreviewedGallery({{ json_encode($invitation->gallery_1) }})" />
                <img src="/uploads/{{ $invitation->gallery_2 }}" alt="galleries"
                    style="min-width: 80px; max-width: 80px; min-height: 80px; max-height: 80px; object-fit: cover; border-radius: 6px; cursor: pointer"
                    onclick="setPreviewedGallery({{ json_encode($invitation->gallery_2) }})" />
                @if ($invitation->gallery_3)
                    <img src="/uploads/{{ $invitation->gallery_3 }}" alt="galleries"
                        style="min-width: 80px; max-width: 80px; min-height: 80px; max-height: 80px; object-fit: cover; border-radius: 6px; cursor: pointer"
                        onclick="setPreviewedGallery({{ json_encode($invitation->gallery_3) }})" />
                @endif
                @if ($invitation->gallery_4)
                    <img src="/uploads/{{ $invitation->gallery_4 }}" alt="galleries"
                        style="min-width: 80px; max-width: 80px; min-height: 80px; max-height: 80px; object-fit: cover; border-radius: 6px; cursor: pointer"
                        onclick="setPreviewedGallery({{ json_encode($invitation->gallery_4) }})" />
                @endif
                @if ($invitation->gallery_5)
                    <img src="/uploads/{{ $invitation->gallery_5 }}" alt="galleries"
                        style="min-width: 80px; max-width: 80px; min-height: 80px; max-height: 80px; object-fit: cover; border-radius: 6px; cursor: pointer"
                        onclick="setPreviewedGallery({{ json_encode($invitation->gallery_5) }})" />
                @endif
                @if ($invitation->gallery_6)
                    <img src="/uploads/{{ $invitation->gallery_6 }}" alt="galleries"
                        style="min-width: 80px; max-width: 80px; min-height: 80px; max-height: 80px; object-fit: cover; border-radius: 6px; cursor: pointer"
                        onclick="setPreviewedGallery({{ json_encode($invitation->gallery_6) }})" />
                @endif
                @if ($invitation->gallery_7)
                    <img src="/uploads/{{ $invitation->gallery_7 }}" alt="galleries"
                        style="min-width: 80px; max-width: 80px; min-height: 80px; max-height: 80px; object-fit: cover; border-radius: 6px; cursor: pointer"
                        onclick="setPreviewedGallery({{ json_encode($invitation->gallery_7) }})" />
                @endif
                @if ($invitation->gallery_8)
                    <img src="/uploads/{{ $invitation->gallery_8 }}" alt="galleries"
                        style="min-width: 80px; max-width: 80px; min-height: 80px; max-height: 80px; object-fit: cover; border-radius: 6px; cursor: pointer"
                        onclick="setPreviewedGallery({{ json_encode($invitation->gallery_8) }})" />
                @endif
            </div>
        </section>
        <!-- GIFTS -->
        <section></section>
        <!-- GUEST BOX -->
        <section></section>
    </main>
    <footer></footer>
    <script>
        const eventAt = {!! json_encode($invitationEvents[0]->event_at) !!}
        const eventAtParsed = new Date(eventAt)
        const days = $("#days")
        const hours = $("#hours")
        const minutes = $("#minutes")
        const seconds = $("#seconds")
        const previewedGallery = $("#previewedGallery")

        const interval = setInterval(function() {
            const now = new Date().getTime()
            const distance = eventAtParsed - now
            const _days = Math.floor(distance / (1000 * 60 * 60 * 24))
            const _hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
            const _minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
            const _seconds = Math.floor((distance % (1000 * 60)) / 1000)

            if (distance < 0) {
                clearInterval(interval)
            } else {
                days.html(_days)
                hours.html(_hours)
                minutes.html(_minutes)
                seconds.html(_seconds)
            }
        }, 1000);

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        function setPreviewedGallery(gallery) {
            previewedGallery.attr('src', '/uploads/' + gallery)
        }
    </script>
</body>

</html>
