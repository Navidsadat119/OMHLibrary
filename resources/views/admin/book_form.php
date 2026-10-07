<div class="adminhead"><h1><?=e($title)?></h1><a href="/admin/books">بازگشت</a></div>
<form class="formbox" method="post" action="/admin/book/save" enctype="multipart/form-data">
<?=csrf_field()?>
<input type="hidden" name="id" value="<?=e($b['id']??0)?>">
<label>نام کتاب<input name="title" value="<?=e($b['title']??'')?>" required></label>
<label>مؤلف<select name="author_id"><option value="0">بدون مؤلف</option><?php foreach($authors as $a):?><option value="<?=$a['id']?>" <?=($a['id']==($b['author_id']??0)?'selected':'')?>><?=e($a['name'])?></option><?php endforeach;?></select></label>
<div class="two"><label>زبان<input name="language_code" value="<?=e($b['language_code']??'fa')?>"></label><label>تعداد جلد<input type="number" min="1" name="volumes" value="<?=e($b['volumes']??1)?>"></label></div>
<label>معرفی<textarea name="description"><?=e($b['description']??'')?></textarea></label>
<label>شرح کامل<textarea name="full_description" rows="8"><?=e($b['full_description']??'')?></textarea></label>
<label>کلیدواژه‌ها<input name="keywords" value="<?=e($b['keywords']??'')?>"></label><label>جلد/کاور<input type="file" name="cover" accept="image/jpeg,image/png,image/webp"></label>
<label>وضعیت<select name="status"><option value="published">published</option><option value="draft" <?=($b['status']??'')==='draft'?'selected':''?>>draft</option></select></label>
<div class="checks"><label><input type="checkbox" name="featured" <?=!empty($b['featured'])?'checked':''?>> ویژه</label><label><input type="checkbox" name="is_my_book" <?=!empty($b['is_my_book'])?'checked':''?>> کتاب من</label></div>
<label>ترتیب مدیریت<input type="number" name="admin_order" value="<?=e($b['admin_order']??0)?>"></label>
<h3>علوم / دسته‌بندی‌ها</h3><div class="catchecks"><?php foreach($cats as $c):?><label><input type="checkbox" name="categories[]" value="<?=$c['id']?>" <?=in_array($c['id'],$selected)?'checked':''?>> <?=e($c['name'])?> <small><?=e($c['section'])?></small></label><?php endforeach;?></div>
<button class="btn">ذخیره</button>
</form>
