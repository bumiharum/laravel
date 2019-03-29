<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Achievement;
use Image;
use Storage;

class AchievementsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $achievements = Achievement::latest()->get();

      return view('achievements.index', compact('achievements'));
    }

    public function create()
    {
      return view('achievements.create');
    }

    public function store(Request $request)
    {
      $this->validate(request(), [
        'image'       => 'required|image|mimes:jpeg,png|max:1024',
        'name'        => 'required|min:3|max:20',
     		'description' => 'required|min:10|max:255|unique:galery',
     	]);

      if (request()->hasFile('image')) {
        $image    = request()->file('image');
        $filename = time() . 'achieve' . '.' . $image->getClientOriginalExtension();
        $location = public_path('img/'. $filename);
        Image::make($image)->resize(500, 500)->save($location);
      }

     	Achievement::create([
        'image' => $filename,
        'name'  => request('name'),
     		'description' => request('description'),
     	]);

     	return redirect('/achievements');
    }


    public function show($id)
    {
      $achievement = Achievement::findOrFail($id);

      return redirect('/achievements');
    }

    public function edit($id)
    {
      $achievement = Achievement::findOrFail($id);

      return view('achievements.edit', compact('achievement'));
    }

    public function update($id)
    {
      $achievement = Achievement::findOrFail($id);

      if (request('description') == $achievement->description) {
         $this->validate(request(), [
          'name'  => 'required|min:5|max:20',
          'image' => 'image|mimes:jpeg,png|max:1024',
         ]);
      } else {
          $this->validate(request(), [
            'image'        => 'image|mimes:jpeg,png|max:1024',
            'name'         => 'required|min:5|max:20',
          	'description'  => 'required|min:10|max:255|unique:achievements',
          ]);
        }

      if (request()->hasFile('image')) {
        // add the new photo
        $image  = request()->file('image');
        $filename    = time() . 'achieve' . '.' . $image->getClientOriginalExtension();
        $location    = public_path('img/'. $filename);
        Image::make($image)->resize(500, 500)->save($location);
        // request()->image_head->move(public_path('images/'), $filename);
        $oldFilename = $achievement->image;
        // update the photo
        $achievement->image = $filename;
        // Delete the old Photo
        Storage::delete($oldFilename);
      }

      $achievement->update([
         'name' => request('name'),
         'description' => request('description'),
      ]);

      return redirect('/achievements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $achievement = Achievement::findOrFail($id);

      Storage::delete($achievement->image);

      $achievement->delete();

      return redirect('/achievements');
    }
}
