<?php
$settings=[];try{foreach(OMH\DB::all('SELECT key,value FROM settings') as $s)$settings[$s['key']]=$s['value'];}catch(Throwable $e){}
$site=$settings['site_name']??'OMH Library | کتابخانه عمرمختار هاشمی';
$L=lang();
$copy=[
'fa'=>['welcome'=>'به کتابخانه عمرمختار هاشمی خوش آمدید ❤️','nav'=>['خانه','کتابخانه','ارسال کتاب','مؤلفین و زندگی‌نامه‌ها','ارتباط با ما'],'topics'=>'موضوعات کتابخانه','menu'=>'منو','search'=>'جستجو','theme'=>'تغییر حالت','footer'=>'کتابخانه دیجیتال علمی، اسلامی، حنفی و عصری عمرمختار هاشمی.'],
'ps'=>['welcome'=>'د عمرمختار هاشمي کتابتون ته ښه راغلاست ❤️','nav'=>['کور','کتابتون','کتاب لېږل','لیکوال او ژوندلیکونه','اړیکه'],'topics'=>'د کتابتون موضوعات','menu'=>'مینو','search'=>'لټون','theme'=>'بڼه بدلول','footer'=>'د عمرمختار هاشمي علمي، اسلامي، حنفي او عصري ډیجیټل کتابتون.'],
'ar'=>['welcome'=>'مرحباً بكم في مكتبة عمرمختار هاشمي ❤️','nav'=>['الرئيسية','المكتبة','إرسال كتاب','المؤلفون والسير','اتصل بنا'],'topics'=>'موضوعات المكتبة','menu'=>'القائمة','search'=>'بحث','theme'=>'تغيير المظهر','footer'=>'مكتبة عمرمختار هاشمي الرقمية للعلوم الإسلامية والحنفية والتعليم والعلوم العصرية.'],
'en'=>['welcome'=>'Welcome to Omar Mokhtar Hashemi Library ❤️','nav'=>['Home','Library','Submit a Book','Authors & Biographies','Contact Us'],'topics'=>'Library Topics','menu'=>'Menu','search'=>'Search','theme'=>'Theme','footer'=>'Omar Mokhtar Hashemi digital library for Islamic, Hanafi, educational and modern sciences.']][$L];
$welcome=$settings['welcome_'.$L]??$copy['welcome'];
$dir=$L==='en'?'ltr':'rtl';
?>
<!doctype html><html lang="<?=e($L)?>" dir="<?=$dir?>"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#071d16"><meta name="description" content="<?=e($settings['site_intro']??$copy['footer'])?>">
<meta property="og:title" content="<?=e($title??$site)?>"><meta property="og:description" content="<?=e($settings['site_intro']??$copy['footer'])?>">
<title><?=e($title??$site)?></title><link rel="canonical" href="<?=e(rtrim(envv('APP_URL',''),'/').($_SERVER['REQUEST_URI']??'/'))?>"><link rel="manifest" href="/manifest.webmanifest"><link rel="stylesheet" href="/assets/css/app.css">
</head><body class="omh-app">
<div class="splash" id="omhSplash" aria-label="<?=e($welcome)?>"><div class="splash-pattern"></div><div class="splash-content"><div class="splash-mark">OMH</div><div class="splash-line"></div><div class="splash-welcome"><?=e($welcome)?></div><div class="splash-spinner"><span></span><span></span><span></span></div><small>OMH LIBRARY</small></div></div>
<header class="top">
  <div class="bar">
    <button class="menu" aria-label="<?=e($copy['menu'])?>" onclick="document.body.classList.toggle('nav-open')">☰</button>
    <a class="brand" href="/" aria-label="OMH Library"><span class="logo"><i>OMH</i></span><span class="brand-text"><b>OMH Library</b><em>کتابخانه عمرمختار هاشمی</em></span></a>
    <nav><a href="/">★ <?=$copy['nav'][0]?></a><a href="/books">▤ <?=$copy['nav'][1]?></a><a href="/submit">＋ <?=$copy['nav'][2]?></a><a href="/authors">♜ <?=$copy['nav'][3]?></a><a href="/contact">✦ <?=$copy['nav'][4]?></a></nav>
    <div class="headtools"><a href="/lang?lang=fa">دری</a><a href="/lang?lang=ps">پښتو</a><a href="/lang?lang=ar">العربية</a><a href="/lang?lang=en">English</a><button class="theme" title="<?=e($copy['theme'])?>" onclick="document.body.classList.toggle('light');localStorage.theme=document.body.classList.contains('light')?'light':'dark'">☼</button></div>
    <button class="topic-btn" onclick="document.body.classList.toggle('topics-open')">☷ <?=$copy['topics']?></button>
  </div>
  <div class="welcome-ribbon"><div class="welcome-track"><span><?=e($welcome)?></span><span>✦</span><span><?=e($welcome)?></span><span>✦</span></div></div>
  <div class="topic-drawer"><div class="drawer-head"><strong><?=$copy['topics']?></strong><button onclick="document.body.classList.remove('topics-open')">×</button></div><?php try{foreach(OMH\DB::all("SELECT id,name,section FROM categories WHERE active=true ORDER BY section,sort_order,name LIMIT 160") as $tc): ?><a href="/category?id=<?=$tc['id']?>">› <?=e($tc['name'])?></a><?php endforeach;}catch(Throwable $e){} ?></div>
</header>
<main class="wrap"><?php if($flash): ?><div class="flash <?=$flash[0]?>"><?=e($flash[1])?></div><?php endif; ?><?=$content?></main>
<footer>
<section class="footer-topics"><div class="footer-title"><span>✦</span><h3><?=$copy['topics']?></h3><span>✦</span></div><div class="topic-columns"><?php try{foreach(OMH\DB::all("SELECT id,name FROM categories WHERE active=true ORDER BY section,sort_order,name LIMIT 160") as $tc): ?><a href="/category?id=<?=$tc['id']?>"><?=e($tc['name'])?></a><?php endforeach;}catch(Throwable $e){} ?></div></section>
<div class="footgrid"><div class="footer-brand"><div class="footer-logo">OMH</div><h3>OMH Library</h3><p><?=$copy['footer']?></p></div><div><h3><?=$copy['nav'][1]?></h3><a href="/books">📖 <?=$copy['nav'][1]?></a><a href="/authors">♜ <?=$copy['nav'][3]?></a><a href="/submit">＋ <?=$copy['nav'][2]?></a><a href="/contact">✦ <?=$copy['nav'][4]?></a></div><div><h3>موضوعات اصلی</h3><?php try{foreach(OMH\DB::all("SELECT id,name FROM categories WHERE active=true AND parent_id IS NULL ORDER BY sort_order LIMIT 12") as $c):?><a href="/category?id=<?=$c['id']?>"><?=e($c['name'])?></a><?php endforeach;}catch(Throwable $e){} ?></div><div><h3>ارتباط و قوانین</h3><a href="/legal">حقوق نشر و قوانین</a><a href="/sitemap.xml">نقشه سایت</a><a href="/robots.txt">Robots</a><a href="/contact">بازخورد و پیشنهاد</a></div></div><div class="copy">© <?=date('Y')?> OMH Library — کتابخانه عمرمختار هاشمی · لوگر، افغانستان</div>
</footer>
<script>if(localStorage.theme==='light')document.body.classList.add('light')</script><script src="/assets/js/app.js"></script><script>if("serviceWorker" in navigator)navigator.serviceWorker.register("/sw.js").catch(()=>{});</script></body></html>
