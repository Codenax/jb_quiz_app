<div>
    <div class="grid grid-cols-12 gap-3">
        <div class="col-span-12">
            @if(Session::has('message'))
                <p class="backdrop border border-green-300 h-8 bg-white bg-opacity-10 p-2 rounded ">{{ Session::get('message') }}</p>
            @endif
        </div>
        <div class="col-span-12">
            <label for="">Quiz Name</label>
            {{-- <input type="hidden" wire:model="hiddenId" value="{{$hiddenId}}"> --}}
            <input type="hidden" wire:model="hiddenId">
            <input type="text" wire:model="quiz_name" class="w-full rounded backdrop border border-green-300 h-8 bg-white bg-opacity-10 focus:outline-none px-2" placeholder="quiz name">
            @error('quiz_name') <small class="text-red-500">{{$message}}</small> @enderror
        </div>

        <div class="col-span-12">
            <label for="">Quiz One</label>
            <input type="text" wire:model="quiz_one" class="w-full rounded backdrop border border-green-300 h-8 bg-white bg-opacity-10 focus:outline-none px-2" placeholder="quiz one">
            @error('quiz_one') <small class="text-red-500">{{$message}}</small> @enderror
        </div>
        <div class="col-span-12">
            <label for="">Quiz Two</label>
            <input type="text" wire:model="quiz_two" class="w-full rounded backdrop border border-green-300 h-8 bg-white bg-opacity-10 focus:outline-none px-2" placeholder="quiz two">
            @error('quiz_two') <small class="text-red-500">{{$message}}</small> @enderror
        </div>
        <div class="col-span-12">
            <label for="">Quiz Three</label>
            <input type="text" wire:model="quiz_three" class="w-full rounded backdrop border border-green-300 h-8 bg-white bg-opacity-10 focus:outline-none px-2" placeholder="quiz three">
            @error('quiz_three') <small class="text-red-500">{{$message}}</small> @enderror
        </div>
        <div class="col-span-12">
            <label for="">Quiz Four</label>
            <input type="text" wire:model="quiz_four" class="w-full rounded backdrop border border-green-300 h-8 bg-white bg-opacity-10 focus:outline-none px-2" placeholder="quiz four">
            @error('quiz_four') <small class="text-red-500">{{$message}}</small> @enderror
        </div>
        <div class="col-span-12">
            <label for="">Quiz Answer</label>
            <div class="relative inline-flex w-full">
                <select wire:model="ans" class="border w-full rounded backdrop border-green-300  bg-white bg-opacity-10 text-black focus:outline-none">
                  <option>Select Answer</option>
                  <option value="a">A</option>
                  <option value="b">B</option>
                  <option value="c">C</option>
                  <option value="d">D</option>
                </select>
              </div>
        </div>
        <div class="col-span-12">
           <button type="submit" wire:click="update()" class="text-center text-white w-full rounded backdrop border border-green-300 h-10 bg-white bg-opacity-10 focus:outline-none px-2 shadow p-2 ">Update Quiz</button>
        </div>
    </div>
</div>
