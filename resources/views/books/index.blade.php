@extends('layouts.app')
@section('title','کتابخانه | OMH Library')
@section('content')
<div class="wrap page"><div class="panel"><div class="section-title"><div><h1>کتابخانه</h1><small>{{ $books->total() }} کتاب</small></div></div>
<form class="filter"><input name="q" value="{{ $q }}" placeholder="نام کتاب یا موضوع..."><button>جستجو</button></form>
<div class="book-table">@forelse($books as $i=>$book)<a class="book-list-row" href="{{ route('books.show',$book) }}"><span>{{ $books->firstItem()+$i }}</span><div class="mini-cover">کتاب</div><div class="book-main"><b>{{ $book->title }}</b><small>{{ $book->authors->pluck('name')->join('، ') ?: 'مؤلف نامشخص' }}</small></div><span>{{ $book->volumes_count }} جلد</span><span>{{ $book->views }} بازدید</span><span>{{ $book->downloads }} دانلود</span></a>@empty<p class="empty">کتابی پیدا نشد.</p>@endforelse</div>{{ $books->links() }}</div></div>
@endsection
