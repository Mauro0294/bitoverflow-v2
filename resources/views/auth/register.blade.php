<html>
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>BitOverflow | Registreer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body class="bg-[#242424]">
  <div class="bg-black w-2/3 h-full fixed left-0 top-0 hidden lg:block">
    <img src="images/Frame_8.png" alt="img-1" style="width: 500px; height: auto;">
    <br>
    <img src="images/Frame_3.png" alt="img-2" style="width: 900px; height: auto;" class='absolute bottom-2'>
  </div>
  <div>
    <div class="lg:w-5/12 h-full lg:fixed right-0 top-0 pl-1 z-0 bg-[#242424]">
      <div>
        <div class="flex flex-col items-center lg:mt-40 mt-6">
          <h1 class="text-2xl text-white font-bold">BITOVERFLOW</h1>
          <p style="color:gray;" class="text-lg mb-4">Register</p>
        </div>
      </div>

      <form method='POST' action={{ route('registerRequest') }} class="flex flex-col items-center mt-10">
        @csrf
        <div class="grid gap-4 lg:grid-cols-2 ">
          <div style="justify-content: space-between;">
            <p class="ml-2 mb-2 text-white">Voornaam:</p>
            <input type="text" name='first_name' class="rounded-full lg:px-3 py-2 pl-4 text-white outline-none ml-1 bg-[#3D3D3D]" placeholder="Voornaam">
          </div>
          <div>
            <p class="ml-2 mb-2 text-white">Achternaam:</p>
            <input type="text" name='last_name' class="rounded-full lg:px-3 px-1 py-2 pl-4 text-white outline-none bg-[#3D3D3D]" placeholder="Achternaam">
          </div>
          <div>
            <p class="ml-2 mb-2 text-white">E-mail:</p>
            <input type="email" name='email' class="rounded-full lg:px-3 px-1 py-2 pl-4 text-white outline-none bg-[#3D3D3D]" placeholder="E-mail">
          </div>
          <div>
              <p class="ml-2 mb-2 text-white">Wachtwoord:</p>
              <div class="flex">
              <input type="password" name='password' id="myInput" class="rounded-full lg:px-3 px-1 py-2 pl-4 text-white outline-none bg-[#3D3D3D]" placeholder="Wachtwoord">
            </div>
          </div>
          <div class="mt-2">
            <p class="ml-2 text-white">Leerjaar</p>
            <select name='school_year' class="rounded-full lg:px-3 px-1 py-2 text-white mt-3 pl-4 outline-none bg-[#3D3D3D]">
              <option value="1">Leerjaar 1</option>
              <option value="2">Leerjaar 2</option>
              <option value="3">Leerjaar 3</option>
            </select>
          </div>
        </div>
        <button type='submit' name='submit' class="rounded-full bg-neutral-700 hover:bg-neutral-500 px-20 py-2 mt-16 mb-24 text-white ease-in-out duration-300">Submit</button>
      </form>
      <div class="flex justify-center">
        <p class="mb-6 absolute lg:bottom-0 text-white cursor-default pb-6 lg:text-base text-sm">Heb je al een account? <a href="{{ route('login') }}" class="text-sky-500 hover:text-sky-700 ease-in-out duration-300">Login</a></p>
      </div>
</body>
</html>

<style>
  * {
    font-family: 'Montserrat', sans-serif;
  }
</style>