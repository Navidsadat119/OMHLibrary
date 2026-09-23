<?php require __DIR__.'/../app/bootstrap.php';
$sql=file_get_contents(__DIR__.'/schema.sql');OMH\DB::p()->exec($sql);
$email=envv('ADMIN_EMAIL','admin@example.com');$pass=envv('ADMIN_PASSWORD','ChangeMe_123!');
if(!OMH\DB::one('SELECT id FROM admins WHERE email=?',[$email]))OMH\DB::exec('INSERT INTO admins(email,password_hash) VALUES(?,?)',[$email,password_hash($pass,PASSWORD_DEFAULT)]);
$defaults=['site_name'=>'OMH Library | کتابخانه عمرمختار هاشمی','site_intro'=>'کتابخانه دیجیتال علمی، اسلامی و فرهنگی عمرمختار هاشمی؛ مرجع منظم برای جستجو، مطالعه و معرفی کتاب‌ها و آثار مجاز.','maintenance'=>'0','show_downloads'=>'1'];foreach($defaults as $k=>$v)OMH\DB::exec('INSERT INTO settings(key,value) VALUES(?,?) ON CONFLICT(key) DO NOTHING',[$k,$v]);
echo "Migration complete\n";
