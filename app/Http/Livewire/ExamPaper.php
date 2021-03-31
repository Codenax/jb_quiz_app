<?php

namespace App\Http\Livewire;

use App\Models\Quize;
use Livewire\Component;

class ExamPaper extends Component
{
    public function render()
    {
        $exam_paper = Quize::all();
        return view('livewire.exam-paper', ['data_exam' => $exam_paper]);
    }

    public function store(){

    }
}
