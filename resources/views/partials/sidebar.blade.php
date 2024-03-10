<nav x-data class="bg-slate-900 px-2 py-4 absolute h-screen w-10 lg:w-[100px] sm:fixed">
  <a href="{{ route('user.todo.home') }}" class="flex justify-center">
    <img src="{{ asset('./image/logo-diktodo-white.png') }}" alt=""
      :class="$store.sidebar.full ? 'w-[50px]' : 'w-[45px]'">
  </a>

  {{-- button full --}}
  <button class="bg-slate-900 px-2 py-1 sm:py-2 absolute -right-4 rounded-2xl">
    <i class="fa-solid fa-circle-right text-white hover:text-slate-300 text-sm sm:text-xl"></i>
  </button>
  {{-- end of button full --}}
</nav>