<?php

namespace App\Http\Controllers;

use App\Models\Fyp;
use App\Models\FypFile;
use App\Models\User;
use Illuminate\Http\Request;

class FypController extends Controller
{

    public function index()
    {
        $fyps = Fyp::all();
        return view("admin.fyp_index", compact("fyps"));
    }
    public function indexStudent($u_id)
    {
        $user = $u_id;
        $fyps = Fyp::where('user_id', $u_id)->get();
        $fypFiles = [];
    
        foreach ($fyps as $fyp) {
            $fypFiles[$fyp->id] = FypFile::where('fyp_id', $fyp->id)->get();
        }
    
        return view("student.fyp_index", compact("fyps", 'user', 'fypFiles'));
    }
    

    public function form()
    {
        $examiners = User::where('role', 'lecturer')->get();
        return view('student.fyp_form', compact('examiners'));
    }

    public function submit(Request $request)
    {
        $fyp = new Fyp();
        $fyp->title = $request->input('title');
        $fyp->description = $request->input('description');
        $fyp->user_id = $request->input('user_id');
        $fyp->examiner_id = $request->input('examiner_id');
        $fyp->status = 'Not marking yet';
        $fyp->save();

        return redirect()->route('student.file.attach', ['u_id' => $fyp->user_id, 'fyp_id' => $fyp->id]);
    }

    public function details(Request $request, $f_id)
    {

        $fyp = Fyp::findOrFail($f_id);

        return view('admin.applicationDetails', compact('fyp'));
    }


    public function update(Request $request, $f_id)
    {

        $fyp = Fyp::findOrFail($f_id);
        $fyp->status = $request->input('status');
        $fyp->save();

        return redirect()->route('fyp.index')->with('success', 'Fyp updated successfully!');
    }

    public function updateStudent(Request $request, $f_id, $id)
    {

        $fyp = Fyp::findOrFail($f_id);
        $fyp->title = $request->input('title');
        $fyp->description = $request->input('description');


        if ($request->hasFile('attachment')) {
            $imageExtension = $request->file('attachment')->extension();
            $docName = $f_id . '.' . $imageExtension;
            $request->file('attachment')->move(public_path('attachment'), $docName);

            $fyp->attachment = 'attachment/' . $docName;
            $fyp->save();
        }

        $fyp->save();

        return redirect()->route('fyp.index.student', compact('id'))->with('success', 'Fyp updated successfully!');
    }


    public function delete($fyp_id)
    {
        $fyp = Fyp::findOrFail($fyp_id);
        $u_id = $fyp->user_id;

        if (!empty($fyp->attachment)) {
            $leavePath = public_path($fyp->attachment);

            if (file_exists($leavePath)) {
                unlink($leavePath);
            }
        }

        $fyp->delete();

        return redirect()->route('student.fyp.index',['u_id'=>$u_id])->with('success', 'Fyp successfully deleted');
    }

}
