<div>
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
                    <livewire:like-dislike-comment :comment="$comment" />
                    @endif
                </div>
            </div>
            <!-- Comment Content -->
            <div class="w-full overflow-hidden">
                <div class='pb-2 mb-2' style='border-color: #606060;'>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('showUser', [$id = $comment->user->id]) }}"><p class='text-white font-bold text-xl lg:text-2xl hover:text-gray-300 ease-in-out duration-300'>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</p></a>
                        <p class='text-zinc-500 font-bold text-xs'>{{ $comment->date }}</p>
                    </div>
                    <p class='text-zinc-500 font-bold text-xs uppercase'>{{ $comment->user->school_year }}e jaars</p>
                </div>
                <p class='text-[#cbced1] lg:text-lg py-2'>{{ $comment->description }}</p>
                <pre><code class="language-{{ $tag }}">{{ $comment->code }}</code></pre>

                <!-- Delete Button for Authenticated User -->
                @if (Auth::check() && Auth::id() === $comment->user_id)
                    <button wire:click="destroy({{ $comment->id }})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg mt-4">Verwijder comment</button>
                </form>
                @endif

            </div>
        </div>
    @endforeach
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('commentAdded', function () {
                Prism.highlightAll(); // Trigger Prism syntax highlighting
            });
        });
    </script>
</div>