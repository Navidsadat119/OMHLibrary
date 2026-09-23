<?php
namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller {
    public function index(Request $request) {
        $q = trim($request->get('q',''));
        $books = Book::with(['authors','categories'])->where('status','published')
            ->when($q, fn($x)=>$x->where(function($w) use($q){
                $w->where('title','like',"%{$q}%")->orWhere('subject','like',"%{$q}%")
                  ->orWhere('short_intro','like',"%{$q}%");
            }))
            ->orderByDesc('updated_at')->paginate(20)->withQueryString();
        return view('books.index', compact('books','q'));
    }

    public function show(Book $book) {
        abort_unless($book->status === 'published',404);
        $book->increment('views');
        $book->load(['authors','categories','volumes','relatedCommentaries','baseWorks']);
        return view('books.show', compact('book'));
    }

    public function download(Book $book, $volume = null) {
        abort_unless($book->status === 'published',404);
        $book->increment('downloads');
        $path = $volume ? optional($book->volumes()->where('volume_number',$volume)->first())->file_path : null;
        if (!$path && $book->external_download_url) return redirect()->away($book->external_download_url);
        abort_unless($path && Storage::disk('public')->exists($path),404);
        return Storage::disk('public')->download($path);
    }
}
