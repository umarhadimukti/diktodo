<div class="font-poppins mt-5">
    <h3 class="font-bold font-inconsolata text-2xl text-center">ToDo</h3>
    <div class="form-control w-3/4 p-5 mx-auto font-inconsolata">
        {{-- add new task --}}
        <form wire:submit.prevent="store()" class="mb-5">
            @csrf
            <div class="flex flex-wrap justify-between items-center">
                <div class="w-full lg:w-[60%] xl:w-[63%]">
                    <input wire:model.defer="title" type="text" name="title"
                        class="w-full px-3 py-3 text-sm sm:text-xl rounded-full focus:outline-none focus:ring-4 focus:ring-purple-400 text-[18px] @error('title') ring-4 ring-red-400 @enderror"
                        placeholder="Type your task here.." autofocus>
                </div>
                {{-- target date --}}
                <div class="flex flex-col w-full md:w-[50%] lg:w-[35%] xl:w-[35%] mt-3 mb-6">
                    <label for="filterdate" class="block text-slate-700">Due Date</label>
                    <input wire:model="date" type="date" id="filterdate"
                        class="px-3 w-full py-2 focus:outline-none ring-2 ring-slate-300 text-sm sm:text-xl hover:cursor-pointer focus:ring-4 focus:ring-slate-300 rounded-md @error('date') border-4 border-red-500 @enderror">
                    @error('date')
                    <p x-data="{dateMsg: true}" x-init="setTimeout(() => dateMsg = false, 2200)" x-show="dateMsg"
                        class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                {{-- end of target date --}}
            </div>
            @error('title')
            <p class="text-red-400 mb-3 text-center">{{ $message }}</p>
            @enderror
            @if (session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                class="text-center shadow mb-3 px-3 py-2 bg-purple-200">
                {{ session('message') }}
            </div>
            @endif
            <div class="flex border mb-10">
                <button type="submit"
                    class="bg-slate-700 w-full rounded active:ring-4 active:ring-blue-200 hover:bg-blue-600 py-3 outline-none text-white text-xl">Add
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