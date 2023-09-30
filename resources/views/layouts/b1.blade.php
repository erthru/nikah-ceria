<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <section style="min-height: 100vh; position: relative; padding: 16px;">
            <div
                style="z-index: 10; position: absolute; top:0; left:0; color: white; padding-top: 60px; height: 100%; display: flex; flex-direction: column; width: 100%">
                <p style="width: 100%; text-align: center; font-size: 18px; ">The Wedding of</p>
                <p
                    style="width: 100%; font-weight: 600; text-align: center; font-size: 32px; margin-top: 6px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                    {{ $invitation->name }}
                </p>
                <p style="width: 100%; text-align: center; margin-top: 8px; font-size: 14px">
                    {{ $carbon::parse($invitationEvents[0]->event_at)->dayName }}
                    {{ $carbon::parse($invitationEvents[0]->event_at)->format('d M Y') }}</p>
                <div
                    style="margin-top: auto; padding-bottom: 100px; display: flex; width: 100%; flex-direction: column">
                    <p style="width: 100%; text-align: center; font-size: 18px;">Dear:</p>
                    <p style="width: 100%; text-align: center; font-size: 24px; margin-top: 2px;">
                        {{ $invitationGuest->name }}</p>
                    <a href="#fec"
                        style="margin: 0 auto; margin-top: 18px; padding: 10px 28px; color: white; border-radius: 6px; border: 1px solid white; background-color: #654924;">Buka
                        Undangan</a>
                    <p style="width: 100%; text-align: center; font-size: 12px; margin-top: 10px;">*Mohon maaf apabila
                        ada kesalahan penulisan nama/gelar</p>
                </div>
            </div>
            <img src="/uploads/{{ $invitation->gallery_1 }}" alt="gallery-1"
                style="height: 100vh; width: 100%; object-fit: cover; position: absolute; top:0; left: 0" />
            <div
                style="position: absolute; width: 100%; height: 100%; left:0; top:0; background-color: rgba(0, 0, 0, 0.4)">
            </div>
        </section>
        <!-- FIRST EVENT COUNTDOWN -->
        <section id="fec"
            style="min-height: 100vh; position: relative; padding: 16px; display: flex; flex-direction: column">
            <div
                style="padding-bottom: 50px; margin-top: auto; position: relative; z-index: 10; color: chocolate; display: flex; flex-direction: column">
                <p style="width: 100%; text-align: center; font-size: 18px; ">The Wedding of</p>
                <p
                    style="width: 100%; font-weight: 600; text-align: center; font-size: 32px; margin-top: 6px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                    {{ $invitation->name }}
                </p>
                <p style="width: 100%; text-align: center; margin-top: 8px; font-size: 14px">
                    We invited you to celebrate our wedding</p>
                <p style="width: 100%; text-align: center; margin-top: 4px; font-size: 14px">
                    {{ $carbon::parse($invitationEvents[0]->event_at)->dayName }}
                    {{ $carbon::parse($invitationEvents[0]->event_at)->format('d M Y') }}</p>
                <div style="margin: 0 auto; display: flex; column-gap: 38px; color: black; margin-top: 38px;">
                    <div style="text-align: center">
                        <p style="font-size: 34px; font-weight: 600">00</p>
                        <p style="margin-top: 4px;">Hari</p>
                    </div>
                    <div style="text-align: center">
                        <p style="font-size: 34px; font-weight: 600">00</p>
                        <p style="margin-top: 4px;">Jam</p>
                    </div>
                    <div style="text-align: center">
                        <p style="font-size: 34px; font-weight: 600">00</p>
                        <p style="margin-top: 4px;">Menit</p>
                    </div>
                    <div style="text-align: center">
                        <p style="font-size: 34px; font-weight: 600">00</p>
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
        <section></section>
        <!-- MALE & FEMALE -->
        <section></section>
        <!-- MALE & FEMALE -->
        <section></section>
        <!-- EVENTS -->
        <section></section>
        <!-- LOCATION -->
        <section></section>
        <!-- GALLERY -->
        <section></section>
        <!-- GIFTS -->
        <section></section>
        <!-- GUEST BOX -->
        <section></section>
    </main>
    <footer></footer>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
