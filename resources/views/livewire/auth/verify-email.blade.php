<div class="font-inconsolata mt-[100px] flex flex-col items-center">
    <img src="{{ asset('./image/email-image.jpg') }}" alt="image" width="400">
    <h3 class="text-center text-xl font-bold">Silahkan cek email anda <a href="https://gmail.com" target="__blank"
            class="px-3 py-2 bg-teal-500 text-white ring-2 ring-teal-500 hover:bg-white hover:text-black">{{
            auth()->user()->email}}</a>
    </h3>
</div>