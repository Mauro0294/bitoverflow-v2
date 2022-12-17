<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bitoverflow | Index</title>
</head>
<body class='bg-[#181818]'>
    <div class='p-4 lg:px-24 lg:py-12'>
        <nav class='flex justify-between'>
            <h2 class='text-white font-bold text-2xl'>Bit Overflow</h2>
            <div class='flex text-white items-center lg:text-xl font-bold'>
                <a href="{{ route('login') }}" class='flex'><img src='icons/lock.svg' width='40px'><button>Log in</button></a>
                <a href="{{ route('login') }}" class='ml-8 hidden lg:block'><button class='bg-white px-4 py-2 rounded-full text-black text-lg'>Get Started</button></a>
            </div>
        </nav>
        <section class='mx-auto lg:w-[850px] font-bold mt-32 relative'>
            <h2 class='text-5xl lg:text-7xl text-white text-center'>Betere code schrijf je,<br /> <span class='text-transparent bg-clip-text bg-gradient-to-br from-[#647DEE] to-[#7F53AC]'>samen</span></h2>
            <p class='text-[#9BA3C7] text-center lg:w-[535px] mx-auto mt-9'>Leer van elkaar, Op Bit-Overflow leer je van medestudenten. Je leert van studenten die precies weten hoe de opdracht in elkaar steekt.</p>
            <div class='flex justify-center mt-12'>
                <a href="{{ route('login') }}">
                    <button class='bg-white px-4 py-2 rounded-full text-black text-lg flex justify-center items-center'>
                        Get Started
                        <img src='icons/arrow2.svg' class='inline ml-2'>
                    </button>
                </a>
                <a href="{{ route('login') }}" class='flex ml-12'><button class='text-white'>Wie zijn wij?</button></a>
            </div>
            <img src='images/blue.png' style='right: -300px' class='absolute top-40 hidden lg:block'>
        </section>
        <section class='relative'>
            <img src='images/gradient.png' style='bottom: -300px; left: -100px' class='absolute z-0 hidden lg:block'>
            <img src='images/screen_mockup.svg' class='mx-auto mt-32 relative z-1'>
        </section>
    </div>
    <section class='bg-[#1F1F1F] text-white mt-40 py-8 px-4 lg:p-24'>
        <h2 class='text-3xl lg:text-5xl font-bold lg:w-[600px]'>Zeker weten dat je de juiste hulp krijgt</h2>
        <div class='flex justify-between'>
            <div>
                <div class='flex mt-12'>
                    <div class='mr-12 h-[95px] w-[95px] hidden lg:flex rounded-full justify-center items-center bg-white bg-gradient-to-r from-[#647DEE] to-[#7F53AC]'>
                        <img src='icons/people.svg'>
                    </div>
                    <div>
                        <h2 class='font-bold text-lg mb-2'>Meer dan 100 klasgenoten</h2>
                        <p class='lg:w-[400px]'>Je krijgt altijd antwoord op jou vraag door studenten die eventueel meer kennis hebben dan jij of de exercise al gemaakt hebben.</p>
                    </div>
                </div>
                <div class='flex mt-12 mb-24'>
                    <div class='hidden lg:flex h-[95px] w-[95px] mr-12 rounded-full justify-center items-center bg-white bg-gradient-to-r from-[#647DEE] to-[#7F53AC]'>
                        <img src='icons/settings.svg'>
                    </div>
                    <div>
                        <h2 class='font-bold text-lg mb-2'>Hulp met ervaring</h2>
                        <p class='lg:w-[400px]'>Bekijk eerder gestelde vragen zodat je niet jou vraag eventueel opnieuw hoeft te stellen.</p>
                    </div>
                </div>
            </div>
            <div class='hidden lg:block'>
                <img src='images/frame.png'>
            </div>
        </div>
        <div class="flex font-bold">
            <a href="{{ route('login') }}">
                <button class='bg-white px-4 py-2 rounded-full text-black lg:text-lg flex justify-center items-center'>
                    Get Started
                    <img src='icons/arrow2.svg' class='hidden lg:inline ml-2'>
                </button>
            </a>
            <a href="{{ route('login') }}" class='flex ml-12'><button class='text-white'>Wat vinden studenten?</button></a>
        </div>
    </section>
    <section class='text-white font-bold mt-24 px-4 lg:px-0'>
        <h2 class='text-center text-3xl lg:text-5xl'>Wat vinden leerlingen<br />ervan?</h2>
        <div class='grid lg:grid-cols-2 gap-y-32 mt-24 place-items-center'>
            @foreach ($reviews as $review)
            <div class='bg-[#383838] text-white p-8 rounded-xl lg:w-[530px]'>
                <div class='flex'>
                    <img src='{{ $review['img_src'] }}'>
                    <div class='flex flex-col justify-center ml-4'>
                        <h3 class='text-xl'>{{ $review['full_name'] }}</h3>
                        <p class='text-[#8C8C8C] text-sm'>{{ $review['school_year'] }}</p>
                    </div>
                </div>
                <p class='mt-5'>
                    {{ $review['about'] }}
                </p>
            </div>
            @endforeach
        </div>
    </section>
</body>
</html>