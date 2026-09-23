<?php
namespace App\Http\Controllers;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubmissionController extends Controller {
    public function create() { return view('submissions.create'); }

    public function store(Request $request) {
        $data = $request->validate([
            'submitter_name'=>'required|string|max:150','email'=>'nullable|email|max:190',
            'phone'=>'nullable|string|max:40','book_name'=>'required|string|max:300',
            'author_name'=>'nullable|string|max:200','subject'=>'nullable|string|max:200',
            'short_intro'=>'nullable|string|max:1500','description'=>'nullable|string',
            'language_code'=>'required|string|max:10','publication_year'=>'nullable|integer|min:1000|max:2200',
            'external_url'=>'nullable|url|max:1000','source'=>'nullable|string|max:300',
            'copyright_status'=>'nullable|string|max:100'
        ]);
        $data['tracking_token'] = Str::random(64);
        $data['status'] = 'pending';
        Submission::create($data);
        return back()->with('success','کتاب شما ثبت شد و پس از بررسی مدیریت منتشر خواهد شد.');
    }
}
