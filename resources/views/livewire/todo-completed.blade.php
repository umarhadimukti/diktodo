{{-- completed tasks --}}
<div class="list-task-completed">
    <h3 class="font-bold">Task Completed</h3>
    @forelse ($tasks as $task)
    <div class="task-completed p-5 mb-3 flex justify-between items-center bg-white shadow-md">
        <div class="w-[85%] flex items-center gap-3">
            <i class="fa-regular fa-circle-check text-green-500"></i>
            <h3 wire:click="unmark_as_done({{ $task->id }})" class="text-xl hover:cursor-pointer line-through">{{
                $task->title }}</h3>
        </div>
        <div class="w-[15%] flex justify-evenly">
            <div x-data="{ modalOpen: false }">
                <a @click="modalOpen=true"
                    class="inline-flex items-center justify-center h-10 text-sm font-medium transition-colors bg-white rounded-md hover:bg-neutral-100 hover:cursor-pointer active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none"><i
                        class="fa-regular fa-trash-can text-xl flex items-center hover:text-red-500"></i></a>

                {{-- <template x-teleport="body"> --}}
                    <div x-show="modalOpen"
                        class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                        <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" @click="modalOpen=false"
                            class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-20">
                        </div>
                        <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
                            class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg font-inconsolata">
                            <div class="flex items-center justify-between pb-3">
                                <button @click="modalOpen=false"
                                    class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 hover:text-red-500 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="relative w-auto pb-8">
                                <p>Apakah kamu ingin menghapus <span class="font-bold">{{ $task->title}}</span>?
                                </p>
                            </div>
                            <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                <button type="button" wire:click="delete({{ $task->id }})" @click="modalOpen=false"
                                    class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors hover:cursor-pointer border rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 hover:bg-slate-200 focus:ring-offset-2">Iya</button>
                                <button wire:click="delete({{ $task->id }})" @click="modalOpen=false" type="button"
                                    class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-red-600 hover:text-white">Tidak</button>
                            </div>
                        </div>
                    </div>
                    {{--
                </template> --}}
            </div>
            {{-- <div x-data="{ modalOpen: false}" @keydown.escape.window="modalOpen = false"
                :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
                <a @click="modalOpen=true"
                    class="inline-flex items-center justify-center h-10 text-sm font-medium transition-colors bg-white rounded-md hover:bg-neutral-100 hover:cursor-pointer active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none"><i
                        class="fa-regular fa-trash-can text-xl flex items-center hover:text-red-500"></i></a>
                <template x-teleport="body">
                    <div x-show="modalOpen" @click="delete()"
                        class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                        <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" @click="modalOpen=false"
                            class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-20">
                        </div>
                        <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
                            class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg font-inconsolata">
                            <div class="flex items-center justify-between pb-3">
                                <button @click="modalOpen=false"
                                    class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 hover:text-red-500 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="relative w-auto pb-8">
                                <p>Apakah kamu ingin menghapus <span class="font-bold">{{ $task->title}}</span>?
                                </p>
                            </div>
                            <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                <span wire:click="delete({{ $task->id }})"
                                    class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors hover:cursor-pointer border rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 hover:bg-slate-200 focus:ring-offset-2">Iya</span>
                                <button @click="modalOpen=false" type="button"
                                    class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-red-600 hover:text-white">Tidak</button>
                            </div>
                        </div>
                    </div>
                </template>
            </div> --}}
        </div>
    </div>
    @empty
    <div class="text-center">
        <p>No task completed.</p>
    </div>
    @endforelse
</div>
{{-- end of completed tasks --}}