<?php

namespace App\Http\Controllers;

use App\Picture;
use App\Infrastructure;
use Image;
use Storage;
use Illuminate\Http\Request;

class PicturesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
      $pictures = Picture::latest()->get();

      return view('pictures.index', compact('pictures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $infrastructures = Infrastructure::all();
      return view('pictures.create', compact('infrastructures'));
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
        'image'       => 'required|image|mimes:jpeg,png|max:1024',
        'description' => 'required|min:10|max:255',
        'infrastructure_id' => 'required'
     	]);

      if (request()->hasFile('image')) {
        $image    = request()->file('image');
        $filename = time() . 'infras' . '.' . $image->getClientOriginalExtension();
        $location = public_path('img/'. $filename);
        Image::make($image)->resize(1200, 720)->save($location);
      }

     	Picture::create([
        'image' => $filename,
        'description' => request('description'),
        'infrastructure_id' => request('infrastructure_id')
     	]);

     	return redirect('/pictures');
    }

    public function show($id)
    {
      $picture = Picture::findOrFail($id);

      return redirect()->back();
    }

    public function edit($id)
    {
      $picture = Picture::findOrFail($id);
      $infrastructures = Infrastructure::all();


      $infras = array();
      foreach ($infrastructures as $infrastructure) {
        $infras[$infrastructure->id] = $infrastructure->name;
      }

      return view('pictures.edit')->withPicture($picture)->withInfrastructures($infras);
    }

    public function update($id)
    {
      $picture = Picture::findOrFail($id);

      $this->validate(request(), [
        'image'       => 'image|mimes:jpeg,png|max:1024',
        'description' => 'required|min:10|max:255',
     	]);


      if (request()->hasFile('image')) {
        // add the new photo
        $image  = request()->file('image');
        $filename    = time() . 'infras' . '.' . $image->getClientOriginalExtension();
        $location    = public_path('img/'. $filename);
        Image::make($image)->resize(1200, 720)->save($location);
        // request()->image_head->move(public_path('images/'), $filename);
        $oldFilename = $picture->image;
        // update the photo
        $picture->image = $filename;
        // Delete the old Photo
        Storage::delete($oldFilename);
      }

      $picture->update([
         'infrastructure_id' => request('infrastructure_id')
      ]);

      return redirect('/pictures');
    }

    public function destroy($id)
    {
      $picture = Picture::findOrFail($id);

      Storage::delete($picture->image);

      $picture->delete();

      return redirect('/pictures');
    }
}
