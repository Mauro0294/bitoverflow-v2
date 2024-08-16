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
            <div class="w-2/3">
                <div class='my-6 lg:mt-0 bg-neutral-700 text-white py-8 px-7 rounded-3xl flex w-full' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                    <div class='mr-4 mt-3 hidden lg:block min-w-[50px]'>
                        <img src='{{ asset('images/profile.png') }}' class='rounded-full'>
                    </div>
                    <div class="w-full">
                        <div class='pb-2 mb-2 border-b-2 bg-black-500' style='border-color: #606060;'>
                            <p class='text-zinc-500 font-bold text-xs'>{{ $post->date }}</p>
                            <p class='text-white font-bold text-xl lg:text-2xl'>{{ $post->user->first_name }} {{ $post->user->last_name }}</p>
                            <p class='text-zinc-500 font-bold text-xs uppercase'>{{ $post->user->school_year }}e jaars</p>
                        </div>
                        <span class="rounded-2xl bg-black px-6 py-1 font-bold text-center text-xs" id="tag">{{ $post->tag }}</span>
                        <p class='text-zinc-500 font-bold text-xs mt-6 uppercase'>Onderwerp:</p>
                        <p class='text-white font-bold lg:text-xl break-all'>{{ $post->subject }}</p>
                        <p class='text-zinc-500 font-bold text-xs mt-6 uppercase'>Beschrijving:</p>
                        <p class='text-white font-bold lg:text-xl break-all'>{{ $post->description }}</p>
                        <div class='bg-black text-white p-4 hidden mt-4 lg:block rounded-2xl'>
                            <pre><code class="language-{{ $post->tag }}">{{ $post->code }}</code></pre>
                        </div>
                        <form method='POST' action="/posts/actions/vote.php">
                            <input type="hidden" name="post_id">
                            <input type="hidden" name="post_user_id">
                            <input type="hidden" name="user_id">
                            <div class='w-full flex justify-between items-center mt-12 text-3xl font-bold'>
                                <div class='flex'>
                                    <button type='submit' name='upvote' disabled>
                                    <span class='w-10 h-10 lg:w-12 lg:h-12 p-2 flex items-center justify-center font-bold text-2xl rounded-full mr-6 ml-2' style='background: #5BFF61'><img src='/icons/up_arrow.svg'></span></button>
                                    <button type="submit" name="downvote" disabled><span class='w-10 h-10 cursor-pointer lg:w-12 lg:h-12 p-2 flex items-center justify-center font-bold text-2xl rounded-full' style='background: #FF5959'><img src='/icons/down_arrow.svg'></span></button>
                                    <span class='px-4 py-1 flex items-center justify-center font-bold text-xl lg:text-2xl rounded-3xl ml-6' id='score' style=' font-family: Poppins'><span id='operator'></span>
                                    </span>
                                </div>
                                <div class='flex'>
                                    <span class='hidden lg:block'><button class='bg-gray-200 hover:bg-gray-300 ease-in-out duration-300 py-1 px-8 rounded-2xl text-black uppercase text-2xl transition'>REAGEER</button></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Comment Form Section -->
                <div class='my-6 bg-neutral-700 text-white py-8 px-7 rounded-3xl w-full'>
                    <h3 class='text-2xl font-bold mb-4'>Plaats een reactie</h3>
                    <form method='POST' action="{{ route('storeComment') }}">
                        @csrf
                        <div class='mb-4'>
                            <label for='description' class='block text-sm font-bold mb-2'>Beschrijving:</label>
                            <textarea id='description' name='description' rows='4' class='w-full px-4 py-3 text-white bg-neutral-800 border border-neutral-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500' placeholder='Schrijf hier je beschrijving...'></textarea>
                        </div>
                        <div class='mb-4'>
                            <label for='code' class='block text-sm font-bold mb-2'>Code:</label>
                            <textarea id='code' name='code' rows='6' class='w-full px-4 py-3 text-white bg-neutral-800 border border-neutral-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500' placeholder='Plak hier je code...'></textarea>
                        </div>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class='flex justify-end'>
                            <button type='submit' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300'>Verstuur</button>
                        </div>
                    </form>
                </div>

                <!-- Comments Section -->
                @if ($comments->count() > 0)
                <h2 class="text-white text-3xl font-bold mt-12 mb-8">Comments</h2>
                @endif
                @foreach ($comments as $comment)
                <div class='my-6 lg:mt-0 bg-[#2c2b2b] text-white py-8 px-7 rounded-3xl flex w-full' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                    <div class='mr-4 mt-3 min-w-[50px] flex flex-col justify-between'>
                        <img src='{{ asset('images/profile.png') }}' class='rounded-full'>
                        <div class="text-4xl text-center mb-3">
                            @if (Auth::id() === $comment->user_id)
                            <button class="opacity-50 transition-[0.3s] hover:cursor-not-allowed" disabled>👍</button>
                            <p class="text-2xl my-2 text-gray-300">{{ $comment->likes()->where('liked', true)->count() - $comment->dislikes()->where('liked', false)->count() }}</p>
                            <button class="opacity-50 transition-[0.3s] hover:cursor-not-allowed" disabled>👎</button>
                            @else
                            <!-- Like Form -->
                            <form action="{{ route('likeComment', $comment->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @if ($comment->likes()->where('liked', true)->where('user_id', Auth::id())->count() > 0)
                                <button type="submit" class="opacity-100 hover:opacity-100 transition-[0.3s]">👍</button>
                                @else
                                <button type="submit" class="opacity-50 hover:opacity-100 transition-[0.3s]">👍</button>
                                @endif
                            </form>
                            <p class="text-2xl my-2">{{ $comment->likes()->where('liked', true)->count() - $comment->dislikes()->where('liked', false)->count() }}
                            </p>
                            <!-- Dislike Form -->
                            <form action="{{ route('dislikeComment', $comment->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @if ($comment->dislikes()->where('liked', false)->where('user_id', Auth::id())->count() > 0)
                                <button type="submit" class="opacity-100 hover:opacity-100 transition-[0.3s]">👎</button>
                                @else
                                <button type="submit" class="opacity-50 hover:opacity-100 transition-[0.3s]">👎</button>
                                @endif
                            </form>
                            @endif
                        </div>
                    </div>
                    <!-- Comment Content -->
                    <div class="w-full">
                        <div class='pb-2 mb-2' style='border-color: #606060;'>
                            <div class="flex justify-between items-center">
                                <p class='text-white font-bold text-xl lg:text-2xl'>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</p>
                                <p class='text-zinc-500 font-bold text-xs'>{{ $comment->date }}</p>
                            </div>
                            <p class='text-zinc-500 font-bold text-xs uppercase'>{{ $comment->user->school_year }}e jaars</p>
                        </div>
                        <p class='text-[#cbced1] lg:text-lg break-all py-2'>{{ $comment->description }}</p>
                        <pre><code class="language-php">{{ $comment->code }}</code></pre>

                        <!-- Delete Button for Authenticated User -->
                        @if (Auth::check() && Auth::id() === $comment->user_id)
                        <form method="POST" action="{{ route('destroyComment', $comment->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg mt-4">Verwijder comment</button>
                        </form>
                        @endif

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
</body>
</html>