<div class="font-inconsolata">
    <h3>Ini Profil Page</h3>
    <button @click="$wire.increment()"
        class="px-3 py-2 rounded bg-green-700 text-white hover:bg-green-600 hover:ring-2 hover:ring-green-300">Ubah
        Profil</button>
    <p x-text="$wire.count"></p>
</div>