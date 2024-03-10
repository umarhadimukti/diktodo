<nav x-data class="bg-slate-900 px-2 py-4 absolute h-screen w-10 lg:w-[100px] sm:fixed">
  {{-- logo --}}
  <a href="{{ route('user.todo.home') }}" class="flex justify-center">
    <img src="{{ asset('./image/logo-diktodo-white.png') }}" alt=""
      :class="$store.sidebar.full ? 'w-[50px]' : 'w-[45px]'">
  </a>
  {{-- end of logo --}}

  {{-- button full --}}
  <button @click="$store.sidebar.full = !$store.sidebar.full"
    class="bg-slate-900 px-2 py-1 sm:py-2 absolute -right-4 rounded-2xl">
    <i class="fa-solid fa-circle-right text-white hover:text-slate-300 text-sm sm:text-xl transition-all duration-300 transform"
      :class="$store.sidebar.full && 'rotate-180'"></i>
  </button>
  {{-- end of button full --}}

  {{-- item --}}
  <div class="mt-[50px] sm:mt-10 text-white">
    <div class="wrapper-item flex justify-center">
      <i class="fa-solid fa-pencil lg:text-xl"></i>
    </div>
  </div>
  {{-- end of item --}}
</nav>