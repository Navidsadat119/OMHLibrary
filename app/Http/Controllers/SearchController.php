<?php
namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller {
    public function index(Request $request) {
        $q = trim($request->get('q',''));
        $books = $authors = $categories = collect();
        $types = $request->input('types',['books','authors','sciences']);
        if (!$q) return view('home.search',compact('q','books','authors','categories','types'));
        if (in_array('books',$types)) $books = Book::where('status','published')->where(fn($x)=>$x->where('title','like',"%$q%")->orWhere('subject','like',"%$q%"))->paginate(12,['*'],'books_page');
        if (in_array('authors',$types)) $authors = Author::where('name','like',"%$q%")->paginate(12,['*'],'authors_page');
        if (in_array('sciences',$types)) $categories = Category::where('is_active',true)->where('name','like',"%$q%")->paginate(12,['*'],'science_page');
        return view('home.search',compact('q','books','authors','categories','types'));
    }
}
