<?php require __DIR__.'/../app/bootstrap.php';
$sql=file_get_contents(__DIR__.'/schema.sql'); OMH\DB::p()->exec($sql);
$email=envv('ADMIN_EMAIL','admin@example.com'); $pass=envv('ADMIN_PASSWORD','ChangeMe_123!');
if(!OMH\DB::one('SELECT id FROM admins WHERE email=?',[$email])) OMH\DB::exec('INSERT INTO admins(email,password_hash,role) VALUES(?,?,?)',[$email,password_hash($pass,PASSWORD_DEFAULT),'super_admin']);
$defaults=['site_name'=>'OMH Library | کتابخانه عمرمختار هاشمی','site_intro'=>'کتابخانه دیجیتال علمی، اسلامی، حنفی و عصری عمرمختار هاشمی؛ برای جستجو، معرفی، مطالعه و دسترسی قانونی به منابع.','maintenance'=>'0','show_downloads'=>'1','default_language'=>'fa','contact_name'=>'عمرمختار هاشمی','contact_location'=>'لوگر، افغانستان','contact_email'=>'OMHSocialservice@gmail.com','welcome_fa'=>'به کتابخانه عمرمختار هاشمی خوش آمدید 🥀','welcome_ps'=>'د عمرمختار هاشمي کتابتون ته ښه راغلاست 🥀','welcome_ar'=>'مرحباً بكم في مكتبة عمرمختار هاشمي 🥀','welcome_en'=>'Welcome to Omar Mokhtar Hashemi Library 🥀'];
foreach($defaults as $k=>$v) OMH\DB::exec('INSERT INTO settings(key,value) VALUES(?,?) ON CONFLICT(key) DO NOTHING',[$k,$v]);
echo "Migration complete\n";
