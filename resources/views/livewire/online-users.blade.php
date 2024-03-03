<div class="drawer drawer-open drawer-end max-w-fit min-h-full bg-base-200">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side h-full">
        <div class="drawer-content">
            <ul class="menu min-h-full bg-base-200 text-lg font-semibold text-base-content">
                <li class="text-sm font-light"> Other members of this session: </li>
                @foreach ($sessionMembers as $member)
                    <li>
                        <div class="inline-flex flex-row">
                            <div> {{ $member->username }}</div>
                            <div class="flex ml-auto">
                                <span
                                    class="flex indicator-item justify-end indicator-bottom indicator-end badge badge-secondary">
                                    {{ $member->getRole() }}
                                </span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
