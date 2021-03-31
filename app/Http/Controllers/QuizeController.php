<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Quize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ans = Quize::all()->first();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $quiz = $request->all();

    //    foreach($quiz as $ans){
    //        $ex = New Exam ();
    //        $ex->quize_id =  $ans->
    //        $ex->question_name =
    //        $ex->ans =

    //    }

       dd($quiz);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quize  $quize
     * @return \Illuminate\Http\Response
     */
    public function show(Quize $quize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quize  $quize
     * @return \Illuminate\Http\Response
     */
    public function edit(Quize $quize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quize  $quize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quize $quize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quize  $quize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quize $quize)
    {
        //
    }

    public function startQuiz(){

        Session::put('nextq', '1');
        Session::put('wrong', '0');
        Session::put('correct', '0');

        $quiz = Quize::all()->first();

        return view('quiz-page')->with(['question' => $quiz]);

    }
    public function submitAns(Request $request){

        $nextq = Session::get('nextq');
        $wrongs = Session::get('wrong');
        $corrects = Session::get('correct');

        $nextq+=1;

        if($request->dbans == $request->ans){
            $corrects+=1;
        }else{
            $wrongs+=1;
        }

        Session::put('nextq', $nextq);
        Session::put('wrong', $wrongs);
        Session::put('correct', $corrects);

        $i=0;

        $quizQuestions = Quize::all();

        foreach($quizQuestions as $row){
            $i++;
            if($quizQuestions->count() < $nextq){
                return view('end-quiz');
            }

            if ($i === $nextq) {
                return view('quiz-page')->with(['question' => $row]);
            }
        }


    }

    public function removeSession(Request $request){
        $request->session()->forget('wrong');
        $request->session()->forget('correct');
        return redirect()->route('/');
    }
}
