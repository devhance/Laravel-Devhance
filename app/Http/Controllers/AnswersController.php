<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Answer::where('question_id', $request->question_id)->where('user_id', auth()->user()->user_id)->first();
        if ($check !== NULL) {
            return redirect()->back()->with('error', 'You can only answer this question once. You may edit your answer instead.');
        }
        else {
            $data = request()->validate([
                'question_id' => 'required',
                'answer' => 'required'
            ]);
    
            Answer::create([
                'question_id' => request('question_id'),
                'answer' => request('answer'),
                'user_id' => auth()->user()->user_id
            ]);
    
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Answer $answer)
    {
        dd($answer);
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
