<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Question;
use App\Answer;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = request('search');
        $results = Question::where('question', 'like', "%$key%")->paginate(10);
        // $results = Question::search($key)->paginate(10);

        // dd($key);
        // dd($results);
        return view('questions.result', compact('results'));
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
    public function store(Question $question)
    {
        $user = auth()->user()->user_id;
        
        $data = request()->validate([
            'question' => 'required',
        ]);

        Question::create([
            'question' => request('question'),
            'user_id' => $user
        ]);
        return redirect('/dashboard');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        
        $author = User::where('user_id', $question->user_id)->first();
        $answers = Answer::where('question_id', $question->id)
                        ->join('users', 'answers.user_id','users.user_id')
                        ->select('answers.*', 'users.firstname', 'users.lastname')
                        ->get();
        
        return view('questions.show', compact('question', 'author', 'answers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
