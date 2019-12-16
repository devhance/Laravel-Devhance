<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Nicolaslopezj\Searchable\SearchableTrait;

class Question extends Model
{
    // use SearchableTrait;

    // protected $searchable = [
    //     /**
    //      * Columns and their priority in search results.
    //      * Columns with higher values are more important.
    //      * Columns with equal values have equal importance.
    //      *
    //      * @var array
    //      */
    //     'columns' => [
    //         'questions.question' => 10,
    //         // 'users.lastname' => 10,
    //         // 'users.firstname' => 10,
    //     ]
    // ];




    protected $guarded = [];
}
