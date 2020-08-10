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

        //JIKA FILE ADA
        if ($request->hasFile('file')) {
            //GET FILE NYA
            $file = $request->file('file');
            //MEMBUAT FILENAME DENGAN MENGAMBIL EKSTENSI DARI FILE YANG DI-UPLOAD
            $filename = time() . '.' . $file->getClientOriginalExtension();

            //FILE TERSEBUT DISIMPAN KEDALAM FOLDER
            // STORAGE > APP > PUBLIC > IMPORT
            //DENGAN MENGGUNAKAN METHOD storeAs()
            $file->storeAs(
                'public/import', $filename
            );

            // $csv = Reader::createFromPath(storage_path('app/public/import/' . $filename), 'r');
            // //BARIS PERTAMA DI-SET SEBAGAI KEY DARI ARRAY YANG DIHASILKAN
            // $csv->setHeaderOffset(0);

            // foreach ($csv as $row) {
            //     dd($row);
            // }

            // dd($csv);

            //MEMBUAT INSTRUKSI JOB QUEUE
            ImportJob::dispatch($filename);
            //REDIRECT DENGAN FLASH MESSAGE BERHASIL
            return redirect()->back()->with(['success' => 'Upload success']);
        }
        //JIKA TIDAK ADA FILE, REDIRECT ERROR
        return redirect()->back()->with(['error' => 'Failed to upload file']);
    }
}
