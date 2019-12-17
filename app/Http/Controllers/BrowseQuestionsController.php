<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class BrowseQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->paginate(20);

        return view('questions.browse', compact('questions'));
    }

    
}
