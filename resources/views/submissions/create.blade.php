@extends('layouts.app')
@section('title','ارسال کتاب')
@section('content')
<div class="wrap page"><div class="panel"><h1>ارسال کتاب</h1><p>کتاب شما پس از بررسی مدیریت منتشر می‌شود.</p>@if(session('success'))<div class="notice">{{ session('success') }}</div>@endif
<form method="post" action="{{ route('submissions.store') }}" class="form">@csrf
<input name="submitter_name" required placeholder="نام شما"><input type="email" name="email" placeholder="ایمیل"><input name="phone" placeholder="شماره تماس">
<input name="book_name" required placeholder="نام کتاب"><input name="author_name" placeholder="مؤلف"><input name="subject" placeholder="موضوع">
<textarea name="short_intro" placeholder="معرفی کوتاه"></textarea><textarea name="description" placeholder="شرح کامل کتاب"></textarea>
<select name="language_code"><option value="fa">دری/فارسی</option><option value="ps">پښتو</option><option value="ar">العربية</option><option value="en">English</option></select>
<input name="publication_year" placeholder="سال نشر"><input type="url" name="external_url" placeholder="لینک مستقیم کتاب">
<input name="source" placeholder="منبع"><input name="copyright_status" placeholder="وضعیت حقوق نشر">
<button class="btn">ارسال برای بررسی</button></form></div></div>
@endsection
