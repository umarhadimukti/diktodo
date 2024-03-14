<div class="font-inconsolata ml-10 sm:ml-0">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <div
        class="flex flex-col sm:flex-row gap-8 mx-auto border border-slate-300 shadow-md w-full sm:w-[70%] lg:w-[50%] p-5">
        <div class="wrapper-image w-[150px] h-[150px] overflow-hidden rounded-md">
            @php
            $image_name = './image/' . $user[0]->image
            @endphp
            <img src="{{ asset($image_name) }}" class="w-full h-full" alt="">
        </div>
        <div class="wrapper-info">
            <h1 class="font-bold text-xl font-poppins drop-shadow">{{ $user[0]->name }}</h1>
            <div class="mt-3 flex gap-2 flex-col">
                <p><span class="font-bold">Your username:</span> {{ $user[0]->username }}</p>
                <p><span class="font-bold">Your email:</span> {{ $user[0]->email }}</p>
                <div class="flex justify-between items-center">
                    <div class="flex gap-2">
                        <p class="font-bold">Your Password: </p>
                        <span>**********{{ $user[0]->password_decrypt }}</span>
                    </div>

                    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                        :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
                        <i @click="modalOpen=true"
                            class="fa-solid fa-pencil hover:text-slate-600 hover:cursor-pointer"></i>
                        {{-- <template x-teleport="body"> --}}
                            <div x-show="modalOpen"
                                class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                x-cloak>
                                <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0" @click="modalOpen=false"
                                    class="absolute inset-0 w-full h-full bg-gray-900 bg-opacity-50 backdrop-blur-sm">
                                </div>
                                <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                    x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90"
                                    class="relative w-full py-6 bg-white shadow-md px-7 bg-opacity-90 drop-shadow-md backdrop-blur-sm sm:max-w-lg sm:rounded-lg">
                                    <div class="flex items-center justify-between pb-3">
                                        <h3 class="text-lg font-semibold">Change Password</h3>
                                        <button @click="modalOpen=false"
                                            class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="relative w-auto pb-8">
                                        <div class="input-area mb-2">
                                            <label for="password" class="block">Current Password</label>
                                            <div class="flex gap-1">
                                                <input @keydown.tab="$wire.check_current_password"
                                                    wire:model.defer="current_password" @if($show_password !=true)
                                                    type="password" @else type="text" @endif id="password"
                                                    class="px-3 py-1 ring-2 w-[250px] ring-slate-400"
                                                    placeholder="current password..">
                                                @if ($error_password)
                                                <div class="px-2 py-1 bg-orange-300">
                                                    <p>{{ $error_password }}</p>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="input-area mb-2">
                                            <label for="password" class="block">New Password</label>
                                            <input wire:model.defer="new_password" @if($show_password !=true)
                                                type="password" @else type="text" @endif id="password"
                                                class="px-3 py-1 ring-2 w-[250px] ring-slate-400"
                                                placeholder="new password..">
                                        </div>
                                        <div class="input-area flex items-center gap-1 mb-2">
                                            <input type="checkbox" id="show" wire:model.live="show_password">
                                            <label for="show">Show Password</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col-reverse sm:flex-row sm:justify-between sm:space-x-2">
                                        <button @click="modalOpen=false" type="button"
                                            class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 focus:ring-offset-2">Cancel</button>
                                        <button @click="modalOpen=false" type="button"
                                            class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-neutral-900">Change</button>
                                    </div>
                                </div>
                            </div>
                            {{--
                        </template> --}}
                    </div>
                </div>

                {{-- modal ubah profile --}}
                <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                    :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
                    <button wire:click.prevent="edit({{ $user[0] }})" @click="modalOpen = true" type="button"
                        class="px-3 py-1 w-full mt-5 rounded bg-purple-700 text-white ring-2 ring-purple-700 hover:text-black hover:bg-yellow-500 hover:cursor-pointer">Change
                        Profile</button>
                    {{-- <template x-teleport="body"> --}}
                        <div x-show="modalOpen"
                            class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                            x-cloak>
                            <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0" @click="modalOpen=false"
                                class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-70"></div>
                            <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
                                class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg">
                                <div class="flex sm:w-[70%] mx-auto items-center justify-between pb-3">
                                    <h3 class="text-lg font-semibold">Update Profile</h3>
                                    <button @click="modalOpen=false"
                                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="relative w-[70%] mx-auto pb-5">
                                    <div class="input-area mb-2">
                                        <label for="name" class="block">Your ID</label>
                                        <input wire:model.defer="id_user" type="text" id="name"
                                            value="{{ $user[0]->id }}"
                                            class="px-3 py-1 ring-2 w-[250px] ring-slate-400 bg-slate-300" disabled>
                                    </div>
                                    <div class="input-area mb-2">
                                        <label for="name" class="block">Your Name</label>
                                        <input wire:model.defer="name" type="text" id="name"
                                            value="{{ $user[0]->name }}"
                                            class="px-3 py-1 ring-2 w-[250px] ring-slate-400">
                                    </div>
                                    <div class="input-area mb-2">
                                        <label for="username" class="block">Your Username</label>
                                        <input wire:model.defer="username" type="text" id="username"
                                            value="{{ $user[0]->username }}"
                                            class="px-3 py-1 ring-2 w-[250px] ring-slate-400">
                                    </div>
                                    <div class="input-area mb-2">
                                        <label for="email" class="block">Your Email</label>
                                        <input type="email" id="email" value="{{ $user[0]->email }}" disabled
                                            class="px-3 py-1 ring-2 w-[250px] ring-slate-400">
                                    </div>
                                </div>
                                <div class="flex flex-col-reverse sm:flex-row sm:space-x-2 w-[70%] mx-auto">
                                    <button wire:click="update" @click="modalOpen=false" type="button"
                                        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-neutral-900">Update</button>
                                    <button @click="modalOpen=false" type="button"
                                        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border-2 border-slate-400 rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 focus:ring-offset-2">Cancel</button>
                                </div>
                            </div>
                        </div>
                        {{--
                    </template> --}}
                </div>
            </div>
        </div>
    </div>
</div>