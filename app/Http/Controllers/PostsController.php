<?php

namespace App\Http\Controllers;

use App\Post;
use Image;
use Storage;
use App\Category;

use Illuminate\Http\Request;

class PostsController extends Controller
{

   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index()
   {
   	$posts = Post::latest()->get();
   	return view('posts.index', compact('posts'));
   }


   public function create()
   {
    $categories = Category::all();
   	return view('posts.create', compact('categories'));
   }

   public function store(Request $request)
   {
   	$this->validate(request(), [
   		'title' => 'required|min:10|max:100|unique:posts',
   		'body'  => 'required|min:100',
      'image' => 'required|image|mimes:jpeg,png|max:1024',
      'category_id' => 'required'
   	]);

       if (request()->hasFile('image')) {
        $image    = request()->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('img/'. $filename);
        Image::make($image)->save($location);
      }

   	Post::create([
   		'title' => request('title'),
   		'body'  => request('body'),
      'image' => $filename,
      'category_id' => request('category_id'),
      'slug'  => str_slug(request('title'), '-')
   	]);

   	return redirect('/posts');
   }

   public function show($slug)
   {
      $post = Post::where('slug', $slug)->firstOrFail();

      return view('posts.show', compact('post'));
   }

   public function edit($slug)
   {
      $post = Post::where('slug', $slug)->firstOrFail();
      $categories = Category::all();

      $cats = array();
      foreach ($categories as $category) {
        $cats[$category->id] = $category->name;
      }

      return view('posts.edit')->withPost($post)->withCategories($cats);
   }

   public function update($slug)
   {
      $post = Post::where('slug', $slug)->firstOrFail();

      if (request('title') == $post->title) {
         $this->validate(request(), [
            'body'  => 'required|min:100',
            'image' => 'image|mimes:jpeg,png|max:1024',
         ]);
      } else {
         $this->validate(request(), [
         'title' => 'required|min:10|max:100|unique:posts',
         'body'  => 'required|min:100',
         'image' => 'image|mimes:jpeg,png|max:1024',
      ]);
      }

      if (request()->hasFile('image')) {
        // add the new photo
        $image  = request()->file('image');
        $filename    = time() . '.' . $image->getClientOriginalExtension();
        $location    = public_path('img/'. $filename);
        Image::make($image)->save($location);
        // request()->image_head->move(public_path('images/'), $filename);
        $oldFilename = $post->image;
        // update the photo
        $post->image = $filename;
        // Delete the old Photo
        Storage::delete($oldFilename);
      }



      $post->update([
         'title' => request('title'),
         'body'  => request('body'),
         'category_id' => request('category_id'),
         'slug'  => str_slug(request('title'), '-')
      ]);




      return redirect('/posts');
   }

   public function destroy($id)
   {
      $post = Post::findOrFail($id);

      Storage::delete($post->image);

      $post->delete();

      return redirect('/posts');
   }

}
