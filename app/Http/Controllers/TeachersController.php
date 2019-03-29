<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Study;
use Image;
use Storage;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
      $teachers = Teacher::latest()->get();

      return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $studies = Study::all();
      return view('teachers.create', compact('studies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
      $this->validate(request(), [
        'name'        => 'required|min:5|max:20|unique:teachers',
        'image'       => 'required|image|mimes:jpeg,png|max:1024',
        'study'       => 'required'
     	]);

      if (request()->hasFile('image')) {
        $image    = request()->file('image');
        $filename = time() . 'teacher' . '.' . $image->getClientOriginalExtension();
        $location = public_path('img/'. $filename);
        Image::make($image)->resize(500, 700)->save($location);
      }

     	Teacher::create([
        'name' => request('name'),
        'image' => $filename,
        'study_id' => request('study')
     	]);

     	return redirect('/teachers');
    }

    public function show($id)
    {
      $teacher = Teacher::findOrFail($id);

      return redirect()->back();
    }

    public function edit($id)
    {
      $teacher = Teacher::findOrFail($id);
      $studies = Study::all();


      $studs = array();
      foreach ($studies as $study) {
        $studs[$study->id] = $study->name;
      }

      return view('teachers.edit')->withTeacher($teacher)->withStudies($studs);
    }

    public function update($id)
    {
      $teacher = Teacher::findOrFail($id);

      if (request('name') == $teacher->name) {
        $this->validate(request(), [
          'image'       => 'image|mimes:jpeg,png|max:1024',
       	]);
      } else {
        $this->validate(request(), [
          'name'        => 'required|min:5|max:20|unique:teachers',
          'image'       => 'image|mimes:jpeg,png|max:1024',
       	]);
      }


      if (request()->hasFile('image')) {
        // add the new photo
        $image  = request()->file('image');
        $filename    = time() . 'teacher' . '.' . $image->getClientOriginalExtension();
        $location    = public_path('img/'. $filename);
        Image::make($image)->resize(500, 700)->save($location);
        // request()->image_head->move(public_path('images/'), $filename);
        $oldFilename = $teacher->image;
        // update the photo
        $teacher->image = $filename;
        // Delete the old Photo
        Storage::delete($oldFilename);
      }

      $teacher->update([
         'name' => request('name'),
         'study_id' => request('study_id')
      ]);

      return redirect('/teachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $teacher = Teacher::findOrFail($id);

      Storage::delete($teacher->image);

      $teacher->delete();

      return redirect('/teachers');
    }
}
