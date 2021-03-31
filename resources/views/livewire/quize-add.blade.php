<div class="grid grid-cols-12 gap-4 mx-10 my-6">
    <div class="col-span-12 md:col-span-8 ">
        <div class="backdrop bg-white bg-opacity-10 text-white border">
            <table class="min-w-full">
                <thead class="bg-gradient-to-r from-green-400 to-blue-500 rounded">
                    <tr>
                        <th class="px-2 py-2 border-b border-gray-300 text-left text-white text-sm" >#SL</th>
                        <th class="px-2 py-2 border-b border-gray-300 text-left text-white text-sm" >Quiz Name</th>
                        <th class="px-2 py-2 border-b border-gray-300 text-left text-white text-sm" >Quiz A</th>
                        <th class="px-2 py-2 border-b border-gray-300 text-left text-white text-sm" >Quiz B</th>
                        <th class="px-2 py-2 border-b border-gray-300 text-left text-white text-sm" >Quiz C</th>
                        <th class="px-2 py-2 border-b border-gray-300 text-left text-white text-sm" >Quiz D</th>
                        <th class="px-2 py-2 border-b border-gray-300 text-left text-white text-sm" >Quiz Answer</th>
                        <th class="px-2 py-2 border-b border-gray-300 text-left text-white text-sm" >Action</th>
                    </tr>
                </thead>
                <tbody class="backdrop bg-white bg-opacity-10">
                    @forelse ($quizzes as $key => $quiz)
                    <tr>
                        <th class="px-2 py-2 whitespace-no-wrap border-b text-white border-gray-500 text-sm"> {{$key + 1}}</th>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-white border-gray-500 text-sm"> {{Str::limit($quiz->quiz_name, 10)}}</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-white border-gray-500 text-sm"> {{Str::limit($quiz->a ,8)}}</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-white border-gray-500 text-sm"> {{Str::limit($quiz->b ,8)}}</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-white border-gray-500 text-sm"> {{Str::limit($quiz->c ,8)}}</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-white border-gray-500 text-sm"> {{Str::limit($quiz->d ,8)}}</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-white border-gray-500 text-sm"> {{Str::limit($quiz->ans ,8)}}</td>
                        <td class="px-2 py-2 whitespace-no-wrap border-b text-white border-gray-500 text-sm">
                            <div class="flex flex-row">
                               <button type="button" class="focus:outline-none hover:text-green-600" wire:click="edit({{$quiz->id}})" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
                               <button type="button" class="ml-2 focus:outline-none hover:text-red-600" wire:click="destroy({{$quiz->id}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                   
                    <tr>
                    <td colspan="8" class="text-center"> <p class="text-cener p-4 ">No data available</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>


@if ($quizzes->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-start my-2 mx-2">
        {{-- Previous Page Link --}}
        @if ($quizzes->onFirstPage())
            <div class="backdrop border border-green-300 bg-white bg-opacity-40 p-2 rounded ">
            {!! __('pagination.previous') !!}
            </div>
        @else
            <a href="{{ $quizzes->previousPageUrl() }}" rel="prev" class="backdrop border border-green-300 bg-indigo-900 bg-opacity-40 p-2 rounded ">
            {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($quizzes->hasMorePages())
        <a href="{{ $quizzes->nextPageUrl() }}" rel="next" class="ml-2 backdrop border border-green-300 bg-indigo-900 bg-opacity-40 p-2 rounded ">
        {!! __('pagination.next') !!}
        </a>
        @else
        <span class="backdrop border border-green-300 bg-white bg-opacity-40 p-2 rounded ">
        {!! __('pagination.next') !!}
        </span>
        @endif
    </nav>
@endif
        </div>
    </div>

    <div class="col-span-12 md:col-span-4 backdrop bg-white bg-opacity-10 rounded p-3 text-white border border-gray-300 shadow-lg">

        @if($updateMode)
            @include('livewire.update')
        @else
            @include('livewire.create')
        @endif
    </div>
</div>
