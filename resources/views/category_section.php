<div class="pagehead"><div><h1><?=e($title)?></h1><p class="muted">موضوعات این بخش</p></div></div>
<div class="science-list">
<?php foreach($cats as $c): if(!$c['books']) continue; ?>
  <a href="/category?id=<?=$c['id']?>"><span><?=e($c['name'])?></span><b><?=number_format($c['books'])?> کتاب</b></a>
<?php endforeach; ?>
</div>
