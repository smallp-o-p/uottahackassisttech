<div class="flex flex-col h-full px-4 py-2 content-end">
    <div class="flex flex-col mt-auto overflow-auto">
        @foreach ($test_messages as $message)
            <div class="w-full mb-2">
                <div class="flex flex-row">
                    <div class="avatar placeholder my-auto">
                        <div class="bg-neutral text-neutral-content rounded-full w-12 h-12 align-middle">
                            <span>SY</span>
                        </div>
                    </div>
                    <div class="ml-4 flex flex-col justify-start">
                        <div class="flex flex-row">
                            <div class="label">
                                <span class="label-text">{{ __('Test User name') }}</span>
                            </div>
                            <div class="label">
                                <span class="label-text">{{ Carbon\Carbon::now() }}</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-base"> {{ $message }} </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div>
            <div class="label">
                <span class="label-text">Send a message!</span>
                <span class="label-text-alt">Alt label</span>
            </div>
        </div>
        <textarea wire:keydown.enter="sendMessage" class="textarea textarea-bordered h-12"
            placeholder="Let's get some collab rolling..."></textarea>
    </div>
</div>
