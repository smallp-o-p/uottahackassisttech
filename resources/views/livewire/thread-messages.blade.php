<div @added_message="$wire.$refresh()" class="px-6 py-2 content-end min-w-full overflow-auto">
    <div class="flex flex-col self-stretch">
        @foreach ($thread->messages as $message)
            <div class="w-full mb-2">
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
    @push('scripts')
        <script>
            console.log(mqtt);
        </script>
    @endpush
</div>
