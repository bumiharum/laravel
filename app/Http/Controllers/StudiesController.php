<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Study;

class StudiesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $studies = Study::latest()->get();
        return view('studies.index', compact('studies'));
    }

    public function store()
    {
      $this->validate(request(), [
        'name' => 'required|min:5|max:50|unique:studies'
      ]);

      Study::create([
        'name' => request('name')
      ]);

      return redirect('/studies');
    }

    public function show($id)
    {
      $study = Study::findOrFail($id);

      return redirect('/studies');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $study = Study::findOrFail($id);

      return view('studies.edit', compact('study'));
    }

    public function update($id)
    {
      $study = Study::findOrFail($id);

      if (request('name') == $study->name) {
        return redirect('/studies');
      } else {
        $this->validate(request(), [
          'name' => 'required|min:5|max:50|unique:studies'
        ]);
      }

      $study->update([
        'name' => request('name')
      ]);

      return redirect('/studies');
    }

    public function destroy($id)
    {
      $study = Study::findOrFail($id);

      $study->delete();
      return redirect()->back();
    }
}
