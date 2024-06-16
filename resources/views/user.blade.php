<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="grid grid-cols-2 h-screen bg-gray-100">
        <div><img src="{{ asset('images/background.jpg') }}" alt="" class="h-screen object-cover"></div>
        <div class="flex flex-col justify-center items-center  font-semibold">
            <div class="text-6xl text-third">MABALLO <br> CAFE</div>
            <div class="mt-8">
                <a href="/login" class="bg-primary px-12 py-4 rounded-lg text-white text-xl">DOWNLOAD APP</a>
            </div>
            <div class="mt-4 bg-red-200 rounded-lg text-red-500">
                <ul>
                    <li class="py-2 rounded-md px-6 hover:bg-red-500 hover:text-white  transition">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fa-solid fa-right-from-bracket pr-1"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
