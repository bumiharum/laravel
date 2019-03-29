<?php

namespace App\Http\Controllers;

use App\Administrator;
use App\Role;
use Storage;
use Image;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $administrator = Administrator::latest()->get();

      return view('administrator.index', compact('administrator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::all();
      return view('administrator.create', compact('roles'));
    }

    public function store()
    {
      $this->validate(request(), [
        'name'        => 'required|min:5|max:20|unique:administrator',
        'image'       => 'required|image|mimes:jpeg,png|max:1024',
        'role'        => 'required'
     	]);

      if (request()->hasFile('image')) {
        $image    = request()->file('image');
        $filename = time() . 'admin' . '.' . $image->getClientOriginalExtension();
        $location = public_path('img/'. $filename);
        Image::make($image)->resize(500, 700)->save($location);
      }

     	Administrator::create([
        'name'    => request('name'),
        'image'   => $filename,
        'role_id' => request('role')
     	]);

     	return redirect('/administrator');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $administrator = Administrator::findOrFail($id);

      return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $administrator = Administrator::findOrFail($id);
      $roles   = Role::all();


      $rls = array();
      foreach ($roles as $role) {
        $rls[$role->id] = $role->name;
      }

      return view('administrator.edit')->withAdministrator($administrator)->withRoles($rls);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      $administrator = Administrator::findOrFail($id);

      if (request('name') == $administrator->name) {
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
        $filename    = time() . 'admin' . '.' . $image->getClientOriginalExtension();
        $location    = public_path('img/'. $filename);
        Image::make($image)->resize(500, 700)->save($location);
        // request()->image_head->move(public_path('images/'), $filename);
        $oldFilename = $administrator->image;
        // update the photo
        $administrator->image = $filename;
        // Delete the old Photo
        Storage::delete($oldFilename);
      }

      $administrator->update([
         'name' => request('name'),
         'role_id' => request('role_id')
      ]);

      return redirect('/administrator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $administrator = Administrator::findOrFail($id);

      Storage::delete($administrator->image);

      $administrator->delete();

      return redirect('/administrator');
    }
}
