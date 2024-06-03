<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-BE-2asW1.css') }}">
</head>

<body>
    <div class="grid grid-cols-2 h-screen bg-gray-100">
        <div><img src="{{ asset('images/background.jpg') }}" alt="" class="h-screen object-cover"></div>
        <div class="flex flex-col justify-center items-center  font-semibold">
            <div class="text-6xl text-third">MABELLO <br> CAFE</div>
            <div class="mt-8">
                <a href="/login" class="bg-primary px-12 py-4 rounded-lg text-white text-xl">GET STARTED</a>
            </div>
        </div>
    </div>
</body>

</html>
