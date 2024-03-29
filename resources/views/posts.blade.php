<?php
if (is_numeric($tag) && $posts != []) {
    $posts = $posts[0];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BitOverflow | {{ $tag }} posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body class='bg-neutral-800'>
    @extends('components.layouts.app')
    @section('content')
        <div class='px-4 lg:pl-16 pt-8 bg-neutral-900 pb-12 md:pb-48 w-full' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
            <h2 class='text-white  text-2xl lg:text-4xl mb-6 mt-6'>Bekijk alle recente posts</h2>
            <div class="lg:grid grid-cols-2">
                @foreach ($posts as $post)
                    <div class='my-6 lg:mt-0 bg-neutral-700 text-white py-8 px-7 rounded-3xl flex lg:w-[560px]' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                        <div class='mr-4 mt-3 hidden lg:block min-w-[50px]'>
                            <img src='{{ asset('images/profile.png') }}' class='rounded-full'>
                        </div>
                        <div>
                            <div class='pb-2 mb-2 border-b-2 bg-black-500' style='border-color: #606060;'>
                                <p class='text-zinc-500 font-bold text-xs'>{{ $post->date }}</p>
                                <p class='text-white font-bold text-xl lg:text-2xl'>{{ $post->user->first_name }} {{ $post->user->last_name }}</p>
                                <p class='text-zinc-500 font-bold text-xs uppercase'>{{ $post->user->school_year }}e jaars</p>
                            </div>
                            <span class="rounded-2xl bg-black px-6 py-1 font-bold text-center text-xs" id="tag">{{ $post->tag }}</span>
                            <p class='text-zinc-500 font-bold text-xs mt-6 uppercase'>Onderwerp:</p>
                            <p class='text-white font-bold lg:text-xl break-all'>{{ $post->subject }}</p>
                            <div class='bg-black text-white p-4 hidden mt-4 lg:block rounded-2xl'>
                                <code>
                                    {{ htmlspecialchars($post->code) }}
                                </code>
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
                                        <span class='hidden lg:block'><button class='bg-gray-200 hover:bg-gray-300 ease-in-out duration-300 py-1 px-8 rounded-2xl text-black uppercase text-2xl transition ease-in-out duration-300'>BEKIJK</button></span>
                                        <span class='w-10 h-10 flex items-center justify-center font-bold rounded-full ml-2 bg-white block lg:hidden'><img class='w-5' src='/icons/chat.svg'></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
</body>
</html>