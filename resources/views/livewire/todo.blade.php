<div class="font-poppins mt-5">
    <h3 class="font-bold font-inconsolata text-2xl text-center">Todo List</h3>
    <div class="form-control w-3/4 p-5 mx-auto font-inconsolata">
        {{-- add new task --}}
        <form wire:submit.prevent="store()" class="mb-5">
            @csrf
            <div class="flex justify-between items-center">
                <div class="w-[63%]">
                    <input wire:model.defer="title" type="text" name="title"
                        class="w-full px-3 py-3 rounded-full focus:outline-none focus:ring-4 focus:ring-purple-500 text-[18px] @error('title') ring-4 ring-red-400 @enderror"
                        placeholder="Type your task here.." autofocus>
                    <i class="fa-regular fa-keyboard text-xl text-slate-300 absolute top-60 right-[700px]"></i>
                </div>
                {{-- target date --}}
                <div class="flex flex-col mb-5">
                    <label for="filterdate" class="block text-slate-700">Target Date</label>
                    <input wire:model="date" type="date" id="filterdate"
                        class="px-3 w-[215px] py-2 focus:outline-none ring-2 ring-slate-300 focus:ring-4 focus:ring-slate-300 rounded-md @error('date') ring-2 ring-red-500 @enderror">
                    @error('date')
                    <p x-data="{dateMsg: true}" x-init="setTimeout(() => dateMsg = false, 2200)" x-show="dateMsg"
                        class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                {{-- end of target date --}}
            </div>
            @error('title')
            <p class="text-red-400 my-3 text-center">{{ $message }}</p>
            @enderror
            @if (session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                class="text-center shadow my-3 px-3 py-2 bg-purple-200">
                {{ session('message') }}
            </div>
            @endif
            <div class="flex border mb-10">
                <button type="submit"
                    class="bg-blue-700 w-full rounded active:ring-4 active:ring-blue-200 hover:bg-blue-600 py-3 outline-none text-white text-xl">Add
                    Task</button>
            </div>
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