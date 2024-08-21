@extends('components.layouts.app')

@section('content')
<body class='bg-neutral-800'>
    <div class='w-full'>
        <div class='px-4 lg:px-16 bg-neutral-900 py-14'>
            <h1 class='text-white text-3xl mb-10'>Profiel van {{ $user->first_name }} {{ $user->last_name }}</h1>
            <div style='background-color:#383838' class='rounded-3xl text-white lg:w-[700px] p-6 relative'>
                <div class='flex flex-col lg:w-[250px]'>
                    <label class='text-xs ml-2 mb-2'>Naam</label>
                    <p style='background-color: #202020;' class='rounded-3xl px-2.5 py-1.5 mb-4'>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </p>
                    <label class='ml-2 mb-2 text-xs'>Leerjaar</label>
                    <p style='background-color: #202020;' class='rounded-3xl px-2.5 py-1.5 mb-4'>
                        Leerjaar {{ $user->school_year }}
                    </p>
                    <label class='ml-2 mb-2 text-xs'>Biografie</label>
                    <p style='background-color: #202020;' class='lg:w-[600px] lg:h-[130px] rounded-2xl px-2.5 py-1.5 mb-4'>
                        {{ $user->biography }}
                    </p>
                </div>
                <div class='absolute right-24 top-4 hidden lg:block'>
                    <img src='{{ $user->profile_picture_url ?? asset('images/big_profile.png') }}' class='rounded-full w-32 h-32'>
                    <p class='text-center mt-4'>{{ $user->first_name }} {{ $user->last_name }}</p>
                </div>
            </div>
            @if ($lastPost !== null)
                <div class="mt-12">
                    <h2 class='text-white text-3xl pb-8'>{{ $user->first_name }}'s nieuwste post</h2>
    
                    <div class='mt-6 lg:mt-0 bg-neutral-700 text-white py-8 px-7 rounded-3xl flex lg:w-[900px]' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                        <div class='mr-8 hidden lg:block'>
                            <img src='{{ asset('images/profile.png')}}' class='w-12 rounded-3xl'>
                        </div>
                        <div>
                            <div class='pb-2 mb-2 border-b-2 bg-black-500' style='border-color: #606060;'>
                                <p class='text-zinc-500 font-bold text-xs'>{{ $lastPost->date }}</p>
                                <p class='text-white font-bold text-xl lg:text-2xl'>{{ $lastPost->user->first_name }} {{ $lastPost->user->last_name }}</p>
                                <p class='text-zinc-500 font-bold text-xs uppercase'>{{ $lastPost->user->school_year }}e jaars</p>
                            </div>
                            <p class='text-zinc-500 font-bold text-xs mt-6 uppercase'>Onderwerp:</p>
                            <p class='text-white font-bold lg:text-xl'>{{ $lastPost->subject }}</p>
                                <div class='flex mt-8'>
                                    <a href="{{ route('showPost', ['id' => $lastPost->id]) }}"><span><button class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300 text-lg'>Bekijk</button></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
</body>
@endsection