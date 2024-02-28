<div class="font-poppins mt-5">
    <h3 class="font-bold font-inconsolata text-2xl text-center">Todo List</h3>
    <div class="form-control w-2/4 p-5 mx-auto font-inconsolata">
        {{-- add new task --}}
        <form wire:submit.prevent="store()" class="mb-10">
            @csrf
            <input wire:model.defer="title" type="text" name="title"
                class="w-full px-3 py-3 rounded-full focus:outline-none focus:ring-4 focus:ring-purple-500 text-[18px] @error('title') ring-4 ring-red-400 @enderror"
                placeholder="Ketik task yang ingin ditambah.." autofocus>
            @error('title')
            <p class="text-red-400 mt-3 text-center">{{ $message }}</p>
            @enderror
            @if (session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                class="text-center shadow mt-3 px-3 py-2 bg-purple-200">
                {{ session('message') }}
            </div>
            @endif
        </form>
        {{-- end of add new task --}}

        {{-- pending tasks --}}
        @livewire('todo-pending')
        {{-- end of pending tasks --}}

        {{-- completed tasks --}}
        @livewire('todo-completed')
        {{-- end of completed tasks --}}
    </div>
</div>