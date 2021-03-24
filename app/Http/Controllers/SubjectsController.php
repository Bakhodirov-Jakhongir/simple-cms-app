<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subjects;
use App\User;

class SubjectsController extends Controller
{
    public function index(User $user) {
      
      $subjects = Subjects::sortable()->paginate(5);
      $user = User::all();
      return view('admin.subjects.index' , ['user' => $user , 'subjects' => $subjects]);
    }
 
     public function create()
     {
         session()->flash('subject-create-message' , 'Subject has been created');
        return view('admin.subjects.create');
     }

     public function edit(Subjects $subject , User $user) {
            
        return view('admin.subjects.edit' , ['subject' => $subject]);
    }

    public function destroy(Subjects $subject , Request $request , User $user) {
       
        if(request($subject->users_id) == request($user->id)) {
            $subject->delete();

            $request->session()->flash('subject-delete' , 'Subject has been deleted');
            return back();
        } 
        
        $request->session()->flash('subject-delete' , 'You do not have permission to delete subject');
   
        return back();
    }

    public function update(Subjects $subject) {
        
        $inputs = request()->validate([
            'subject' => 'required|min:3|max:50',
            'room' => 'required',
            'description' => 'required|min:5|max:255'
        ]);

        $subject->subject = $inputs['subject'];
        $subject->room = $inputs['room'];
        $subject->description = $inputs['description'];
        
        $subject->update();

        $subject->save();

        session()->flash('subject-updated-message' , 'Subject has been updated');

        return redirect()->route('subjects.index');
    }   
 
}
