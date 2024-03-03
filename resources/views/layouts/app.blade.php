<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireScripts
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
</head>

<body class="font-sans antialiased max-h-screen overflow-hidden">
    <div class="min-h-screen bg-base-100 max-h-screen">
        <!-- Page Heading -->
        <header>
            <div class="navbar bg-base-200">
                <div class="navbar-start">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content mt-3 mr-8 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a>Item 1</a></li>
                            <li>
                                <a>Parent</a>
                                <ul class="p-2">
                                    <li><a>Submenu 1</a></li>
                                    <li><a>Submenu 2</a></li>
                                </ul>
                            </li>
                            <li><a>Item 3</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-ghost text-xl">assist.tech :D</a>
                </div>
                <div class="navbar-center">
                    <div class="grid grid-rows-1 grid-cols-2 gap-x-4">
                        <button class="btn btn-primary py-2" onclick="my_modal_3.showModal()">
                            <div class="w-full h-full flex flex-row">
                                <x-heroicon-o-plus class="w-12" />
                                <p class="text-lg"> Start a thread here. </p>
                            </div>
                        </button>
                        <button class="btn btn-primary py-2" onclick="my_modal_4.showModal()">
                            <div class="w-full h-full flex flex-row">
                                <x-heroicon-o-pencil class="w-12" />
                                <p class="text-lg"> Start a live collab. </p>
                            </div>
                        </button>
                    </div>

                </div>
                <div class="navbar-end">
                    <div class=mr-4> {{ Auth::user()->username }}</div>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="flex flex-col">
                            <div class="avatar placeholder">
                                <div class="bg-neutral text-neutral-content rounded-full w-16">
                                    <span class="text-3xl">D</span>
                                </div>
                            </div>
                            <div>
                                <ul tabindex="0"
                                    class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-48 py-2">
                                    <li><a href="{{ route('logout') }}">Logout</a></li>
                                    <li><a>Item 2</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content -->
        <main>
            <div class="w-full h-full flex flex-row">
                <livewire:layout.navigation />
                <div class="flex h-full w-full justify-center align-bottom">
                    {{ $slot }}
                </div>
                <livewire:online-users />
            </div>
        </main>
    </div>

    <dialog id="my_modal_3" class="modal">
        <div @thread_created="console.log('another')" class="modal-box">
            <livewire:create-thread />
        </div>
    </dialog>


    <dialog id="my_modal_4" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h1 class="text-3xl text-center"> Pick a document to collaborate on</h1>
            <ul class="text-lg mt-4">
                <li class="mb-2"> <button wire:navigate href="{{ route('editorText') }}"
                        class="btn btn-primary text-lg w-full text-center"> Text Editor</button>
                </li>
                <li <button class=" btn btn-primary text-lg p-2 w-full text-center">
                    Whiteboard (not implemented)
                    </button> </li>
            </ul>
        </div>
    </dialog>
</body>

</html>
