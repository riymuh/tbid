<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ImportJob;
use League\Csv\Reader;

class QuizController extends Controller
{

    public function __construct()
    {

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
