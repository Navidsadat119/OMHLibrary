<div class="pagehead library-head">
  <div><h1>کتابخانه</h1><p class="muted">دسترسی منظم به علوم، فنون درسی، کتاب‌های مکتب و علوم عصری</p></div>
</div>
<div class="library-grid">
  <?php foreach($sections as $s): ?>
    <section class="library-section">
      <div class="section-head"><h2><?=e($s['name'])?></h2><a href="<?=e($s['url'])?>">مشاهده همه ←</a></div>
      <?php if($s['cats']): ?>
        <div class="science-list compact">
          <?php foreach($s['cats'] as $c): if(!$c['books']) continue; ?>
            <a href="/category?id=<?=$c['id']?>"><span><?=e($c['name'])?></span><b><?=number_format($c['books'])?> کتاب</b></a>
          <?php endforeach; ?>
        </div>
      <?php else: ?><div class="empty">هنوز موضوعی در این بخش ثبت نشده است.</div><?php endif; ?>
    </section>
  <?php endforeach; ?>
  <section class="library-section my-books-panel">
    <div class="section-head"><h2>⭐ کتاب‌های من</h2><a href="/my-books">ورود به کتاب‌های من ←</a></div>
    <p>کتاب‌هایی که مدیریت کتابخانه به‌عنوان آثار منتخب «کتاب‌های من» مشخص کرده است.</p>
    <a class="btn" href="/my-books">مشاهده کتاب‌های من</a>
  </section>
</div>
