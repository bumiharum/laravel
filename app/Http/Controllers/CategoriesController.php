<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function store()
    {
      $this->validate(request(), [
        'name' => 'required|min:5|max:50|unique:categories'
      ]);

      Category::create([
        'name' => request('name')
      ]);

      return redirect('/categories');
    }

    public function show($id)
    {
      $category = Category::findOrFail($id);

      return redirect('/categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Category::findOrFail($id);

      return view('categories.edit', compact('category'));
    }

    public function update($id)
    {
      $category = Category::findOrFail($id);

      if (request('name') == $category->name) {
        return redirect('/categories');
      } else {
        $this->validate(request(), [
          'name' => 'required|min:5|max:50|unique:categories'
        ]);
      }

      $category->update([
        'name' => request('name')
      ]);

      return redirect('/categories');
    }

    public function destroy($id)
    {
      $category = Category::findOrFail($id);

      $category->delete();
      return redirect()->back();
    }
}
