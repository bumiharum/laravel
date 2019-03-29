<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Video;
use App\Galery;
use App\Teacher;
use App\Picture;
use App\Achievement;
use App\Administrator;
use App\Infrastructure;
use App\Extracurricular;

class PagesController extends Controller
{
	public function home()
	{
		$posts = Post::latest()->limit(6)->get();
		$galery = Galery::latest()->limit(9)->get();
		$video1 = Video::latest()->limit(1)->get();
		$video2 = Video::latest()->skip(1)->take(1)->get();
		$achievements = Achievement::latest()->limit(6)->get();

		return view('pages.home', compact('posts', 'galery', 'video1', 'video2', 'achievements'));
	}

	public function blog()
	{
		$blogs = Post::latest()->paginate(2);

		return view('pages.blog', compact('blogs'));
	}

	public function single($slug)
	{
		$post  = Post::where('slug', $slug)->firstOrFail();
		$posts = Post::where('id', '!=', $post->id)->inRandomOrder()->take(5)->get();

		return view('pages.single', compact('post', 'posts'));
	}

	public function visimisi()
	{

		return view('pages.visimisi');
	}

	public function hubungan()
	{

		return view('pages.hubungan');
	}

	public function guru()
	{
		$teachers = Teacher::all();
		$administrator = Administrator::all();

		return view('pages.guru', compact('teachers', 'administrator'));
	}

	public function sarpras($name = null)
	{
		if ($name == null) {
			$infrastructures = Infrastructure::all();

			return view('pages.sarpras-pic', compact('infrastructures'));
		}

		$infrastructure = Infrastructure::where('name', $name)->firstOrFail();
		$infrastructures = Infrastructure::where('name', '!=', $infrastructure->name)->get();

		return view('pages.sarpras', compact('infrastructure', 'infrastructures'));
	}

	public function eskul($name = null)
	{
		if ($name == null) {
			$extracurriculars = Extracurricular::all();

			return view('pages.extracurriculars', compact('extracurriculars'));
		}

		$extracurricular = Extracurricular::where('name', $name)->firstOrFail();
		$extracurriculars = Extracurricular::where('name', '!=', $extracurricular->name)->get();

		return view('pages.eskul', compact('extracurricular', 'extracurriculars'));
	}

}
