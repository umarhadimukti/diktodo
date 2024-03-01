<div class="font-poppins mt-5">
    <h3 class="font-bold font-inconsolata text-2xl text-center">Todo List</h3>
    <div class="form-control w-3/4 p-5 mx-auto font-inconsolata">
        {{-- add new task --}}
        <form wire:submit.prevent="store()" class="mb-5">
            @csrf
            <div class="flex justify-between items-center">
                <input wire:model.defer="title" type="text" name="title"
                    class="w-[63%] px-3 py-3 rounded-full focus:outline-none focus:ring-4 focus:ring-purple-500 text-[18px] @error('title') ring-4 ring-red-400 @enderror"
                    placeholder="Type your task here.." autofocus>
                {{-- target date --}}
                <div class="flex mt-1 mb-4 w-[35%] font-inconsolata">
                    <div x-data="{
                    datePickerOpen: false,
                    datePickerValue: '',
                    datePickerFormat: 'M d, Y',
                    datePickerMonth: '',
                    datePickerYear: '',
                    datePickerDay: '',
                    datePickerDaysInMonth: [],
                    datePickerBlankDaysInMonth: [],
                    datePickerMonthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datePickerDays: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    datePickerDayClicked(day) {
                    let selectedDate = new Date(this.datePickerYear, this.datePickerMonth, day);
                    this.datePickerDay = day;
                    this.datePickerValue = this.datePickerFormatDate(selectedDate);
                    this.datePickerIsSelectedDate(day);
                    this.datePickerOpen = false;
                    },
                    datePickerPreviousMonth(){
                    if (this.datePickerMonth == 0) { 
                        this.datePickerYear--; 
                        this.datePickerMonth = 12; 
                    } 
                    this.datePickerMonth--;
                    this.datePickerCalculateDays();
                    },
                    datePickerNextMonth(){
                    if (this.datePickerMonth == 11) { 
                        this.datePickerMonth = 0; 
                        this.datePickerYear++; 
                    } else { 
                        this.datePickerMonth++; 
                    }
                    this.datePickerCalculateDays();
                    },
                    datePickerIsSelectedDate(day) {
                    const d = new Date(this.datePickerYear, this.datePickerMonth, day);
                    return this.datePickerValue === this.datePickerFormatDate(d) ? true : false;
                    },
                    datePickerIsToday(day) {
                    const today = new Date();
                    const d = new Date(this.datePickerYear, this.datePickerMonth, day);
                    return today.toDateString() === d.toDateString() ? true : false;
                    },
                    datePickerCalculateDays() {
                    let daysInMonth = new Date(this.datePickerYear, this.datePickerMonth + 1, 0).getDate();
                    // find where to start calendar day of week
                    let dayOfWeek = new Date(this.datePickerYear, this.datePickerMonth).getDay();
                    let blankdaysArray = [];
                    for (var i = 1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }
                    let daysArray = [];
                    for (var i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }
                    this.datePickerBlankDaysInMonth = blankdaysArray;
                    this.datePickerDaysInMonth = daysArray;
                    },
                    datePickerFormatDate(date) {
                    let formattedDay = this.datePickerDays[date.getDay()];
                    let formattedDate = ('0' + date.getDate()).slice(-2); // appends 0 (zero) in single digit date
                    let formattedMonth = this.datePickerMonthNames[date.getMonth()];
                    let formattedMonthShortName = this.datePickerMonthNames[date.getMonth()].substring(0, 3);
                    let formattedMonthInNumber = ('0' + (parseInt(date.getMonth()) + 1)).slice(-2);
                    let formattedYear = date.getFullYear();
            
                    if (this.datePickerFormat === 'M d, Y') {
                        return `${formattedMonthShortName} ${formattedDate}, ${formattedYear}`;
                    }
                    if (this.datePickerFormat === 'MM-DD-YYYY') {
                        return `${formattedMonthInNumber}-${formattedDate}-${formattedYear}`;
                    }
                    if (this.datePickerFormat === 'DD-MM-YYYY') {
                        return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`;
                    }
                    if (this.datePickerFormat === 'YYYY-MM-DD') {
                        return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`;
                    }
                    if (this.datePickerFormat === 'D d M, Y') {
                        return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`;
                    }
                    
                    return `${formattedMonth} ${formattedDate}, ${formattedYear}`;
                    },
                }" x-init="
                    currentDate = new Date();
                    if (datePickerValue) {
                        currentDate = new Date(Date.parse(datePickerValue));
                    }
                    datePickerMonth = currentDate.getMonth();
                    datePickerYear = currentDate.getFullYear();
                    datePickerDay = currentDate.getDay();
                    datePickerValue = datePickerFormatDate( currentDate );
                    datePickerCalculateDays();
                " x-cloak>
                        <div class="container mx-auto">
                            <div class="w-full">
                                <div class="relative w-[16rem]">
                                    <label for="datepicker"
                                        class="block relative left-1 text-sm font-medium text-neutral-500">Target
                                        Date</label>
                                    <input x-ref="datePickerInput" type="text" @click="datePickerOpen=!datePickerOpen"
                                        x-model="datePickerValue" x-on:keydown.escape="datePickerOpen=false"
                                        class="flex w-[80%] px-3 py-3 text-sm bg-white border-1 rounded-full text-neutral-600 border-slate-400 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50"
                                        placeholder="Select date" readonly />
                                    <div @click="datePickerOpen=!datePickerOpen; if(datePickerOpen){ $refs.datePickerInput.focus() }"
                                        class="absolute top-[22px] right-[55px] px-3 py-2 cursor-pointer text-neutral-400 hover:text-neutral-500">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div x-show="datePickerOpen" x-transition @click.away="datePickerOpen = false"
                                        class="absolute z-50 top-0 left-0 max-w-lg p-4 mt-12 antialiased bg-white border rounded-lg shadow w-[17rem] border-neutral-200/70">
                                        <div class="flex items-center justify-between mb-2">
                                            <div>
                                                <span x-text="datePickerMonthNames[datePickerMonth]"
                                                    class="text-lg font-bold text-gray-800"></span>
                                                <span x-text="datePickerYear"
                                                    class="ml-1 text-lg font-normal text-gray-600"></span>
                                            </div>
                                            <div>
                                                <button @click="datePickerPreviousMonth()" type="button"
                                                    class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100">
                                                    <svg class="inline-flex w-6 h-6 text-gray-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 19l-7-7 7-7" />
                                                    </svg>
                                                </button>
                                                <button @click="datePickerNextMonth()" type="button"
                                                    class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100">
                                                    <svg class="inline-flex w-6 h-6 text-gray-400" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-7 mb-3">
                                            <template x-for="(day, index) in datePickerDays" :key="index">
                                                <div class="px-0.5">
                                                    <div x-text="day"
                                                        class="text-xs font-medium text-center text-gray-800">
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                        <div class="grid grid-cols-7">
                                            <template x-for="blankDay in datePickerBlankDaysInMonth">
                                                <div class="p-1 text-sm text-center border border-transparent"></div>
                                            </template>
                                            <template x-for="(day, dayIndex) in datePickerDaysInMonth" :key="dayIndex">
                                                <div class="px-0.5 mb-1 aspect-square">
                                                    <div x-text="day" @click="datePickerDayClicked(day)" :class="{
                                                    'bg-neutral-200': datePickerIsToday(day) == true, 
                                                    'text-gray-600 hover:bg-neutral-200': datePickerIsToday(day) == false && datePickerIsSelectedDate(day) == false,
                                                    'bg-neutral-800 text-white hover:bg-opacity-75': datePickerIsSelectedDate(day) == true
                                                }" class="flex items-center justify-center text-sm leading-none text-center rounded-full cursor-pointer h-7 w-7">
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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