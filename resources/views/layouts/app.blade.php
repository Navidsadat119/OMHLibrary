<!doctype html>
<html lang="fa" dir="rtl" data-theme="dark">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="کتابخانه عمرمختار هاشمی — OMH Library">
<title>@yield('title','OMH Library | کتابخانه عمرمختار هاشمی')</title>
@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<header class="site-header">
  <div class="topline"><div class="wrap"><span>OMH Library</span><span>کتابخانه عمرمختار هاشمی</span></div></div>
  <div class="head wrap">
    <button class="menu-btn" data-menu="main">☰</button>
    <a class="brand" href="{{ route('home') }}"><span class="logo-mark">ا</span><span><b>OMH Library</b><small>کتابخانه عمرمختار هاشمی</small></span></a>
    <form class="global-search" action="{{ route('search') }}"><input name="q" placeholder="جستجو در کتاب‌ها، مؤلفین و علوم..."><button>⌕</button></form>
    <div class="actions"><button id="themeToggle">☾</button><button class="menu-btn" data-menu="topics">☷</button></div>
  </div>
  <nav class="nav wrap">
   <a href="{{ route('home') }}">خانه</a><a href="{{ route('books.index') }}">کتابخانه</a><a href="{{ route('submissions.create') }}">ارسال کتاب</a><a href="{{ route('authors.index') }}">مؤلفین و زندگی‌نامه‌ها</a><a href="{{ route('contact') }}">ارتباط با ما</a>
  </nav>
  <div class="welcome"><span>به کتابخانه عمرمختار هاشمی خوش آمدید 🥀</span></div>
</header>
<div id="topicDrawer" class="drawer"><div class="drawer-head"><b>موضوعات</b><button data-close>×</button></div>
 @php($roots=\App\Models\Category::whereNull('parent_id')->where('is_active',true)->orderBy('sort_order')->get())
 @foreach($roots as $root)<details><summary>{{ $root->name }}</summary>@foreach($root->children()->where('is_active',true)->get() as $child)<a href="{{ route('books.index',['q'=>$child->name]) }}">{{ $child->name }}</a>@endforeach</details>@endforeach
</div>
<main>@yield('content')</main>
<footer>
 <div class="wrap footer1"><div><b>OMH Library</b><p>کتابخانه دیجیتال عمرمختار هاشمی؛ برای دسترسی منظم و حرفه‌ای به منابع علمی، دینی و آموزشی.</p></div><div><a href="{{ route('home') }}">خانه</a><a href="{{ route('books.index') }}">کتابخانه</a><a href="{{ route('submissions.create') }}">ارسال کتاب</a><a href="{{ route('authors.index') }}">مؤلفین</a><a href="{{ route('contact') }}">ارتباط با ما</a></div></div>
 <div class="footer2"><div class="wrap"><h3>موضوعات کتابخانه</h3><div class="topic-grid">@foreach($roots as $root)<section><b>{{ $root->name }}</b>@foreach($root->children()->where('is_active',true)->take(10)->get() as $child)<a href="{{ route('books.index',['q'=>$child->name]) }}">{{ $child->name }}</a>@endforeach</section>@endforeach</div></div></div>
 <div class="copyright">© {{ date('Y') }} OMH Library — کتابخانه عمرمختار هاشمی</div>
</footer>
</body></html>
