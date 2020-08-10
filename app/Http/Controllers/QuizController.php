<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ImportJob;
use League\Csv\Reader;
use App\Quiz;
use DataTables;

class QuizController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        if(request()->ajax()){

            $quiz = Quiz::orderBy('id', 'DESC')->get();
            return Datatables::of($quiz)
            ->addColumn('name', function($quiz) {
                return $quiz->participant_name;
            })
            ->addColumn('country', function($quiz) {
                return $quiz->country;
            })
            ->addColumn('document', function($quiz) {
                return $quiz->document;
            })
            ->addColumn('site', function($quiz) {
                return $quiz->site_id;
            })
            ->editColumn('quiz_completion', function($quiz) {
                $view_status = '';
                if($quiz->quiz_completion == 'complete'){
                    $view_status = "<span class='badge badge-info'>complete</span>";
                }else{
                    $view_status = "<span class='badge badge-warning'>incomplete</span>";
                }

                return $view_status;
            })
            ->escapeColumns([])
            ->make(true);
        }
        return view('quiz.index');
    }

    public function import()
    {
        return view('quiz.import');
    }

    public function importSave(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs(
                'public/import', $filename
            );

            ImportJob::dispatch($filename);
            return redirect()->back()->with(['success' => 'Upload success']);
        }
        return redirect()->back()->with(['error' => 'Failed to upload file']);
    }
}
