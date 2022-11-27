<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>BitOverflow | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="bg-black w-2/3 h-full fixed left-0 top-0 lg:block hidden">
            <img src="images/Frame_8.png" alt="img-1" style="width: 500px; height: auto;">
            <br>
            <img src="images/Frame_3.png" alt="img-2" style="width: 900px; height: auto;" class='absolute bottom-2 ml-24'>
        </div>
        <div>
        <div class="lg:w-1/3 h-full lg:fixed right-0 top-0 bg-[#242424]">
            <div>
                <div class="flex flex-col items-center lg:mt-40 pt-8">
                    <h1 class="text-white text-2xl font-bold">BITOVERFLOW</h1>
                    <p class="text-lg text-zinc-500">Login</p>
                </div>
            </div>

            <form method="POST" action="{{ route('loginRequest') }}" class="flex flex-col items-center mt-20">
                @csrf
                <p class="mb-2 text-white">E-mail:</p>
                <input type="email" class="rounded-full px-3 py-2 text-white outline-none bg-[#3D3D3D]" name="email" placeholder="E-mail" >
                <p class="mb-2 mt-4 text-white">Wachtwoord:</p>
                <div class="flex">
                    <input type="password" class="rounded-full px-3 py-2 text-white outline-none bg-[#3D3D3D]" name="password" id="myInput" placeholder="Wachtwoord">
                </div>
                <input type='submit' class="text-white mt-12 rounded-full bg-neutral-700 ease-in-out duration-300 hover:bg-neutral-500  px-24 py-2" value="Submit">
            </form>

        <div class="flex justify-center">
            <p class="text-white absolute bottom-4 font-light">Geen account? <a href="{{ route('register') }}" class="text-sky-500 hover:text-sky-700 ease-in-out duration-300">Registreer</a></p>
        </div>
    </body>
</html>

<style>
    * {
      font-family: 'Montserrat', sans-serif;
    }
</style>