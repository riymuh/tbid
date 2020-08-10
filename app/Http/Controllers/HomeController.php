<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\User;
use App\Quiz;
use DB;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quiz = Quiz::all();
        $chart = Charts::database($quiz, 'pie', 'highcharts')
			      ->title("Total user quiz completion")
			      ->elementLabel("Total Users")
			      ->dimensions(1000, 500)
			      ->responsive(true)
			      ->groupBy('quiz_completion');
        return view('home', compact('chart'));
    }
}
