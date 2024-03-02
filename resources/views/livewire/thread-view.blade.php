<div class="card bg-base-200 w-5/6 indicator border border-neutral-content">
    <span
        class= "{{ isset($thread->answered_by) ? 'indicator-item badge badge-success' : 'indicator-item badge badge-warning' }}">
        {{ isset($thread->answered_by) ? __('Answered') : __('Open') }}</span>
    <div class="card-body flex flex-col">
        <h1 class="text-4xl text-gray-400 font-bold">{{ $thread->title }}</h1>
        <small> Posted by: {{ $thread->user->username }} {{ $thread->id }}</small>
        @isset($thread->answered_by)
            <small class="text-success">Answered by: {{ App\Models\User::find($thread->answered_by)->username }}</small>
        @endisset
    </div>
</div>
