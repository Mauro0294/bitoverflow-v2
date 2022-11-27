<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitoverflow | Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class='bg-neutral-800'>
    <div class='flex items-center p-3 w-full justify-between'>
        <a href="{{ route('home') }}">
            <h2 class='font-bold uppercase text-white text-lg lg:text-xl'>BitOverflow</h2>
        </a>
        <a href="{{ route('profile') }}"><button class='text-sm lg:text-lg text-white px-4 py-1 rounded-full flex items-center font-bold hover:bg-blue-700 ease-in-out duration-300 bg-blue-900'>Mijn profiel</button></a>
    </div>
    <div class='flex'>
        <div class='hidden lg:block'>
            <aside class='text-white font-bold' style='width: 175px;'>
                <div class='bg-neutral-700 pl-3 uppercase'>Categorieën</div>
                <a href="{{ route('home') }}"><button class='pl-3 flex items-center my-2 cursor-pointer hover:text-gray-300 ease-in-out duration-300'><img src='icons/house.svg' class='pr-2'>Home</button></a>
                <div class='bg-neutral-700 pl-3 uppercase'>Leerjaren</div>
                <a href="{{ url('posts/year1') }}"><div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar1.svg' class='pr-2'>1e jaar</button></div></a>
                <a href="{{ url('posts/year2') }}"><div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar2.svg' class='pr-2'>2e jaar</button></div></a>
                <a href="{{ url('posts/year3') }}"><button class='pl-3 py-2 flex items-center hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar3.svg' class='pr-2'>3e jaar</button></a>
                <div class='bg-neutral-700 pl-3 uppercase'>Talen</div>
                <a href="{{ url('posts/php') }}"><div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar1.svg' class='pr-2'>PHP</button></div></a>
                <a href="{{ url('posts/javascript') }}"><div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar2.svg' class='pr-2'>JAVASCRIPT</button></div></a>
                <a href="{{ url('posts/python') }}"><div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar1.svg' class='pr-2'>PYTHON</button></div></a>
                <a href="{{ url('posts/laravel') }}"><div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar2.svg' class='pr-2'>LARAVEL</button></div></a>
                <a href="{{ url('posts/html') }}"><div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar1.svg' class='pr-2'>HTML</button></div></a>
                <a href="{{ url('posts/css') }}"><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='icons/leerjaar2.svg' class='pr-2'>CSS</button></a>
            </aside>
        </div>
        <div class='px-4 lg:pl-16 pt-8 bg-neutral-900 pb-12 md:pb-48 w-full' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
            <h2 class='text-white  text-2xl lg:text-4xl mb-6 lg:ml-7 font-bold'>Goedemorgen {{ $user->first_name }}!</h2>
            <div class='bg-neutral-700 text-white py-8 px-7 rounded-3xl lg:w-[900px]'>
                <h3 class='text-base lg:text-2xl font'>Wat zijn vandaag de trending topics?</h3>
                <div class='mt-8 flex justify-between'>
                    <div>
                        <div class='flex items-center'><span class='bg-green-500 w-10 h-10 p-2 flex items-center justify-center font-bold text-2xl rounded-full'>1</span>
                            <h3 class='text-xl lg:text-2xl ml-3 font-bold'>Javascript</h3>
                        </div>
                        <div class='flex items-center my-7'><span class='bg-yellow-500 w-10 h-10 p-2 flex items-center justify-center font-bold text-2xl rounded-full'>2</span>
                            <h3 class='text-xl lg:text-2xl ml-3 font-bold'>Laravel</h3>
                        </div>
                        <div class='flex items-center'><span class='bg-orange-600 w-10 h-10 p-2 flex items-center justify-center font-bold text-2xl rounded-full'>3</span>
                            <h3 class='text-xl lg:text-2xl ml-3 font-bold'>Python</h3>
                        </div>
                    </div>
                    <div>
                        <img src='/images/grafiek.png' class='rounded-3xl h-[175px] w-[325px] float-right hidden lg:block'>
                    </div>
                </div>
            </div>
            <div class='bg-neutral-700 text-white py-2 px-7 hidden 2xl:block rounded-3xl lg:w-[345px] lg:h-[298px] top-40 xl:absolute right-0 mt-8 xl:mt-0 xl:mr-4' style='font-family: Poppins; box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                <h3 class='text-xl flex justify-center lg:text-3xl ml-3 mt-3 font-bold pl-2'>Bekijk alle posts</h3>
                <h3 class='text-xl flex justify-center text-xs ml-3 mt-2 font-bold pl-2 text-neutral-500 text-center'>VAN IEDEREEN & ELK LEERJAAR</h3>
                <div class='flex justify-center items-center'><span class='bg-green-500 w-16 h-16 p-2 mt-10 lg:ml-4 ml-2 flex items-center justify-center font-bold text-4xl rounded-full'>{{ $postsCount }}</span></div>
                <h3 class='text-xl flex justify-center text-xs ml-3 mt-3 font-bold pl-2 text-neutral-500 text-center'>POSTS TOTAAL</h3>
                <div class='flex justify-center w-[300px]'><a href="{{ route('postsIndex') }}" class='text-xl lg:text-2xl ml-3 font-bold pl-2 py-1 mt-8 bg-blue-900 rounded-full w-[200px] text-center cursor-pointer hover:bg-blue-700 transition duration-150 ease-out'>Bekijk</a></div>
            </div>
            <div class='text-white px-1 lg:px-7 rounded-3xl lg:flex justify-between items-center w-full lg:w-[900px]'>
                <h2 class='text-white font-bold text-xl lg:text-3xl my-10'>Wie is er op zoek naar hulp?</h2>
                <a href="{{ route('postsIndex') }}"><button class='text-sm lg:text-lg text-white px-5 py-1 block 2xl:hidden rounded-full h-12 font-bold hover:bg-blue-700 ease-in-out duration-300 bg-blue-900'>Alle Posts!</button></a>
                <a href="{{ route('createPost') }}"><button class='text-sm lg:text-lg text-white px-5 py-1 rounded-full h-12 font-bold hover:bg-blue-700 ease-in-out duration-300 bg-blue-900'>Stel een vraag!</button></a>
            </div>
            <div class='mt-6 lg:mt-0 bg-neutral-700 text-white py-8 px-7 rounded-3xl flex lg:w-[900px]' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                    <div class='mr-8 hidden lg:block'><img src='/images/profile.png' class='w-24 rounded-3xl'></div>
                    <div>
                        <div class='pb-2 mb-2 border-b-2 bg-black-500' style='border-color: #606060;'>
                            <p class='text-zinc-500 font-bold text-xs'>{{ $lastPost->date }}</p>
                            <p class='text-white font-bold text-xl lg:text-2xl'>{{ $lastPostUser->first_name }} {{ $lastPostUser->last_name }}</p>
                            <p class='text-zinc-500 font-bold text-xs uppercase'>{{ $lastPostUser->school_year }}e jaars</p>
                        </div>
                        <p class='text-zinc-500 font-bold text-xs mt-6 uppercase'>Onderwerp:</p>
                        <p class='text-white font-bold lg:text-xl break-all'>{{ $lastPost->subject }}</p>
                        <p class='text-zinc-500 font-bold text-xs mt-6 uppercase'>Beschrijving:</p>
                        <p class='text-white font-bold text-lg mb-8'>
                            {{ $lastPost->description }}
                        </p>
                        <div class='bg-black text-white p-4 hidden lg:block rounded-2xl'>
                            <code>
                                {{ $lastPost->code }}
                            </code>
                        </div>
                        <form method='POST' action="/posts/actions/vote.php">
                            <input type="hidden" name="post_id" value=".">
                            <input type="hidden" name="post_user_id" value=".">
                            <input type="hidden" name="user_id" value=".">
                            <div class='w-full flex justify-between items-center mt-12 text-3xl font-bold'>
                                <div class='flex'>
                                <button type='submit' name='upvote'
                                ><span class='w-10 h-10 lg:w-12 lg:h-12 p-2 flex items-center justify-center font-bold text-2xl rounded-full mr-6 ml-2' style='background: #5BFF61'><img src='icons/up_arrow.svg'></span></button>
                                <button type="submit" name="downvote"
                                ><span class='w-10 h-10 cursor-pointer lg:w-12 lg:h-12 p-2 flex items-center justify-center font-bold text-2xl rounded-full' style='background: #FF5959'><img src='icons/down_arrow.svg'></span></button>
                                <span class='px-4 py-1 flex items-center justify-center font-bold text-xl lg:text-2xl rounded-3xl ml-6' id='score' style=' font-family: Poppins'><span id='operator'></span>
                                    </span>
                                </div>
                                <div class='flex'>
                                    <span class='hidden lg:block'><button class='bg-gray-200 hover:bg-gray-300 ease-in-out duration-300 py-1 px-8 rounded-2xl text-black uppercase text-2xl'>Antwoord</button></span>
                                    <span class='w-10 h-10 flex items-center justify-center font-bold rounded-full ml-2 bg-white block lg:hidden'><img class='w-5' src='icons/chat.svg'></span>
                                </div>
                            </div>
                    </div>
            </div>
        </div>
    </div>
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