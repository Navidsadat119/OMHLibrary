@extends('layouts.app')
@section('title','مؤلفین و زندگی‌نامه‌ها')
@section('content')
<div class="wrap page"><div class="panel"><div class="section-title"><h1>مؤلفین و زندگی‌نامه‌ها</h1></div>@foreach($authors as $author)<a class="author-row" href="{{ route('authors.show',$author) }}"><b>{{ $author->name }}</b><span>{{ $author->books_count }} کتاب</span></a>@endforeach{{ $authors->links() }}</div></div>
@endsection
