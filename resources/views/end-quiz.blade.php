@extends('layouts.quiz-app')

@section('content')
<div class="bg-white rounded p-3 w-1/2 ">

    <div class="grid grid-cols-3 gap-4">
        <div><P class="text-white rounded shadow text-center text-md uppercase py-3 w-full bg-green-600">Correct: {{Session::get('correct')}} </P></div>
        <div><P class="text-white rounded shadow text-center text-md uppercase py-3 w-full bg-red-600">Wrong: {{Session::get('wrong')}} </P></div>
        <div><P class="text-white rounded shadow text-center text-md uppercase py-3 w-full bg-indigo-600">Result:  {{Session::get('correct')}} / {{Session::get('correct')+Session::get('wrong')}} </P></div>

    </div>

    <div class="grid grid-cols-1 gap-4 my-10">

        <div class="w-full">
            @if (Session::get('correct') <= 10)
                <img class="w-56 h-40 mx-auto" src="https://media.giphy.com/media/Pn1h5Un3LZD9uq3u07/giphy.gifdia/5tkQ2D8oxYBVKwWNMV/giphy.gif" alt="">
            @else
                <img class="w-56 h-40 mx-auto" src="https://media3.giphy.com/media/5tkQ2D8oxYBVKwWNMV/giphy.gif" alt="">
            @endif
        </div>
    </div>
    <form action="{{url('/session-flash')}}" method="POST">
        @csrf
        <button type="submit" class="w-full p-2 bg-indigo-600 text-white rounded">Start Agaign</button>
    </form>
</div>
@endsection
