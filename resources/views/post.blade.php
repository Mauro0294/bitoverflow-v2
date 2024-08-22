<!DOCTYPE html>
<html lang="en">
<head>
    <title>BitOverflow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body class='bg-neutral-800'>
    @extends('components.layouts.app')
    @section('content')
        <div class='px-4 lg:pl-16 pt-8 bg-neutral-900 pb-12 md:pb-48 w-full' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
            <!-- Post Section -->
            <h2 class='text-white  text-2xl lg:text-4xl mb-6 mt-6'>Bekijk post</h2>
            <div class="lg:w-2/3">
                <div class='my-6 lg:mt-0 bg-neutral-700 text-white py-8 px-7 rounded-3xl flex w-full' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                    <div class='mr-4 mt-3 hidden lg:block min-w-[50px]'>
                        <img src='{{ asset('images/profile.png') }}' class='rounded-full'>
                    </div>
                    <div class="w-full">
                        <div class='pb-2 mb-2 border-b-2 bg-black-500' style='border-color: #606060;'>
                            <p class='text-zinc-500 font-bold text-xs'>{{ $post->date }}</p>
                            <a href="{{ route('showUser', [$id = $post->user->id]) }}"><p class='text-white font-bold text-xl lg:text-2xl hover:text-gray-300 ease-in-out duration-300'>{{ $post->user->first_name }} {{ $post->user->last_name }}</p></a>
                            <p class='text-zinc-500 font-bold text-xs uppercase'>{{ $post->user->school_year }}e jaars</p>
                        </div>
                        <span class="rounded-2xl bg-black px-6 py-1 font-bold text-center text-xs" id="tag">{{ $tag }}</span>
                        <p class='text-zinc-500 font-bold text-xs mt-6 uppercase'>Onderwerp:</p>
                        <p class='text-white font-bold lg:text-xl'>{{ $post->subject }}</p>
                        <p class='text-zinc-500 font-bold text-xs mt-6 uppercase'>Beschrijving:</p>
                        <p class='text-white font-bold lg:text-xl'>{{ $post->description }}</p>
                        <div class='bg-black text-white p-4 hidden mt-4 lg:block rounded-2xl overflow-x-auto'>
                            <pre class="whitespace-pre-wrap text-white bg-black p-4 rounded-lg"><code class="language-{{ $tag }}">{{ $post->code }}</code></pre>
                        </div>
                        <div class='w-full flex items-center mt-12 text-sm lg:text-lg font-bold'>
                            <div class='flex'>
                                <span><a href="#commentForm"><button type='submit' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300 '>Reageer</button></a></span>
                            </div>
                            @if (Auth::check() && Auth::id() === $post->user_id)
                            <form method="POST" action="{{ route('destroyPost', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg ml-4">Verwijder post</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Comments Section -->
                <livewire:comment-section :post="$post" :comments="$comments" />
            </div>
        </div>
    </div>
    @endsection
</body>
</html>