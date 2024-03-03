<div @added_message="$wire.$refresh()" class="px-6 py-2 content-end min-w-full overflow-auto" ">
    <div class="flex flex-col self-stretch">
             @foreach ($thread->messages as $message)
    <div class="w-full mb-2 p-2 {{ $message->marked_as_answer ? 'border border-green-400 rounded-lg' : '' }}">
        <div class="flex flex-row">
            <div class="avatar placeholder my-auto">
                <div class="bg-neutral text-neutral-content rounded-full w-12 h-12 align-middle">
                    <span>{{ strtoupper($message->user->username[0]) }}</span>
                </div>
            </div>
            <div class="ml-4 flex flex-col justify-start">
                <div class="flex flex-row">
                    <div class="label">
                        <span class="label-text font-bold">{{ $message->user->username }}</span>
                    </div>
                    <div class="label">
                        <span class="label-text">{{ $message->updated_at }}</span>
                    </div>
                    <div class="label">
                        <span class="label-text {{ $message->marked_as_answer ? 'text-green-400' : '' }}">
                            @if ($message->marked_as_answer)
                                Selected answer
                            @else
                                <a wire:click="mark_answer({{ $message->id }})"
                                    class="hover:underline hover:cursor-pointer"> Mark
                                    as Answer
                                </a>
                            @endif
                        </span>

                    </div>
                </div>
                <div>
                    <p class="text-base"> {{ $message->text }} </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="label">
        <span class="label-text">Send a message!</span>
    </div>
    <div>
        <input type="text" wire:model.live="enteredText" wire:keydown.enter="sendMessage"
            class="input input-bordered w-full" placeholder="Let's get some collab rolling..."></input>
    </div>

</div>
@script
    <script>
        $wire.on('added_message', () => {
            window.client.publish("thread-{{ $thread->id }}", "update :)", (err) => {
                if (!err) {
                    console.log("happy");
                } else {
                    console.log("sad");
                }
            });
        });
        window.client.subscribe("thread-{{ $thread->id }}", function(err) {
            if (!err) {
                console.log("subscribed to thread-{{ $thread->id }}");
            }
        });
        window.client.on("message", function() {
            $wire.$refresh();
            console.log("someone added a message");
        });
    </script>
@endscript
</div>
