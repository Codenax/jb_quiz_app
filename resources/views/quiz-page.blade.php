@extends('layouts.quiz-app')

@section('content')
<div class="bg-white rounded p-3 w-1/3 ">
    <form action="/submit-ans" method="post">
        @csrf
    <ul>
        <h2 class="text-2xl mb-5">#{{Session::get("nextq")}}: {{$question->quiz_name}}</h2>
        <li>A) <input type="radio" value="a" name="ans" ><label class="ml-3 text-lg font-bold" for="">{{$question->a}}</label> </li>
        <li>B) <input type="radio" value="b" name="ans" ><label class="ml-3 text-lg font-bold" for="">{{$question->b}}</label> </li>
        <li>C) <input type="radio" value="c" name="ans" ><label class="ml-3 text-lg font-bold" for="">{{$question->c}}</label> </li>
        <li>D) <input type="radio" value="d" name="ans" ><label class="ml-3 text-lg font-bold" for="">{{$question->d}}</label> </li>
    </ul>
        <input type="hidden" value="{{$question->ans}}" name="dbans">
    <button type="submit" class="float-right p-2 bg-indigo-600 text-white rounded">Next</button>
</form>
</div>
@endsection
