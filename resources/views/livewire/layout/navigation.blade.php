<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    public $sessions;

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function mount()
    {
        $this->sessions = Auth::user()->sessions;
    }
}; ?>
<div class="drawer drawer-open max-w-fit bg-base-100" x-data="{ widen: false }">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
        <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu min-h-full bg-base-200 text-lg font-semibold text-base-content">
            @foreach ($sessions as $session)
                <li x-data="{ open_{{ $loop->index }}: false }" class="mt-2 min-h-12">
                    <a @click="open_{{ $loop->index }} = !open_{{ $loop->index }};
                        $dispatch('select_session', {'session_id' : {{ $session->id }}})"
                        class="min-h-12 rounded-lg ">
                        <div class="flex flex-row h-full pr-2 border-r-4 border-primary rounded-none">
                            {{ $session->getName() }}
                        </div>
                    </a>
                    @persist('list')
                    <ul x-show="open_{{ $loop->index }}" class="ml-8"
                        @select_room="console.log($event.detail.room_id);">
                        @foreach ($session->rooms as $room)
                            <li x-data="{ selected_{{ $loop->parent->index }}_{{ $loop->index }}: false }" href="{{ route('viewRoom', $room) }}" wire:navigate
                                @click="
                                    selected_{{ $loop->parent->index }}_{{ $loop->index }} = !selected_{{ $loop->parent->index }}_{{ $loop->index }};"
                                :class="selected_{{ $loop->parent->index }}_{{ $loop->index }} ?
                                    'bg-primary opacity-80 min-w-24 w-32 flex flex-row rounded-lg' :
                                    'opacity-80 min-w-24 flex flex-row w-32 rounded-lg'"
                                @click.outside="selected_{{ $loop->parent->index }}_{{ $loop->index }} = false">
                                <div class="w-full">
                                    <x-heroicon-s-chat-bubble-oval-left-ellipsis class="h-6 mr-4" />
                                    <div class="min-w-fit"> {{ $room->name }} </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @endpersist()
                </li>
            @endforeach
            <!-- Sidebar content here -->
        </ul>
    </div>
</div>
