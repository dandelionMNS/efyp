<?php

namespace App\Http\Controllers;

use App\Models\Fyp;
use App\Models\FypFile;
use Illuminate\Http\Request;

class FypFilesController extends Controller
{
    public function attachFile($fyp_id)
    {

        $fyp = Fyp::findOrFail($fyp_id);
        return view('student.fyp_file', compact('fyp'));
    }

    public function upload(Request $request)
    {
        $file = new FypFile();
        $file->fyp_id = $request->input('fyp_id');
        $file->location = '';
        $file->save();

        $file_id = $file->id;

        $fileExtension = $request->file('file')->extension();
        $docName = $file_id . '.' . $fileExtension;
        $request->file('file')->move(public_path('attachment'), $docName);

        $file->location = "attachment/{$docName}";
        $file->save();

        return redirect()->route('student.fyp.index', ['u_id' => auth()->user()->id]);
    }

    public function details($file_id)
    {
        $fyp = FypFile::findOrFail($file_id);
        return view('student.fyp_file', compact('fyp'));
    }

    public function delete($file_id)
    {
        $file = FypFile::findOrFail($file_id);
        if ($file) {
            $filePath = public_path($file->location);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $file->delete();

            return redirect()->back()->with('success', 'FYP successfully deleted');
        } else {
            return redirect()->back()->with('error', 'FYP not found');
        }
    }

}
