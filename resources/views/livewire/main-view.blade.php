<div>
    @if (!is_null($room))
        @if (count($room->threads) == 0)
            There are no threads!
        @else
            @foreach ($room->threads as $thread)
                <button class="w-full" href="{{ route('viewMessages', $thread) }}" wire:navigate>
                    <div class="px-8 py-4">
                        <livewire:thread-view :$thread :key="$thread->id">
                    </div>
                </button>
            @endforeach
        @endif
    @endif
</div>
