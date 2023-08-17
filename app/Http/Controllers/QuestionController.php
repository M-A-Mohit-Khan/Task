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
        //dd($question);
        //$users=User::all();
        $question=new Question;
        $question->question=$request->input('question');
        
        $answers=$request->input('answers');
        foreach($answers as $key=>$value) {
            $answers[$key]['correct']=!$answers[$key]['correct'];
        }
        $question->answers=json_encode($answers);
        $question->save();
        //dd($question);
        return Inertia::location('show-question');
    }

    public function showQuestion()
    {
        //$users=User::all();
        $questions=Question::all();
        //dd($questions);
        return Inertia::render('ShowQuestion',compact('questions'));
    }
}
