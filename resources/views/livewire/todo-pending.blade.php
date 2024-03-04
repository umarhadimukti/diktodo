{{-- pending tasks --}}
<div class="list-task-pending mb-5">

    {{-- buat sembunyiin modal yg muncul sedetik pas di refresh --}}
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    {{-- filter date --}}
    <div class="mb-5">
        <label for="filterdate" class="block text-slate-700">Filter Date</label>
        <div class="flex flex-col xl:flex-row gap-2">
            <div class="date-area flex justify-center gap-2 items-center">
                <input wire:model="date" type="date" id="filterdate"
                    class="w-[48%] text-sm sm:text-xl px-3 py-2 hover:cursor-pointer focus:outline-none ring-2 ring-slate-300 focus:ring-4 focus:ring-slate-300 rounded-md">
                <small class="font-bold text-slate-500">-</small>
                <input wire:model="date_to" type="date"
                    class="w-[48%] text-sm sm:text-xl px-3 py-2 hover:cursor-pointer focus:outline-none ring-2 ring-slate-300 focus:ring-4 focus:ring-slate-300 rounded-md">
            </div>
            <button wire:click="filter_date()" class="px-2 py-2 bg-slate-700 text-white rounded-md hover:bg-purple-600">
                <i class="fa-solid fa-filter"></i>
                Filter
            </button>
        </div>
    </div>
    {{-- end of filter date --}}
    <h3 class="font-bold mb-2">Task Pending</h3>
    @forelse ($tasks as $task)
    <div class="flex flex-col sm:flex-row text-center text-white">
        <div class="sm:w-[50%] bg-slate-700">
            <p class="text-[10px] py-1 sm:text-[15px]"><small>created at: </small>{{ $task->created_at->diffForHumans()
                }}
            </p>
        </div>
        <div
            class="sm:w-[50%] text-white @if($this->check_color($task->due_at) == 'red') bg-red-500 @elseif($this->check_color($task->due_at) == 'orange') bg-orange-400 @else bg-green-500 @endif">
            <p class="text-[10px] py-1 sm:text-[15px]"><small>status: </small>{{ $this->check_due_time($task->due_at) }}
            </p>
        </div>
    </div>
    <div class="task-pending p-5 mb-5 flex justify-between items-center bg-white shadow-md">
        <div class="w-[85%] flex items-center gap-3">
            <i class="fa-solid fa-clock-rotate-left text-sm text-orange-700"></i>
            <h3 wire:click="mark_as_done({{ $task->id }})" class="text-sm sm:text-xl block hover:cursor-pointer">{{
                $task->title}}
            </h3>
        </div>
        <div class="w-[15%] flex justify-evenly">
            <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" :class="{ 'z-40': modalOpen }"
                class="relative w-auto h-auto">
                <a wire:click.prevent="edit({{ $task }})" @click="modalOpen=true"
                    class="inline-flex items-center justify-center h-10 text-sm sm:text-xl font-medium transition-colors bg-white hover:bg-neutral-100 hover:text-green-500 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
                    <i class="fa-regular fa-pen-to-square"></i></a>
                {{-- <template x-teleport="body"> --}}
                    <div x-show="modalOpen"
                        class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
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
                            class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg font-inconsolata">
                            <div class="flex items-center justify-between pb-3">
                                <h3 class="text-lg font-semibold">Update task {{ $task->title }}</h3>
                                <button @click="modalOpen=false"
                                    class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label for="taskid" class="block">Task ID</label>
                                    <input type="text" id="taskid" disabled
                                        class="disabled:bg-slate-200 ring-1 ring-slate-400 py-2 px-4 w-[300px]"
                                        value="{{ $task->id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="block">Task Title</label>
                                    <input wire:model.defer="title" type="text" id="title"
                                        class="ring-1 ring-slate-400 py-2 px-4 w-[300px]" value="{{ $task->title }}">
                                </div>
                                <div class="mb-3 flex items-center gap-1">
                                    <input wire:click="update_status" type="checkbox" id="status" @if ($task->status ==
                                    'completed')
                                    @checked(true) @else @checked(false)
                                    @endif>
                                    <label for="status">Task Status (Pending or Completed)</label>
                                </div>
                                <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2">
                                    <button @click="modalOpen=false" type="button"
                                        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-100 focus:ring-offset-2">Cancel</button>
                                    <button wire:click="update" @click="modalOpen=false" type="button"
                                        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-neutral-900">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--
                </template> --}}
            </div>
            <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" :class="{ 'z-40': modalOpen }"
                class="relative w-auto h-auto">
                <a @click="modalOpen=true"
                    class="inline-flex items-center justify-center h-10 text-sm sm:text-xl font-medium transition-colors bg-white rounded-md hover:bg-neutral-100 hover:cursor-pointer active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none"><i
                        class="fa-regular fa-trash-can flex items-center hover:text-red-500"></i></a>
                <div x-show="modalOpen"
                    class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @click="modalOpen=false"
                        class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-20">
                    </div>
                    <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
                        class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg font-inconsolata">
                        <div class="flex items-center justify-between pb-3">
                            <button @click="modalOpen=false"
                                class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 hover:text-red-500 rounded-full hover:bg-gray-50">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
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
                            <button @click="modalOpen=false" type="button"
                                class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-red-600 hover:text-white">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <a wire:click="delete({{ $task->id }})" x-on:click="confirm('Apakah ingin menghapus?')"
                class="text-xl flex items-center hover:text-red-500">
                <i class="fa-regular fa-trash-can"></i>
            </a> --}}
        </div>
    </div>
    @empty
    <div class="text-center">
        <p>No task pending.</p>
    </div>
    @endforelse
</div>
{{-- end of pending tasks --}}