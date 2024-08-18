<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BitOverflow | Create post</title>
</head>
<body class='bg-neutral-800'>
    @extends('components.layouts.app')
    @section('content')
        <div class='px-4 lg:pl-16 pt-8 bg-neutral-900 pb-12 md:pb-48 w-full' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
            <!-- Create Post Section -->
            <h2 class='text-white text-2xl lg:text-4xl mb-6 mt-6'>Maak een nieuwe post</h2>
            <div class="w-2/3">
                <div class='my-6 lg:mt-0 bg-neutral-700 text-white py-8 px-7 rounded-3xl w-full' style='box-shadow: 0px 4px 40px 2px rgba(0, 0, 0, 0.25);'>
                    <form method='POST' action="{{ route('storePost') }}">
                        @csrf
                        <div class='mb-4'>
                            <label for='title' class='block text-sm font-bold mb-2'>Titel:</label>
                            <input id='title' name='title' type='text' class='w-full px-4 py-3 text-white bg-neutral-800 border border-neutral-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500' placeholder='Voer de titel in...'>
                        </div>
                        <div class='mb-4'>
                            <label for='description' class='block text-sm font-bold mb-2'>Beschrijving:</label>
                            <textarea id='description' name='description' rows='4' class='w-full px-4 py-3 text-white bg-neutral-800 border border-neutral-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500' placeholder='Schrijf hier je beschrijving...'></textarea>
                        </div>
                        <div class='mb-4'>
                            <label for='code' class='block text-sm font-bold mb-2'>Code:</label>
                            <textarea id='code' name='code' rows='6' class='w-full px-4 py-3 text-white bg-neutral-800 border border-neutral-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500' placeholder='Plak hier je code...'></textarea>
                        </div>
                        <div class='mb-4'>
                            <label for='tag' class='block text-sm font-bold mb-2'>Tag:</label>
                            <select id='tag' name='tag' class='w-full px-4 py-3 text-white bg-neutral-800 border border-neutral-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500'>
                                <option value=''>Selecteer een tag...</option>
                                <option value='PHP'>PHP</option>
                                <option value='Javascript'>JavaScript</option>
                                <option value='Python'>Python</option>
                                <option value='Laravel'>Laravel</option>
                                <option value='HTML'>HTML</option>
                                <option value='CSS'>CSS</option>
                            </select>
                        </div>
                        <button type='submit' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300 text-lg'>Post aanmaken</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>