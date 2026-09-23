@extends('layouts.app')
@section('title',$book->title.' | OMH Library')
@section('content')
<div class="wrap page"><article class="panel book-detail">
<div class="detail-head"><div class="large-cover">کتاب</div><div><h1>{{ $book->title }}</h1><p>مؤلف: {{ $book->authors->pluck('name')->join('، ') ?: 'نامشخص' }}</p><div class="stats"><span>{{ $book->volumes_count }} جلد</span><span>{{ $book->views }} بازدید</span><span>{{ $book->downloads }} دانلود</span></div></div></div>
@if($book->short_intro)<div class="notice">{{ $book->short_intro }}</div>@endif
<h2>شرح و معرفی کتاب</h2><div class="prose">{!! nl2br(e($book->description ?: 'برای این کتاب شرح تفصیلی ثبت نشده است.')) !!}</div>
@if($book->baseWorks->count())<h2>این کتاب شرح/حاشیهٔ</h2>@foreach($book->baseWorks as $r)<a class="related" href="{{ route('books.show',$r) }}">{{ $r->title }}</a>@endforeach @endif
@if($book->relatedCommentaries->count())<h2>شروحات و تعلیقات موجود</h2>@foreach($book->relatedCommentaries as $r)<a class="related" href="{{ route('books.show',$r) }}">{{ $r->title }}</a>@endforeach @endif
@if($book->volumes->count())<h2>جلدها</h2>@foreach($book->volumes as $v)<div class="volume"><b>جلد {{ $v->volume_number }}</b>@if($v->file_path || $book->external_download_url)<a class="btn" href="{{ route('books.download',[$book,$v->volume_number]) }}">دانلود</a>@endif</div>@endforeach @else
<div class="download-box">@if($book->external_download_url)<a class="btn" href="{{ route('books.download',$book) }}">دانلود از منبع اصلی</a>@else<span>فایل برای این کتاب هنوز ثبت نشده است.</span>@endif</div>@endif
</article></div>
@endsection
