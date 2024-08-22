<div class='my-6 bg-neutral-700 text-white py-8 px-7 rounded-3xl w-full' id="commentForm">
    <h3 class='text-2xl font-bold mb-4'>Plaats een reactie</h3>
    <div class='mb-4'>
        <label for='description' class='block text-sm font-bold mb-2'>Beschrijving:</label>
        <textarea id='description' wire:model='description' rows='4' class='w-full px-4 py-3 text-white bg-neutral-800 border border-neutral-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500' placeholder='Schrijf hier je beschrijving...'></textarea>
    </div>
    <div class='mb-4'>
        <label for='code' class='block text-sm font-bold mb-2'>Code:</label>
        <textarea id='code' wire:model='code' rows='6' class='w-full px-4 py-3 text-white bg-neutral-800 border border-neutral-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500' placeholder='Plak hier je code...'></textarea>
    </div>
    <button wire:click="store" class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300 text-lg'>Verstuur</button>
</div>
