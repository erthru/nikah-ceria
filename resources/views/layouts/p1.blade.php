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
    </style>
</head>

<body style="background-color: #efefef; display: flex; width: 100%; align-items: center">
    <main style="margin: auto; width: 100%; max-width: 540px; background-color: white; overflow-x: hidden;">
        <!-- INTRO FULL PAGE -->
        <section style="min-height: 100vh; position: relative; padding: 16px;">
            <div style="z-index: 10; position: relative; color: white; padding-top: 60px;">
                <p style="width: 100%; text-align: center; font-size: 18px; ">The Wedding of</p>
                <p
                    style="width: 100%; font-weight: 600; text-align: center; font-size: 32px; margin-top: 6px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                    {{ $invitation->name }}
                </p>
                <p style="width: 100%; text-align: center; margin-top: 8px; font-size: 14px">{{ $invitationEvents[0]->event_at }}</p>
            </div>
            <img src="/uploads/{{ $invitation->gallery_1 }}" alt="gallery-1"
                style="height: 100vh; width: 100%; object-fit: cover; position: absolute; top:0; left: 0" />
            <div
                style="position: absolute; width: 100%; height: 100%; left:0; top:0; background-color: rgba(0, 0, 0, 0.6)">
            </div>
        </section>
        <!-- ACTIVE OR LAST & COUNTDOWN -->
        <section></section>
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
</body>

</html>
