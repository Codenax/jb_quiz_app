<?php

namespace App\Http\Livewire;

use App\Models\Quize;
use Livewire\Component;
use Livewire\WithPagination;

class QuizeAdd extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap'; 
    public $hiddenId, $quiz_name, $option_a, $option_b, $option_c, $option_d, $ans;
    public $updateMode = false;

    public function render()
    {
        $data_all = Quize::orderBy('id', 'desc')->paginate(10);
        return view('livewire.quize-add',['quizzes' => $data_all]);
    }

    private function resetInput()
    {
        $this->quiz_name = null;
        $this->option_a = null;
        $this->option_b = null;
        $this->option_c = null;
        $this->option_d = null;
        $this->ans = null;
    }

    public function submit(){
        $this->validate([
            'quiz_name' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'ans' => 'required',
        ]);
        $quiz = New Quize();
        $quiz->quiz_name        = $this->quiz_name;
        $quiz->a     = $this->option_a;
        $quiz->b     = $this->option_b;
        $quiz->c   = $this->option_c;
        $quiz->d    = $this->option_d;
        $quiz->ans    = $this->ans;
        $quiz->save();
        session()->flash('message', 'Quiz has been created');
        $this->resetInput();
    }

    public function edit($id){
        $edit_quiz = Quize::findOrFail($id);
        $this->hiddenId     = $id;
        $this->quiz_name    = $edit_quiz->quiz_name;
        $this->option_a     = $edit_quiz->a;
        $this->option_b     = $edit_quiz->b;
        $this->option_c   = $edit_quiz->c;
        $this->option_d    = $edit_quiz->d;
        $this->ans          = $edit_quiz->ans;
        $this->updateMode = true;
    }

    public function update(){
        $this->validate([
            'quiz_name' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'ans' => 'required',
        ]);
        if($this->hiddenId){
            $update_quiz = Quize::findOrFail($this->hiddenId);
            $update_quiz->update([
                'quiz_name' => $this->quiz_name,
                'a' => $this->option_a,
                'b' => $this->option_b,
                'c' => $this->option_c,
                'd' => $this->option_d,
                'ans' => $this->ans,
            ]);
            session()->flash('message', 'Quiz has been updated');
            $this->resetInput();
            $this->updateMode = false;
        }
    }
    public function destroy($id)
    {
        if ($id) {
            $record = Quize::where('id', $id);
            $record->delete();
        }
    }
}
