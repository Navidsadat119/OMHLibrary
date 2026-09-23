@extends('layouts.app')
@section('title','جستجو | OMH Library')
@section('content')
<div class="wrap page"><div class="panel"><h1>نتایج جستجو</h1><form class="filter"><input name="q" value="{{ $q }}" placeholder="جستجو..."><button>جستجو</button></form>
@if($q)<h2>کتاب‌ها</h2>@foreach($books as $b)<a class="related" href="{{ route('books.show',$b) }}">{{ $b->title }}</a>@endforeach
<h2>مؤلفین</h2>@foreach($authors as $a)<a class="related" href="{{ route('authors.show',$a) }}">{{ $a->name }}</a>@endforeach
<h2>علوم</h2>@foreach($categories as $c)<a class="related" href="{{ route('books.index',['q'=>$c->name]) }}">{{ $c->name }}</a>@endforeach
@else<p>عبارت مورد نظر را جستجو کنید.</p>@endif</div></div>
@endsection
