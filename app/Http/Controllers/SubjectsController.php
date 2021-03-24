<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subjects;

class SubjectsController extends Controller
{
    public function index() {
      //  $subjects = auth()->user()->subjects()->paginate(1);
        
      return view('admin.subjects.index' , ['subjects' => Subjects::all()]);
    }
 
     public function create()
     {
        return view('admin.subjects.create');
     }

     public function edit(Subjects $subject) {

     //   $this->authorize('view' , $subject);

        return view('admin.subjects.edit' , ['subject' => $subject]);
    }

    public function destroy(Subjects $subject , Request $request) {
       
        $this->authorize('delete' , $subject);

        $subject->delete();

        $request->session()->flash('message' , 'Subject has been deleted');

        return back();
    }

    public function update(Subjects $subject) {
        $inputs = request()->validate([
            'subject' => 'required|min:8|max:255',
            'room' => 'required',
            'description' => 'required'
        ]);

        $subject->title = $inputs['subject'];
        $subject->body = $inputs['description'];

        //auth()->user()->posts()->save($post);
        $this->authorize('update',$subject);

        $post->save();

        session()->flash('subject-updated-message' , 'Subject has been updated');

        return redirect()->route('subjects.index');
    }   
 
}
