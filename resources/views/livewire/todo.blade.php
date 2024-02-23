<div class="font-poppins h-[83vh] mt-5 shadow">
    <h3 class="font-bold font-inconsolata text-2xl text-center">Todo List</h3>
    <div class="form-control w-2/4 p-5 mx-auto font-inconsolata">
        <form class="mb-10">
            @csrf
            <input type="text" name="task"
                class="w-full px-3 py-3 rounded-full focus:outline-none focus:ring-4 focus:ring-purple-500 text-[18px]"
                placeholder="Ketik task yang ingin ditambah.." autofocus>
        </form>
        <div class="list-task-pending mb-5">
            <h3 class="font-bold">Task Pending</h3>
            <div class="task-pending p-5 mb-3 flex justify-between items-center bg-white shadow-md">
                <div class="w-[85%] flex items-center gap-3">
                    <ion-icon name="alert-circle-outline" class="text-2xl text-red-600"></ion-icon>
                    <h3 class="text-xl">Belajar Alpine JS</h3>
                </div>
                <div class="w-[15%] flex justify-evenly">
                    <a href="#" class="text-xl flex items-center hover:text-green-600">
                        <ion-icon name="create-outline"></ion-icon>
                    </a>
                    <a href="#" class="text-xl flex items-center hover:text-red-500">
                        <ion-icon name="trash-outline"></ion-icon>
                    </a>
                </div>
            </div>
        </div>
        <div class="list-task-completed">
            <h3 class="font-bold">Task Completed</h3>
            <div class="task-completed mb-2 p-5 flex justify-between items-center bg-white shadow-md">
                <div class="w-[85%] flex items-center gap-3">
                    <ion-icon name="checkmark-circle-outline" class="text-2xl text-green-600"></ion-icon>
                    <h3 class="text-xl">
                        <del>Belajar Livewire</del>
                    </h3>
                </div>
                <div class="w-[15%] flex justify-evenly">
                    <a href="#" class="text-xl flex items-center hover:text-green-600">
                        <ion-icon name="create-outline"></ion-icon>
                    </a>
                    <a href="#" class="text-xl flex items-center hover:text-red-500">
                        <ion-icon name="trash-outline"></ion-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>