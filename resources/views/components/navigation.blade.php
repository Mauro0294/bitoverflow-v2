<div class='flex items-center p-3 w-full justify-between'>
    <a href="{{ route('home') }}">
        <h2 class='font-bold uppercase text-white text-lg lg:text-xl'>BitOverflow</h2>
    </a>
    <div class='flex'>
        <a href="{{ route('profile') }}"><button class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300 text-md'>Mijn profiel</button></a>
        <a href="{{ route('logout') }}" class='ml-8 hidden lg:block'><button class='text-white font-bold py-2 px-6 rounded-md transition text-md hover:bg-red-700 ease-in-out duration-300 bg-red-900'>Uitloggen</button></a>
    </div>
</div>
<div class='flex'>
    <div class='hidden lg:block'>
        <aside class='text-white font-bold' style='width: 175px;'>
            <div class='bg-neutral-700 pl-3 uppercase'>Categorieën</div>
            <a href="{{ route('home') }}"><button class='pl-3 flex items-center my-2 cursor-pointer hover:text-gray-300 ease-in-out duration-300'><img src='/icons/house.svg' class='pr-2'>Home</button></a>
            <div class='bg-neutral-700 pl-3 uppercase'>Leerjaren</div>
            <a href="{{ url('posts/year/1') }}">
                <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar1.svg' class='pr-2'>1e jaar</button></div>
            </a>
            <a href="{{ url('posts/year/2') }}">
                <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar2.svg' class='pr-2'>2e jaar</button></div>
            </a>
            <a href="{{ url('posts/year/3') }}"><button class='pl-3 py-2 flex items-center hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar3.svg' class='pr-2'>3e jaar</button></a>
            <div class='bg-neutral-700 pl-3 uppercase'>Talen</div>
            <a href="{{ url('posts/php') }}">
                <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar1.svg' class='pr-2'>PHP</button></div>
            </a>
            <a href="{{ url('posts/javascript') }}">
                <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar2.svg' class='pr-2'>JAVASCRIPT</button></div>
            </a>
            <a href="{{ url('posts/python') }}">
                <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar1.svg' class='pr-2'>PYTHON</button></div>
            </a>
            <a href="{{ url('posts/laravel') }}">
                <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar2.svg' class='pr-2'>LARAVEL</button></div>
            </a>
            <a href="{{ url('posts/html') }}">
                <div class='border-b-2 border-neutral-700'><button class='py-2 pl-3 flex items-center mt-1 hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar1.svg' class='pr-2'>HTML</button></div>
            </a>
            <a href="{{ url('posts/css') }}"><button class='py-2 pl-3 flex items-center pt-2 hover:text-gray-300 ease-in-out duration-300'><img src='/icons/leerjaar2.svg' class='pr-2'>CSS</button></a>
        </aside>
    </div>