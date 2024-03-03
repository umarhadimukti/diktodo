<nav class="navbar w-8/12 shadow-lg bg-slate-200 mx-auto p-5 flex font-poppins justify-between">
  <img src="{{ asset('./image/logo-diktodo.png') }}" alt="" width="50">
  @if (auth()->user()->role_id == 1)
  <div class="nav-link flex items-center gap-5">
    <a href="{{ route('user.todo.home') }}" wire:navigate
      class="flex gap-1 items-center font-bold hover:text-purple-800">
      <i class="fa-solid fa-file-pen"></i>
      New Task
    </a>
    <a href="{{ route('admin.todo.dashboard') }}" class="flex gap-1 items-center font-bold hover:text-purple-800">
      <i class="fa-solid fa-users"></i>
      Users
    </a>
  </div>
  @endif
  <div class="max-w-content flex w-max items-center">
    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" :class="{ 'z-40': modalOpen }"
      class="relative w-auto h-auto">
      <button @click="modalOpen=true"
        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors bg-slate-200 border rounded-md hover:bg-red-400 active:red-500 focus:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
        <i class="fa-solid fa-right-from-bracket"></i>
      </button>
      <template x-teleport="body">
        <div x-show="modalOpen"
          class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen font-inconsolata" x-cloak>
          <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="modalOpen=false"
            class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-20"></div>
          <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 -translate-y-2 sm:scale-95"
            class="relative w-full py-6 bg-white border shadow-lg px-7 border-neutral-200 sm:max-w-lg sm:rounded-lg">
            <div class="flex items-center justify-between pb-3">
              {{-- <h3 class="text-lg font-semibold">Modal Title</h3> --}}
              <button @click="modalOpen=false"
                class="text-red-500 absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class="relative w-auto pb-8">
              <p class="text-center font-bold">Apakah anda ingin keluar?</p>
            </div>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <div class="flex flex-col gap-2 justify-center">
                <button type="submit"
                  class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md focus:outline-none bg-slate-200 hover:bg-slate-300 focus:ring-2 focus:ring-neutral-100 focus:ring-offset-2">Iya</button>
                <button @click="modalOpen=false" type="button"
                  class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-neutral-700">Kembali</button>
              </div>
            </form>
          </div>
        </div>
      </template>
    </div>
    {{-- <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="flex items-center hover:bg-red-500 hover:text-white px-3 py-1 rounded-full"
        onclick="return confirm('Apakah ingin keluar?')">
        <i class="fa-solid fa-right-from-bracket"></i>
      </button>
    </form> --}}
  </div>
</nav>