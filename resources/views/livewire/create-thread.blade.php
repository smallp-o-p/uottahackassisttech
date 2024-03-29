<div class="flex flex-col" @thread_created="console.log('fart')">
    <form method="dialog" class="mb-4">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <div>
        <select class="select select-bordered w-full text-lg" wire:model.live ="selectedSession">
            @foreach ($sessions as $session)
                <option value="{{ $session->id }}">[{{ $session->year->year }}] {{ $session->course->name }} </option>
            @endforeach
        </select>
    </div>
    <div class="py-4">
        <select class="select select-bordered w-full text-lg" wire:model.live="selectedRoom">
            @foreach ($secondRow as $room)
                <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endforeach
        </select>
    </div>
    <textarea class="textarea textarea-bordered textarea-lg w-full" placeholder="What's on your mind?"
        wire:model="question"> </textarea>
    <form method="dialog">
        <button id="submitBtn" class="btn btn-primary w-full mt-4 text-lg"
            wire:click="createThread({{ $selectedRoom }})">Submit</button>
    </form>
</div>


@script
    <script>
        document.getElementById('submitBtn').addEventListener('click', function(e) {
            window.client.publish("room-{{ $selectedRoom->id ?? 0 }}", "{{ $selectedRoom->id ?? 0 }}", (err) => {});
        });
    </script>
@endscript
