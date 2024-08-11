<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Bitoverflow | Index</title>
</head>
<body class='bg-[#181818] px-24 py-12'>
    <nav class='flex justify-between'>
        <h2 class='text-white font-bold text-2xl'>Bit Overflow</h2>
        <div class='flex text-white items-center text-xl font-bold'>
            <a href="{{ route('login') }}" class='flex'><img src='icons/lock.svg' width='40px'><button>Log in</button></a>
            <a href="{{ route('login') }}" class='ml-8'><button class='bg-white px-4 py-2 rounded-full text-black text-lg'>Get Started</button></a>
        </div>
    </nav>
    <section class='mx-auto w-[850px] font-bold mt-32'>
        <h2 class='text-7xl text-white text-center'>Betere code schrijf je,<br /> <span class='text-transparent bg-clip-text bg-gradient-to-br from-[#647DEE] to-[#7F53AC]'>samen</span></h2>
        <p class='text-[#9BA3C7] text-center w-[500px] mx-auto mt-9'>Leer van elkaar, Op Bit-Overflow leer je van medestudenten. Je leert van studenten die precies weten hoe de opdracht in elkaar steekt.</p>
        <div>
            <a href="{{ route('login') }}"><button class='bg-white px-4 py-2 rounded-full text-black text-lg'>Get Started</button></a>
        </div>
    </section>
</body>
</html>