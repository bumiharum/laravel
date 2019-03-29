<?php

namespace App\Http\Controllers;

use App\Extra;
use App\Extracurricular;
use Image;
use Storage;
use Illuminate\Http\Request;

class ExtrasController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
      $extras = Extra::latest()->get();

      return view('extras.index', compact('extras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $extracurriculars = Extracurricular::all();
      return view('extras.create', compact('extracurriculars'));
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
        'extracurricular_id' => 'required'
     	]);

      if (request()->hasFile('image')) {
        $image    = request()->file('image');
        $filename = time() . 'extra' . '.' . $image->getClientOriginalExtension();
        $location = public_path('img/'. $filename);
        Image::make($image)->resize(1200, 720)->save($location);
      }

     	Extra::create([
        'image' => $filename,
        'description' => request('description'),
        'extracurricular_id' => request('extracurricular_id')
     	]);

     	return redirect('/extras');
    }

    public function show($id)
    {
      $extras = Extra::findOrFail($id);

      return redirect()->back();
    }

    public function edit($id)
    {
      $extra = Extra::findOrFail($id);
      $extracurriculars = Extracurricular::all();


      $exts= array();
      foreach ($extracurriculars as $ext) {
        $exts[$ext->id] = $ext->name;
      }

      return view('extras.edit')->withExtra($extra)->withExtracurriculars($exts);
    }

    public function update($id)
    {
      $extra = Extra::findOrFail($id);

      $this->validate(request(), [
        'image'       => 'image|mimes:jpeg,png|max:1024',
        'description' => 'required|min:10|max:255',
     	]);


      if (request()->hasFile('image')) {
        // add the new photo
        $image  = request()->file('image');
        $filename    = time() . 'extras' . '.' . $image->getClientOriginalExtension();
        $location    = public_path('img/'. $filename);
        Image::make($image)->resize(1200, 720)->save($location);
        // request()->image_head->move(public_path('images/'), $filename);
        $oldFilename = $picture->image;
        // update the photo
        $picture->image = $filename;
        // Delete the old Photo
        Storage::delete($oldFilename);
      }

      $extra->update([
         'extracurricular_id' => request('extracurricular_id')
      ]);

      return redirect('/extracurriculars');
    }

    public function destroy($id)
    {
      $extra = Extra::findOrFail($id);

      Storage::delete($extra->image);

      $extra->delete();

      return redirect('/extras');
    }
}
