<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
      $videos = Video::latest()->get();
      return view('videos.index', compact('videos'));
    }

    public function create()
    {
      return view('videos.create');
    }

    public function store(Request $request)
    {
      $this->validate(request(), [
     		'embed'          => 'required|min:10|max:100|unique:videos',
     		'description'  => 'required|min:20|max:255',
      ]);

     	Video::create([
     		'embed' => request('embed'),
     		'description'  => request('description'),
     	]);

     	return redirect('/videos');
    }

    public function show($id)
    {
      $video = Video::findOrFail($id);

      return redirect()->back();
    }

    public function edit($id)
    {
      $video = Video::findOrFail($id);

      return view('videos.edit', compact('video'));
    }

    public function update($id)
    {
      $video = Video::findOrFail($id);

      if (request('embed') == $video->embed) {
         $this->validate(request(), [
          'description' => 'required|min:10|max:255',
         ]);
      } else {
          $this->validate(request(), [
            'embed'       => 'required|min:10|max:100|unique:videos',
            'description' => 'required|min:10|max:255',
          ]);
        }

      $video->update([
        'embed'       => request('embed'),
        'description' => request('description')
      ]);

      return redirect('/videos');
    }

    public function destroy($id)
    {
      $video = Video::findOrFail($id);

      $video->delete();

      return redirect('/videos');
    }
}
