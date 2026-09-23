<?php
namespace App\Http\Controllers;
use App\Models\Author;

class AuthorController extends Controller {
    public function index() {
        $authors = Author::withCount('books')->orderBy('name')->paginate(30);
        return view('authors.index', compact('authors'));
    }
    public function show(Author $author) {
        $author->load(['books'=>fn($q)=>$q->where('status','published')->with('authors')]);
        return view('authors.show', compact('author'));
    }
}
