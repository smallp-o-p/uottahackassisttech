<div class="mx-auto w-full" @thread_created="console.log('caught')">
    @if (!is_null($room))
        @if (count($room->threads) == 0)
            <div class="card bg-base-200 w-5/6 indicator flex  border border-neutral-content mx-auto mt-16">
                <div class="card-body justify-center">
                    <h1 class="text-4xl text-gray-400 font-bold text-center justify-center"> Ask a question if you
                        dare...</h1>
                </div>
            </div>
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
@script
    <script>
        window.client.unsubscribe("room-" + window.currentRoom.toString(), (err) => {
            if (!err) {
                console.log("unscubscribed from room-" + window.currentRoom.toString());
            } else {
                console.log(":(");
            }
        });
        window.client.subscribe("room-{{ $room->id ?? 0 }}", function(err) {
            if (!err) {
                console.log("subscribed to room-{{ $room->id ?? 0 }}");
                window.currentRoom = {{ $room->id ?? 0 }}
            }
        });
        window.client.on("message", function(topic, payload, packet) {
            $wire.$refresh();
            console.log("someone created a thread");
            console.log(payload);
        });
    </script>
@endscript
