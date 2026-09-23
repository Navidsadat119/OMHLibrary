@extends('layouts.app')
@section('title',$author->name.' | OMH Library')
@section('content')
<div class="wrap page"><article class="panel"><h1>{{ $author->name }}</h1>
@if($author->full_name)<h3>نام کامل</h3><p>{{ $author->full_name }}</p>@endif
@if($author->birth_year || $author->death_year)<h3>تولد / وفات</h3><p>{{ $author->birth_year ?: '؟' }} — {{ $author->death_year ?: 'در قید حیات/نامعلوم' }}</p>@endif
@if($author->location)<h3>محل</h3><p>{{ $author->location }}</p>@endif
@if($author->biography)<h3>زندگی‌نامه</h3><div class="prose">{!! nl2br(e($author->biography)) !!}</div>@endif
@if($author->teachers)<h3>اساتید</h3><p>{!! nl2br(e($author->teachers)) !!}</p>@endif
@if($author->students)<h3>شاگردان</h3><p>{!! nl2br(e($author->students)) !!}</p>@endif
<h2>کتاب‌های موجود در OMH Library</h2>@foreach($author->books as $book)<a class="related" href="{{ route('books.show',$book) }}">{{ $book->title }}</a>@endforeach
</article></div>
@endsection
