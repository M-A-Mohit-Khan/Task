<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Question;

use Inertia\Inertia;

class QuestionController extends Controller
{
    //
    public function index()
    {
        //$users=User::all();
        return Inertia::render('InsertQuestion');
    }

    public function submitQuestion(Request $request)
    {
        //dd($request->all());
        //$users=User::all();
        $question=new Question;
        $question->question=$request->input('question');
        
        $answers=$request->input('answers');
        foreach($answers as $key=>$value) {
            $answers[$key]['correct']=!$answers[$key]['correct'];
        }
        //dd($answers);
        $question->answers=json_encode($answers);
        $question->save();
        //dd($question);
        return Inertia::location('show-question');
    }

    public function showQuestion()
    {
        //$users=User::all();
        $questions=Question::all();
        foreach ($questions as $question) {
            $question->answers = json_decode($question->answers, true);
        }
        //dd($questions);
        return Inertia::render('ShowQuestion',compact('questions'));
    }


    // QuestionController.php (Laravel controller)
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        //dd($question);
        $question->answers = json_decode($question->answers, true);
        //dd($question);
        return Inertia::render('EditQuestion', [
             'question' => $question,
        ]);
    }

    public function update(Request $request, $id)
    {
        
        $question = Question::findOrFail($id);
        $newQuestion=$request->input('question');
        $newAnswers=$request->input('answers');
        // foreach($newAnswers as $key=>$value) {
        //     $newAnswers[$key]['correct']=!$newAnswers[$key]['correct'];
        // }
        $question->answers=json_encode($newAnswers);
        //dd($answers);
        // Update the question using $request data
        $question->question=$newQuestion;
        //dd($question->question);
        $question->answers=$newAnswers;
        //dd($question->answers);
        $question->save();
        return Inertia::location('/show-question');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->back();
    }

}
