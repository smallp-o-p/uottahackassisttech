<div class="drawer drawer-open drawer-end max-w-fit min-h-full bg-base-200">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side h-full">
        <div class="drawer-content">
            <ul class="menu min-h-full bg-base-200 text-lg font-semibold text-base-content">
                <li class="text-sm font-light"> Other members of this session: </li>
                @foreach ($sessionMembers as $member)
                    <li>
                        <button onclick="o_users_modal_{{ $member->id }}.showModal()" class="w-full flex">
                            <div class="min-w-full w-full flex flex-row justify-between">
                                <div> {{ $member->username }}</div>
                                <div class="flex ml-auto">
                                    <span
                                        class="flex indicator-item justify-end indicator-bottom indicator-end badge badge-secondary">
                                        {{ $member->getRole() }}
                                    </span>
                                </div>
                            </div>
                        </button>
                    </li>
                    <dialog id="o_users_modal_{{ $member->id }}" class="modal">
                        <div class="modal-box">
                            <div class="hero-content text-center flex flex-col">
                                <div class="avatar online placeholder">
                                    <div
                                        class="w-24 rounded-full ring ring-primary ring-offset-base-100 text-center ring-offset-2">
                                        <span class="text-3xl">{{ strtoupper($member->username[0]) }}</span>
                                    </div>
                                </div>
                                <div class="max-w-md">
                                    <h1 class="text-5xl font-bold">{{ $member->username }}</h1>
                                    <h2 class="text-2xl text-left py-6"> About me: </h2>
                                    <p class="">an about me here lol i didn't implement this :)</p>
                                </div>
                            </div>
                            <div class="modal-action">
                                <form method="dialog">
                                    <!-- if there is a button in form, it will close the modal -->
                                    <button class="btn">Close</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                @endforeach
            </ul>
        </div>
    </div>
</div>
