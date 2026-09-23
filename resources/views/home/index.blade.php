@extends('layouts.app')
@section('title','OMH Library | کتابخانه عمرمختار هاشمی')
@section('content')
<div class="wrap">
<section class="intro panel">
 <span class="eyebrow">OMH LIBRARY</span>
 <h1>کتابخانه عمرمختار هاشمی</h1>
 <p>OMH Library یک کتابخانه دیجیتال برای گردآوری، دسته‌بندی و دسترسی آسان به کتاب‌ها و منابع علمی، دینی، آموزشی و فرهنگی است. ساختار کتابخانه از ابتدا برای رشد بزرگ طراحی شده است؛ کتاب‌ها بر اساس علوم، فنون درسی و کتاب‌های مکتب مرتب می‌شوند و هر اثر می‌تواند همزمان در چند موضوع قرار بگیرد.</p>
 <p>در این کتابخانه برای هر کتاب اطلاعاتی مانند مؤلف، زبان، موضوع، توضیح کوتاه و شرح کامل، جلدها، منبع، تاریخ نشر، آمار بازدید و دانلود و ارتباط آن با شروحات و حواشی ثبت می‌شود. هدف این است که کاربر تنها یک فایل پیدا نکند، بلکه یک صفحه منظم و قابل اعتماد درباره خود اثر در اختیار داشته باشد.</p>
 <p>بخش <b>فنون درسی</b> مخصوص کتاب‌های درسی مدارس دینی و مراحل مختلف آموزش علوم اسلامی است؛ در حالی که <b>کتاب‌های مکتب</b> یک بخش مستقل برای صنف اول تا دوازدهم و مضامین مکتب است. این دو بخش با علوم عمومی اشتباه نمی‌شوند و مدیریت آن‌ها از پنل امکان‌پذیر خواهد بود.</p>
 <p>کتابخانه از ارسال کتاب توسط کاربران نیز پشتیبانی می‌کند. هر اثر پیش از انتشار توسط مدیریت بررسی می‌شود و اطلاعات آن می‌تواند قبل از تأیید ویرایش گردد. برای آثار دارای محدودیت حقوقی، سیستم امکان ثبت اطلاعات و لینک به منبع اصلی را فراهم می‌کند.</p>
</section>

<section class="section"><div class="section-title"><div><h2>سه بخش اصلی کتابخانه</h2><small>ساختار مستقل و قابل گسترش</small></div></div>
<div class="section-list">
@foreach($sections as $s)<a class="section-row" href="{{ route('books.index',['q'=>$s->name]) }}"><b>{{ $s->name }}</b><span>{{ $s->children()->where('is_active',true)->count() }} موضوع</span></a>@endforeach
</div></section>

@if($featured->count())
<section class="section"><div class="section-title"><div><h2>کتاب‌های ویژه</h2><small>منتخب مدیریت کتابخانه</small></div></div>
<div class="featured-track">@foreach($featured as $book)<a class="featured-item" href="{{ route('books.show',$book) }}"><div class="cover">کتاب</div><b>{{ $book->title }}</b></a>@endforeach</div></section>
@endif

<section class="columns">
<div class="panel"><div class="section-title"><h2>پربازدیدترین کتاب‌ها</h2></div>@foreach($popular as $i=>$book)<a class="book-row" href="{{ route('books.show',$book) }}"><span>{{ $i+1 }}</span><div class="mini-cover">کتاب</div><div><b>{{ $book->title }}</b><small>{{ $book->views }} بازدید</small></div></a>@endforeach</div>
<div class="panel"><div class="section-title"><h2>آخرین به‌روزرسانی‌ها</h2></div>@foreach($updated as $book)<a class="book-row" href="{{ route('books.show',$book) }}"><span>•</span><div class="mini-cover">کتاب</div><div><b>{{ $book->title }}</b><small>{{ $book->updated_at->format('Y/m/d') }}</small></div></a>@endforeach</div>
</section>
</div>
@endsection
