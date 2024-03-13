<div class="font-inconsolata ml-10 sm:ml-0">
    <div class="flex flex-col sm:flex-row gap-5 mx-auto bg-slate-300 w-full sm:w-[70%] lg:w-[50%] p-5">
        <div class="wrapper-image w-[150px] h-[150px] overflow-hidden rounded-md">
            <img src="{{ asset('./image/fotoumar.jpg') }}" class="w-full h-full" alt="">
        </div>
        <div class="wrapper-info">
            <h1 class="font-bold text-xl">{{ $users->name }}</h1>
            <div class="mt-3 flex gap-2 flex-col">
                <p><span class="font-bold">Your username:</span> {{ $users->username }}</p>
                <p><span class="font-bold">Your email:</span> {{ $users->email }}</p>
                <div class="flex justify-between items-center bg-slate-400 rounded px-1">
                    <div class="flex gap-2">
                        <p class="font-bold">Your Password: </p>
                        <span>**********{{ $users->password_decrypt }}</span>
                    </div>
                    <i class="fa-solid fa-pencil hover:text-slate-600 hover:cursor-pointer"></i>
                </div>
                <button type="button"
                    class="px-3 py-1 w-full mt-5 rounded bg-yellow-400 ring-2 ring-yellow-400 hover:bg-yellow-300 hover:cursor-pointer">Ubah
                    profil</button>
            </div>
        </div>
    </div>
</div>