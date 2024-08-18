<div>
    <div>
        @if ($liked)
            <button wire:click="toggleLike" class="opacity-100 hover:opacity-100 transition-[0.3s]">👍</button>
        @else
            <button wire:click="toggleLike" class="opacity-50 hover:opacity-100 transition-[0.3s]">👍</button>
        @endif
        <p class="text-2xl my-2">{{ $likeCount }}</p>
    </div>

    <div>
        @if ($disliked)
            <button wire:click="toggleDislike" class="opacity-100 hover:opacity-100 transition-[0.3s]">👎</button>
        @else
            <button wire:click="toggleDislike" class="opacity-50 hover:opacity-100 transition-[0.3s]">👎</button>
        @endif
    </div>
</div>