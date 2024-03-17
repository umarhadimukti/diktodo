<div class="pt-10 w-11/12 mx-auto flex items-center justify-center sm:justify-end mb-6">
  <nav x-data="{
    navigationMenuOpen: false,
    navigationMenu: '',
    navigationMenuCloseDelay: 200,
    navigationMenuCloseTimeout: null,
    navigationMenuLeave() {
        let that = this;
        this.navigationMenuCloseTimeout = setTimeout(() => {
            that.navigationMenuClose();
        }, this.navigationMenuCloseDelay);
    },
    navigationMenuReposition(navElement) {
        this.navigationMenuClearCloseTimeout();
        this.$refs.navigationDropdown.style.left = navElement.offsetLeft + 'px';
        this.$refs.navigationDropdown.style.marginLeft = (navElement.offsetWidth/2) + 'px';
    },
    navigationMenuClearCloseTimeout(){
        clearTimeout(this.navigationMenuCloseTimeout);
    },
    navigationMenuClose(){
        this.navigationMenuOpen = false;
        this.navigationMenu = '';
    }
}" class="relative z-10 w-auto">
    <div class="relative">
      <ul
        class="flex items-center justify-center flex-1 p-1 space-x-1 list-none border rounded-md text-neutral-400 group border-neutral-200/80">
        <li>
          <button
            :class="{ 'bg-slate-300' : navigationMenu=='getting-started', 'hover:bg-slate-400' : navigationMenu!='getting-started' }"
            @mouseover="navigationMenuOpen=true; navigationMenuReposition($el); navigationMenu='getting-started'"
            @mouseleave="navigationMenuLeave()"
            class="inline-flex items-center justify-center h-7 px-4 py-2 text-sm font-medium transition-colors rounded-md text-slate-700 font-inconsolata  focus:outline-none disabled:opacity-50 disabled:pointer-events-none group w-max">
            <span>{{ auth()->user()->name }}</span>
            <svg :class="{ '-rotate-180' : navigationMenuOpen==true && navigationMenu == 'getting-started' }"
              class="relative top-[1px] ml-1 h-3 w-3 ease-out duration-300" xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round" aria-hidden="true">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </button>
        </li>
      </ul>
    </div>
    <div x-ref="navigationDropdown" x-show="navigationMenuOpen" x-transition:enter="transition ease-out duration-100"
      x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-90" @mouseover="navigationMenuClearCloseTimeout()"
      @mouseleave="navigationMenuLeave()"
      class="absolute top-0 pt-3 duration-200 ease-out -translate-x-1/2 translate-y-11" x-cloak>

      <div
        class="flex justify-center w-auto h-auto overflow-hidden bg-white border-2 rounded-md shadow-sm border-slate-300">

        <div x-show="navigationMenu == 'getting-started'"
          class="flex items-stretch justify-center w-full max-w-2xl p-6 gap-x-3">
          <div
            class="w-[50px] h-[50px] rounded-full overflow-hidden border border-slate-300 bg-gradient-to-br from-neutral-800 to-black">
            <img src="{{ asset('./image/avatar.jpg') }}" class="w-full h-full" alt="">
          </div>
          <div class="w-30 font-inconsolata">
            <a href="#_" @click="navigationMenuClose()" class="block text-sm rounded hover:bg-neutral-100">
              <a href="{{ route('user.todo.profile') }}" class="px-2 py-1 rounded font-bold hover:text-purple-600">My
                Profile</a>

              <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
                <button @click="modalOpen=true"
                  class="flex mt-3 gap-2 ring-4 ring-slate-300 hover:ring-red-400 items-center justify-center px-4 py-1 text-sm font-medium transition-colors rounded-md hover:bg-red-400 bg-slate-200 active:red-500 focus:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
                  Logout
                  <i class="fa-solid fa-right-from-bracket"></i>
                </button>
                <template x-teleport="body">
                  <div x-show="modalOpen"
                    class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen font-inconsolata"
                    x-cloak>
                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                      x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                      x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                      x-transition:leave-end="opacity-0" @click="modalOpen=false"
                      class="absolute inset-0 w-full h-full bg-white backdrop-blur-sm bg-opacity-20"></div>
                    <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
                      x-transition:enter-start="opacity-0 -translate-y-2 sm:scale-95"
                      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                      x-transition:leave="ease-in duration-200"
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

            </a>
          </div>
        </div>

      </div>
    </div>
  </nav>
</div>