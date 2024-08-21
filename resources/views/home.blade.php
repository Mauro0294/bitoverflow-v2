<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bitoverflow | Home</title>
    </head>
    <body class='bg-neutral-800'>
        @extends('components.layouts.app')
        @section('content')
            <div class='px-4 lg:pl-16 pt-8 bg-neutral-900 pb-12 md:pb-48 w-full' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                <h2 class='text-white  text-2xl lg:text-4xl mb-6 lg:ml-7 font-bold'>Goedemorgen {{ $user->first_name }}!
                </h2>
                <div class='bg-neutral-700 text-white py-8 px-7 rounded-3xl lg:w-[900px]'>
                    <h3 class='text-base lg:text-2xl font'>Wat zijn de meest trending topics?</h3>
                    <div class='mt-8 flex justify-between'>
                        <div>
                            <div class='flex items-center'>
                                <span class='bg-green-500 w-10 h-10 p-2 flex items-center justify-center font-bold text-2xl rounded-full'>1</span>
                                <a href="{{ route('showPosts', ['tag' => strtolower($tags[0]->tag)]) }}" class='hover:text-gray-300 ease-in-out duration-300'><h3 class='text-xl lg:text-2xl ml-3 font-bold'>{{ $tags[0]->tag }}</h3></a>
                            </div>
                            @if ($tags->count() > 1)
                            <div class='flex items-center my-7'>
                                <span class='bg-yellow-500 w-10 h-10 p-2 flex items-center justify-center font-bold text-2xl rounded-full'>2</span>
                                <a href="{{ route('showPosts', ['tag' => strtolower($tags[1]->tag)]) }}" class='hover:text-gray-300 ease-in-out duration-300'><h3 class='text-xl lg:text-2xl ml-3 font-bold'>{{ $tags[1]->tag }}</h3></a>
                            </div>
                            @endif
                            @if ($tags->count() > 2)
                            <div class='flex items-center'>
                                <span class='bg-orange-600 w-10 h-10 p-2 flex items-center justify-center font-bold text-2xl rounded-full'>3</span>
                                <a href="{{ route('showPosts', ['tag' => strtolower($tags[2]->tag)]) }}" class='hover:text-gray-300 ease-in-out duration-300'><h3 class='text-xl lg:text-2xl ml-3 font-bold'>{{ $tags[2]->tag }}</h3></a>
                            </div>
                            @endif
                        </div>
                        <div>
                            <img src='images/grafiek.png' class='rounded-3xl h-[175px] w-[325px] float-right hidden lg:block'>
                        </div>
                    </div>
                </div>
                <div class='bg-neutral-700 text-white py-2 px-7 hidden 2xl:block rounded-3xl lg:w-[345px] lg:h-[298px] top-40 xl:absolute right-0 mt-8 xl:mt-0 xl:mr-4' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                    <h3 class='text-xl flex justify-center lg:text-3xl ml-3 mt-3 font-bold pl-2'>Bekijk alle posts</h3>
                    <h3 class='flex justify-center text-xs ml-3 mt-2 font-bold pl-2 text-neutral-500 text-center'>VAN IEDEREEN & ELK LEERJAAR</h3>
                    <div class='flex justify-center items-center'><span class='bg-green-500 w-16 h-16 p-2 mt-10 lg:ml-4 ml-2 flex items-center justify-center font-bold text-4xl rounded-full'>{{ $postsCount }}</span></div>
                    <h3 class='flex justify-center text-xs ml-3 mt-3 font-bold pl-2 text-neutral-500 text-center'>POSTS TOTAAL</h3>
                    <div class='flex justify-center w-[300px]'><a href="{{ route('showAllPosts') }}" class='text-xl lg:text-2xl ml-3 font-bold pl-2 py-1 mt-8 bg-blue-900 rounded-full w-[200px] text-center cursor-pointer hover:bg-blue-700 transition duration-150 ease-out'>Bekijk</a></div>
                </div>
                <div class='text-white px-1 lg:px-7 rounded-3xl lg:flex justify-between items-center w-full lg:w-[900px]'>
                    <div class='block lg:hidden my-10'>
                        <a href="{{ route('showAllPosts') }}"><button class='text-sm lg:text-lg text-white px-5 py-1 2xl:hidden rounded-md h-12 mb-4 lg:mb-0 font-bold hover:bg-blue-700 ease-in-out duration-300 bg-blue-900'>Alle Posts!</button></a>
                        <a href="{{ route('createPost') }}"><button class='ml-4 text-sm lg:text-lg text-white px-5 py-1 rounded-md h-12 font-bold hover:bg-blue-700 ease-in-out duration-300 bg-blue-900'>Stel een vraag!</button></a>
                    </div>
                    <h2 class='text-white font-bold text-xl lg:text-3xl my-10'>Wie is er op zoek naar hulp?</h2>
                    <div class=' justify-between hidden lg:block'>
                        <a href="{{ route('showAllPosts') }}"><button class='text-sm lg:text-lg text-white px-5 py-1 2xl:hidden rounded-full h-12 mb-4 lg:mb-0 font-bold hover:bg-blue-700 ease-in-out duration-300 bg-blue-900'>Alle Posts!</button></a>
                        <a href="{{ route('createPost') }}"><button class='text-sm lg:text-lg text-white px-5 py-1 rounded-md h-12 font-bold hover:bg-blue-700 ease-in-out duration-300 bg-blue-900'>Stel een vraag!</button></a>
                    </div>
                </div>
                <div class='mt-6 lg:mt-0 bg-neutral-700 text-white py-8 px-7 rounded-3xl flex lg:w-[900px]' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                    <div class='mr-8 hidden lg:block'>
                        <img src='images/profile.png' class='w-24 rounded-3xl'>
                    </div>
                    <div>
                        <div class='pb-2 mb-2 border-b-2 bg-black-500' style='border-color: #606060;'>
                            <p class='text-zinc-500 font-bold text-xs'>{{ $lastPost->date }}</p>
                            <a href="{{ route('showUser', [$id = $lastPost->user->id]) }}"><p class='text-white font-bold text-xl lg:text-2xl hover:text-gray-300 ease-in-out duration-300'>{{ $lastPost->user->first_name }} {{ $lastPost->user->last_name }}</p></a>
                            <p class='text-zinc-500 font-bold text-xs uppercase'>{{ $lastPost->user->school_year }}e jaars</p>
                        </div>
                        <p class='text-zinc-500 font-bold text-xs mt-6 uppercase'>Onderwerp:</p>
                        <p class='text-white font-bold lg:text-xl'>{{ $lastPost->subject }}</p>
                            <div class='flex mt-8'>
                                <a href="{{ route('showPost', ['id' => $lastPost->id]) }}"><span><button class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300 text-sm lg:text-lg'>Bekijk</button></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='w-full lg:hidden mt-8 flex justify-center'>
                    <a href="{{ route('logout') }}"><button class='text-sm lg:text-lg text-white px-4 py-2 rounded-full flex items-center font-bold hover:bg-red-700 ease-in-out duration-300 bg-red-900'>Uitloggen</button></a>
                </div>
            </div>
        </div>
        @endsection
    </body>
</html>