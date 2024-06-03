<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="grid grid-cols-2 h-screen bg-gray-100">
        <div><img src="{{ asset('images/background.jpg') }}" alt="" class="h-screen object-cover"></div>
        <div class="flex flex-col justify-center items-center  font-semibold">
            <div class="text-6xl text-third">MABELLO <br> CAFE</div>

            <div class="bg-third text-white rounded-lg p-4 w-[60%] mt-6">
                <div class="font-semibold text-3xl text-center">Register</div>
                <div class="mt-6">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-bold mb-2">
                                Name
                            </label>
                            <input id="name" type="text"
                                class="text-white placeholder:text-white bg-transparent border rounded-md w-full px-4 py-2 text-sm font-medium @error('email') is-invalid @enderror"
                                placeholder="Name" name="name">
                            @error('name')
                                <span class="invalid-feedback font-medium text-red-500 mb-4" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-bold mb-2">
                                Email
                            </label>
                            <input id="email" type="email"
                                class="text-white placeholder:text-white bg-transparent border rounded-md w-full px-4 py-2 text-sm font-medium @error('email') is-invalid @enderror"
                                placeholder="Email" name="email">
                            @error('email')
                                <span class="invalid-feedback font-medium text-red-500 mb-4" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-sm font-bold mb-2">
                                Password
                            </label>
                            <input id="password" type="password"
                                class="text-white placeholder:text-white bg-transparent border rounded-md w-full px-4 py-2 text-sm font-medium @error('password') is-invalid @enderror"
                                placeholder="Password" name="password">
                            @error('password')
                                <span class="invalid-feedback font-medium text-red-500  mb-4" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-sm font-bold mb-2">
                                Konfirmasi Password
                            </label>
                            <input id="password_confirmation" type="password"
                                class="text-white placeholder:text-white bg-transparent border rounded-md w-full px-4 py-2 text-sm font-medium @error('password') is-invalid @enderror"
                                placeholder="Password" name="password_confirmation">
                            @error('password_confirmation')
                                <span class="invalid-feedback font-medium text-red-500  mb-4" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <button type="submit"
                                class="bg-white text-third px-4 py-2 w-full rounded-lg font-medium">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
