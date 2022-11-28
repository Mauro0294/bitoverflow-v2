<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
        <title>BitOverflow | Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body class='bg-neutral-800'>
    <div class='flex items-center p-3 w-full justify-between'>
        <a href="home.php">
            <h2 class='font-bold uppercase text-white text-lg lg:text-xl'>BitOverflow</h2>
        </a>
        <div class='flex'>
            <a href="{{ route('profile') }}"><button class='text-sm lg:text-lg text-white px-4 py-1 rounded-full flex items-center font-bold hover:bg-blue-700 ease-in-out duration-300 bg-blue-900'>Mijn profiel</button></a>
            <a href="{{ route('logout') }}" class='ml-8 hidden lg:block'><button class='text-sm lg:text-lg text-white px-4 py-1 rounded-full flex items-center font-bold hover:bg-red-700 ease-in-out duration-300 bg-red-900'>Uitloggen</button></a>
        </div>
    </div>
    <div class='flex'>
        <div class='hidden lg:block'>
            <aside class='text-white font-bold' style='width: 175px;'>
                <div class='bg-neutral-700 pl-3 uppercase'>Categorieën</div>
                <a href="{{ route('home') }}"><button class='pl-3 flex items-center my-2 cursor-pointer hover:text-gray-300 ease-in-out duration-300'><img src='icons/house.svg' class='pr-2'>Home</button></a>
                <div class='bg-neutral-700 pl-3 uppercase'>Leerjaren</div>
                <a href="{{ url('posts/year1') }}">
                    <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar1.svg' class='pr-2'>1e jaar</button></div>
                </a>
                <a href="{{ url('posts/year2') }}">
                    <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar2.svg' class='pr-2'>2e jaar</button></div>
                </a>
                <a href="{{ url('posts/year3') }}"><button class='pl-3 py-2 flex items-center hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar3.svg' class='pr-2'>3e jaar</button></a>
                <div class='bg-neutral-700 pl-3 uppercase'>Talen</div>
                <a href="{{ url('posts/php') }}">
                    <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar1.svg' class='pr-2'>PHP</button></div>
                </a>
                <a href="{{ url('posts/javascript') }}">
                    <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar2.svg' class='pr-2'>JAVASCRIPT</button></div>
                </a>
                <a href="{{ url('posts/python') }}">
                    <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar1.svg' class='pr-2'>PYTHON</button></div>
                </a>
                <a href="{{ url('posts/laravel') }}">
                    <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar2.svg' class='pr-2'>LARAVEL</button></div>
                </a>
                <a href="{{ url('posts/html') }}">
                    <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar1.svg' class='pr-2'>HTML</button></div>
                </a>
                <a href="{{ url('posts/css') }}"><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar2.svg' class='pr-2'>CSS</button></a>
            </aside>
        </div>
        <div class='w-full'>
            <div class='px-4 lg:px-16 bg-neutral-900 py-14'>
                <h1 class='text-white text-3xl mb-10'>Jouw eigen profiel</h1>
                <div style='background-color:#383838' class='rounded-3xl text-white lg:w-[700px] p-6 relative'>
                    <form action="{{ route('editProfile') }}" class='flex flex-col inline lg:w-[250px]' method="POST">
                        @csrf
                        <label for="username" class='text-xs ml-2 mb-2'>Naam</label>
                        <input style='background-color: #202020;' disabled type="text" name="username" id="username" placeholder="Naam" value="{{ $user->first_name }} {{ $user->last_name }}" class='rounded-3xl px-2.5 py-1.5 mb-4'>
                        <label for="email" class='ml-2 mb-2 text-xs'>E-mail</label>
                        <input style='background-color: #202020;' type="email" name="email" id="email" placeholder="E-mail" value="{{ $user->email }}" class='rounded-3xl px-2.5 py-1.5 mb-4'>
                        <label for="email" class='ml-2 mb-2 text-xs'>Leerjaar</label>
                        <select style='background-color: #202020;' name='school_year' class='px-2 mb-4 py-1.5 rounded-3xl'>
                            <option value='{{ $user->school_year }}' selected disabled hidden>Leerjaar {{ $user->school_year }}</option>
                            <option value='1' id='option1'>Leerjaar 1</option>
                            <option value='2' id='option2'>Leerjaar 2</option>
                            <option value='3' id='option3'>Leerjaar 3</option>
                        </select>
                        <label for="password" class='ml-2 mb-2 text-xs'>Wachtwoord</label>
                        <input style='background-color: #202020;' disabled type="password" name="password" id="password" placeholder="Wachtwoord" value="{{ $user->password }}" class='rounded-3xl px-2.5 py-1.5 mb-4'>
                        <label for="profile_picture_url" class='ml-2 mb-2 text-xs'>Profielfoto url</label>
                        <input style='background-color: #202020;' type="text" name="img_url" disabled id="profile_picture_url" class='rounded-3xl px-2.5 py-1.5 mb-4'>
                        <label for="biography" class='ml-2 mb-2 text-xs'>Biografie</label>
                        <textarea name="biography" id="biography" cols="30" rows="10" class='bg-[#202020] lg:w-[600px] lg:h-[130px] rounded-2xl px-2.5 py-1.5 mb-4'>{{ $user->biography }}</textarea>
                        <input type="submit" name="submit" value="Change" class='bg-white rounded-3xl text-black text-xl py-2 px-12 cursor-pointer mb-5 lg:mb-0'>
                        <div class='absolute right-24 top-24 hidden lg:block'>
                            <img src='/images/big_profile.png' class='rounded-full w-48 h-48'>
                            <p class='text-center mt-4'>{{ $user->first_name }} {{ $user->last_name }}</p>
                        </div>
                    </form>
                </div>
                <h2 class='text-white text-3xl pt-16 pb-8'>Een kijkje in je statistieken</h2>
                <div style='background: #383838;' class='mb-16 flex flex-col lg:flex-row justify-between lg:px-32 text-white py-16 rounded-3xl text-xl'>
                    <p class='text-center'>TODO<br /> upvotes<br />gekregen</p>
                    <p class='text-center my-12 lg:my-0'>TODO<br />reacties<br />geplaatst</span></p>
                    <p class='text-center'>{{ $postsCount }}<br /> 
                        @if ($postsCount == 1) vraag @else vragen @endif<br />gesteld</p>
                </div>

                <h2 class='text-white text-3xl pb-8'>Mijn nieuwste post</h2>

                <div class='mt-6 lg:mt-0 bg-neutral-700 text-white py-8 px-7 mb-20 rounded-3xl flex w-full' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                    <div class='mr-8 hidden lg:block'><img src='/images/profile.png' class='rounded-full'></div>
                    <div>
                        <div class='pb-2 mb-2 border-b-2 bg-black-500' style='border-color: #606060;'>
                                <p class='text-zinc-500 font-bold text-xs'>{{ $lastPost->date }}</p>
                                <p class='text-white font-bold text-xl lg:text-2xl'>{{ $user->first_name }} {{ $user->last_name }}</p>
                                <p class='text-zinc-500 font-bold text-xs'>{{ $user->school_year }}e jaars</p>
                        </div>
                        <span class="rounded-2xl bg-black px-6 py-1 font-bold text-center text-xs" id="tag">{{ $lastPost->tag }}</span>
                        <p class='text-zinc-500 font-bold text-xs mt-6'>Onderwerp:</p>
                        <p class='text-white font-bold lg:text-xl break-all'>{{ $lastPost->subject }}</p>
                        <p class='text-zinc-500 font-bold text-xs mt-6'>Beschrijving:</p>
                        <p class='text-white font-bold text-lg mb-8'>{{ $lastPost->description }}</p>
                        <div class='bg-black text-white p-4 hidden lg:block rounded-2xl'>
                            <code>
                                {{ $lastPost->code }}
                            </code>
                        </div>
                        <form method='POST'>
                            <div class='w-full flex justify-between items-center mt-12 text-3xl font-bold'>
                                <div class='flex'>
                                    <span class='px-4 py-1 flex items-center justify-center font-bold text-xl lg:text-2xl rounded-3xl ml-6' id='score' style=''><span id='operator'></span>
                                    </span>
                                </div>
                                <div class='flex'>
                                    <span class='hidden lg:block'><button class='bg-gray-200 py-1 px-8 rounded-2xl text-black uppercase text-2xl'>Antwoord</button></span>
                                    <span class='w-10 h-10 flex items-center justify-center font-bold rounded-full ml-2 bg-white block lg:hidden'><img class='w-5' src='icons/chat.svg'></span>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            <div class='bg-neutral-700 text-white py-8 px-7 hidden lg:block rounded-3xl lg:w-[345px] lg:h-[685px] top-48 absolute right-16' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                <h3 class='text-xl flex justify-center lg:text-3xl ml-3 mt-3 font-bold pl-1'>Top 3 Studenten:</h3>
                <h3 class='text-xl flex justify-center lg:text-xs ml-3 mt-2 font-bold pl-2 text-neutral-500'>IN DE AFGELOPEN 24 UUR</h3>
                <div class='flex justify-center items-center'><span class='bg-green-500 w-16 h-16 p-2 mt-12 flex items-center justify-center font-bold text-4xl rounded-full'>1</span></div>
                <h3 class='text-xl flex justify-center lg:text-3xl ml-3 mt-3 font-bold pl-2'>Mauro Scheltens</h3>
                <h3 class='text-xl flex justify-center lg:text-xs ml-3 mt-2 font-bold pl-2 text-neutral-500'>HIELP 8 LEERLINGEN</h3>
                <div class='flex justify-center items-center'><span class='bg-yellow-500 w-16 h-16 p-2 mt-12 flex items-center justify-center font-bold text-4xl rounded-full'>2</span></div>
                <h3 class='text-xl flex justify-center lg:text-3xl ml-3 mt-3 font-bold pl-2'>Kasper Ligthart</h3>
                <h3 class='text-xl flex justify-center lg:text-xs ml-3 mt-2 font-bold pl-2 text-neutral-500'>HIELP 5 LEERLINGEN</h2>
                    <div class='flex justify-center items-center'><span class='bg-orange-600 w-16 h-16 p-2 mt-12 flex items-center justify-center font-bold text-4xl rounded-full'>3</span></div>
                    <h3 class='text-xl flex justify-center lg:text-3xl ml-3 mt-3 font-bold pl-2'>Jean Kalo</h3>
                    <h3 class='text-xl flex justify-center lg:text-xs ml-3 mt-2 font-bold pl-2 text-neutral-500''>HIELP 3 LEERLINGEN</h2>
            </div>
            <div class='flex items-center py-8 lg:pl-8 px-6 lg:px-0 lg:pr-24 w-full justify-between w-full'>
                <h2 class='font-bold uppercase text-white text-lg lg:ml-48 cursor-pointer hover:text-gray-300 ease-in-out duration-300'>BitOverflow</h2>
                <div>
                    <ul class='text-x lg:text-lg'>
                        <li class='font-bold uppercase text-white cursor-pointer hover:text-gray-300 ease-in-out duration-300'>Guidelines</li>
                        <li class='font-bold uppercase text-white cursor-pointer hover:text-gray-300 ease-in-out duration-300'>Privacy</li>
                        <li class='font-bold uppercase text-white cursor-pointer hover:text-gray-300 ease-in-out duration-300'>Disclaimer</li>
                        <li class='font-bold uppercase text-white cursor-pointer hover:text-gray-300 ease-in-out duration-300'>Bit-Academy</li>
                    </ul>
                </div>
</body>
</html>

<style>
    * {
      font-family: 'Montserrat', sans-serif;
    }
</style>