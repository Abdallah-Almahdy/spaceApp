<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $files = Storage::files('reports');
        $files = collect($files)->sortDesc();
        return view('reports.index', compact('files'));
    }
    public function view($filename)
    {


        $path = 'reports/' . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        // Stream the PDF in browser
        return response()->file(storage_path('app/' . $path), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }



    public function download($filename)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        $path = 'reports/' . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        return Storage::download($path);
    }
}
