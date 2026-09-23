<?php
namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller {
    public function index() {
        $sections = Category::whereNull('parent_id')->where('is_active',true)->orderBy('sort_order')->get();
        $featured = Book::where('status','published')->where('is_featured',true)->orderBy('featured_order')->take(12)->get();
        $popular = Book::where('status','published')->orderByDesc('views')->take(8)->get();
        $updated = Book::where('status','published')->latest('updated_at')->take(8)->get();
        return view('home.index', compact('sections','featured','popular','updated'));
    }
}
