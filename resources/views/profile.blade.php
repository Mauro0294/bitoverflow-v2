<!DOCTYPE html>
<html lang="en">
<head>
        <title>BitOverflow | Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body class='bg-neutral-800'>
@extends('components.layouts.app')
@section('content')
    <div class='w-full'>
        <div class='px-4 lg:px-16 bg-neutral-900 py-14'>
            <h1 class='text-white text-3xl mb-10'>Jouw eigen profiel</h1>
            <div style='background-color:#383838' class='rounded-3xl text-white lg:w-[700px] p-6 relative'>
                <form action="{{ route('editProfile') }}" class='flex flex-col lg:w-[250px]' method="POST">
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
                        <img src='images/big_profile.png' class='rounded-full w-48 h-48'>
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
                <div class='mr-8 hidden lg:block'><img src='images/profile.png' class='rounded-full'></div>
                <div>
                    <div class='pb-2 mb-2 border-b-2 bg-black-500' style='border-color: #606060;'>
                        <p class='text-zinc-500 font-bold text-xs'>{{ $lastPost->date }}</p>
                        <p class='text-white font-bold text-xl lg:text-2xl'>{{ $user->first_name }} {{ $user->last_name }}</p>
                        <p class='text-zinc-500 font-bold text-xs'>{{ $user->school_year }}e jaars</p>
                    </div>
                    <span class="rounded-2xl bg-black px-6 py-1 font-bold text-center text-xs" id="tag">
                        {{ $lastPost->tag }}
                    </span>
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
    @endsection
</body>
</html>

<style>
    * {
      font-family: 'Montserrat', sans-serif;
    }
</style>