<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extracurricular;
use Storage;
use Image;

class ExtracurricularsController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $extracurriculars = Extracurricular::latest()->get();
        return view('extracurriculars.index', compact('extracurriculars'));
    }

    public function store()
    {
      $this->validate(request(), [
        'name' => 'required|min:3|max:20|unique:infrastructures',
        'image' => 'required|image|mimes:jpeg,png|max:1024',
      ]);

      if (request()->hasFile('image')) {
        $image    = request()->file('image');
        $filename = time() . 'extracurricular' . '.' . $image->getClientOriginalExtension();
        $location = public_path('img/'. $filename);
        Image::make($image)->resize(500, 500)->save($location);
      }

      Extracurricular::create([
        'name' => request('name'),
        'image' => $filename,
      ]);

      return redirect('/extracurriculars');
    }

    public function show($id)
    {
      $extracurricular = Extracurricular::findOrFail($id);

      return redirect('/extracurriculars');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $extracurricular = Extracurricular::findOrFail($id);

      return view('extracurriculars.edit', compact('extracurricular'));
    }

    public function update($id)
    {
      $extracurricular = Extracurricular::findOrFail($id);

      if (request('name') == $extracurricular->name) {
        $this->validate(request(), [
          'image' => 'image|mimes:jpeg,png|max:1024',
        ]);
      } else {
        $this->validate(request(), [
          'name' => 'required|min:3|max:20|unique:extracurriculars',
          'image' => 'image|mimes:jpeg,png|max:1024',
        ]);
      }

      if (request()->hasFile('image')) {
        // add the new photo
        $image  = request()->file('image');
        $filename    = time() . 'extracurricular' . '.' . $image->getClientOriginalExtension();
        $location    = public_path('img/'. $filename);
        Image::make($image)->resize(500, 500)->save($location);
        // request()->image_head->move(public_path('images/'), $filename);
        $oldFilename = $extracurricular->image;
        // update the photo
        $extracurricular->image = $filename;
        // Delete the old Photo
        Storage::delete($oldFilename);
      }

      $extracurricular->update([
        'name' => request('name')
      ]);

      return redirect('/extracurriculars');
    }

    public function destroy($id)
    {
      $extracurricular = Extracurricular::findOrFail($id);

      Storage::delete($extracurricular->image);
      $extracurricular->delete();
      return redirect()->back();
    }
}
