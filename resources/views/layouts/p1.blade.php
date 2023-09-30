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
    </style>
</head>

<body style="background-color: #efefef; display: flex; width: 100%; align-items: center">
    <main style="margin: auto; width: 100%; max-width: 540px; background-color: white; overflow-x: hidden">
        <!-- INTRO FULL PAGE -->
        <section style="min-height: 100vh; position: relative">
            <img src="/uploads/{{ $invitation->gallery_1 }}" alt="gallery-1"
                style="height: 100vh; width: 100%; object-fit: cover" />
            <div
                style="position: absolute; width: 100%; height: 100%; left:0; top:0; background-color: rgba(0, 0, 0, 0.4)">
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
