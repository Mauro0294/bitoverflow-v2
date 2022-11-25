<html>
    <head><script src="https://cdn.tailwindcss.com"></script>
    <title>BitOverflow | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /></head>
    <body>
        <div class="bg-black w-2/3 h-full fixed left-0 top-0 lg:block hidden">
            <img src="images/Frame_8.png" alt="img-1" style="width: 500px; height: auto;">
            <br>
            <img src="images/Frame_3.png" alt="img-2" style="width: 900px; height: auto;" class='absolute bottom-2 ml-24'>
        </div>
        <div>
        <div style="background-color: #242424;" class="lg:w-1/3 h-full lg:fixed right-0 top-0">
            <div>
                <div class="flex flex-col items-center lg:mt-40 pt-8">
                    <h1 style="font-family: Laro;" class="text-white text-2xl">BITOVERFLOW</h1>
                    <p style="font-family: Poppins;" class="text-lg text-zinc-500">LOGIN</p>
                </div>
            </div>

            <form method="POST" class="flex flex-col items-center mt-20">
                <p style="font-family: Laro;" class="mb-2 text-white">E-MAIL:</p>
                <input type="email" class="rounded-full px-3 py-2 text-white outline-none" style="background-color: #3D3D3D; font-family: Laro;" name="email" placeholder="E-MAIL" >
                <p style="font-family: Laro;" class="mb-2 mt-4 text-white">WACHTWOORD:</p>
                <div class="flex">
                    <input type="password" class="rounded-full px-3 py-2 text-white outline-none" name="password" id="myInput" style="background-color: #3D3D3D; font-family: Laro;" placeholder="WACHTWOORD">
                </div>
                <input type='submit' style="color:white; font-family: Laro;" class="mt-12 rounded-full bg-neutral-700 ease-in-out duration-300 hover:bg-neutral-500  px-24 py-2" value="SUBMIT">
            </form>

        <div class="flex justify-center">
            <p style="color:white; font-family: Laro;" class="absolute bottom-4 font-light">GEEN ACCOUNT? <a href="{{ route('register') }}" style="font-family: Laro;" class="text-sky-500 hover:text-sky-700 ease-in-out duration-300">REGISTREER</a></p>
        </div>
    </body>
</html>