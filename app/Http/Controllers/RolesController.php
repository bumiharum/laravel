<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
      $roles = Role::latest()->get();
      return view('roles.index', compact('roles'));
    }

    public function store()
    {
      $this->validate(request(), [
        'name' => 'required|min:5|max:20|unique:roles'
      ]);

      Role::create([
        'name' => request('name')
      ]);

      return redirect('/roles');
    }

    public function show($id)
    {
      $role = Role::findOrFail($id);

      return redirect('/');
    }

    public function edit($id)
    {
      $role = Role::findOrFail($id);

      return view('roles.edit', compact('role'));
    }

    public function update($id)
    {
      $role = Role::findOrFail($id);

      if (request('name') == $role->name) {
        return redirect('/roles');
      } else {
        $this->validate(request(), [
          'name' => 'required|min:5|max:20|unique:studies'
        ]);
      }

      $role->update([
        'name' => request('name')
      ]);

      return redirect('/roles');
    }

    public function destroy($id)
    {
      $role = Role::findOrFail($id);

      $role->delete();
      return redirect()->back();
    }
}
