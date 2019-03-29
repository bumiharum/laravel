<?php

namespace App\Http\Controllers;

use App\Infrastructure;
use Storage;
use Image;
use Illuminate\Http\Request;

class InfrastructuresController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
      $infrastructures = Infrastructure::latest()->get();
      return view('infrastructures.index', compact('infrastructures'));
    }

    public function store()
    {
      $this->validate(request(), [
        'name' => 'required|min:3|max:20|unique:infrastructures',
        'image' => 'required|image|mimes:jpeg,png|max:1024',
      ]);

      if (request()->hasFile('image')) {
        $image    = request()->file('image');
        $filename = time() . 'inf_head' . '.' . $image->getClientOriginalExtension();
        $location = public_path('img/'. $filename);
        Image::make($image)->resize(500, 500)->save($location);
      }

      Infrastructure::create([
        'name' => request('name'),
        'image' => $filename,
      ]);

      return redirect('/infrastructures');
    }

    public function show($id)
    {
      $infrastructure = Infrastructure::findOrFail($id);

      return redirect('/');
    }

    public function edit($id)
    {
      $infrastructure = Infrastructure::findOrFail($id);

      return view('infrastructures.edit', compact('infrastructure'));
    }

    public function update($id)
    {
      $infrastructure = Infrastructure::findOrFail($id);

      if (request('name') == $infrastructure->name) {
        $this->validate(request(), [
          'image' => 'image|mimes:jpeg,png|max:1024',
        ]);
      } else {
        $this->validate(request(), [
          'name' => 'required|min:3|max:20|unique:infrastructures',
          'image' => 'image|mimes:jpeg,png|max:1024',
        ]);
      }

      if (request()->hasFile('image')) {
        // add the new photo
        $image  = request()->file('image');
        $filename    = time() . 'inf_head' . '.' . $image->getClientOriginalExtension();
        $location    = public_path('img/'. $filename);
        Image::make($image)->resize(500, 500)->save($location);
        // request()->image_head->move(public_path('images/'), $filename);
        $oldFilename = $infrastructure->image;
        // update the photo
        $infrastructure->image = $filename;
        // Delete the old Photo
        Storage::delete($oldFilename);
      }

      $infrastructure->update([
        'name' => request('name')
      ]);

      return redirect('/infrastructures');
    }

    public function destroy($id)
    {
      $infrastructure = Infrastructure::findOrFail($id);

      Storage::delete($infrastructure->image);
      $infrastructure->delete();
      return redirect()->back();
    }
}
