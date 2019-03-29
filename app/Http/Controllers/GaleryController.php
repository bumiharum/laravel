<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galery;
use Image;
use Storage;

class GaleryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $galery = Galery::latest()->get();

      return view('galery.index', compact('galery'));
    }

    public function create()
    {
      return view('galery.create');
    }

    public function store(Request $request)
    {
      $this->validate(request(), [
        'image'       => 'required|image|mimes:jpeg,png|max:1024',
     		'description' => 'required|min:10|max:255|unique:galery',
     	]);

      if (request()->hasFile('image')) {
        $image    = request()->file('image');
        $filename = time() . 'galery' . '.' . $image->getClientOriginalExtension();
        $location = public_path('img/'. $filename);
        Image::make($image)->resize(1200, 720)->save($location);
      }

     	Galery::create([
        'image' => $filename,
     		'description' => request('description'),
     	]);

     	return redirect('/galery');
    }


    public function show($id)
    {
      $galery = Galery::findOrFail($id);

      return redirect('/galery');
    }

    public function edit($id)
    {
      $galery = Galery::findOrFail($id);

      return view('galery.edit', compact('galery'));
    }

    public function update($id)
    {
      $galery = Galery::findOrFail($id);

      if (request('description') == $galery->description) {
         $this->validate(request(), [
          'image' => 'image|mimes:jpeg,png|max:1024',
         ]);
      } else {
          $this->validate(request(), [
            'image'        => 'image|mimes:jpeg,png|max:1024',
          	'description' => 'required|min:10|max:255|unique:galery',
          ]);
        }

      if (request()->hasFile('image')) {
        // add the new photo
        $image  = request()->file('image');
        $filename    = time() . 'galery' . '.' . $image->getClientOriginalExtension();
        $location    = public_path('img/'. $filename);
        Image::make($image)->resize(1200, 720)->save($location);
        // request()->image_head->move(public_path('images/'), $filename);
        $oldFilename = $galery->image;
        // update the photo
        $galery->image = $filename;
        // Delete the old Photo
        Storage::delete($oldFilename);
      }

      $galery->update([
         'description' => request('description'),
      ]);

      return redirect('/galery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $galery = Galery::findOrFail($id);

      Storage::delete($galery->image);

      $galery->delete();

      return redirect('/galery');
    }
}
