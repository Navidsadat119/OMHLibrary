<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;

class DatabaseSeeder extends Seeder {
 public function run(): void {
  $roots = [
   ['section'=>'science','name'=>'علوم','slug'=>'oloom','sort_order'=>1],
   ['section'=>'curriculum','name'=>'فنون درسی','slug'=>'fنون-درسی','sort_order'=>2],
   ['section'=>'school','name'=>'کتاب‌های مکتب','slug'=>'کتاب‌های-مکتب','sort_order'=>3],
  ];
  foreach($roots as $r) Category::firstOrCreate(['slug'=>$r['slug']],$r);
  $science = Category::where('slug','oloom')->first();
  foreach(['فقه حنفی','حدیث','تفسیر','عقیده','نحو','صرف','اصول فقه','بلاغت','منطق','ادبیات عرب'] as $i=>$name)
   Category::firstOrCreate(['slug'=>'science-'.$i],['parent_id'=>$science->id,'section'=>'science','name'=>$name,'sort_order'=>$i]);
  $curr = Category::where('slug','فنون-درسی')->first();
  foreach(['فقه','نحو','صرف','عقیده','اصول فقه','حدیث','تفسیر','بلاغت','منطق','ادبیات عرب'] as $i=>$name)
   Category::firstOrCreate(['slug'=>'curriculum-'.$i],['parent_id'=>$curr->id,'section'=>'curriculum','name'=>$name,'sort_order'=>$i]);
  $school = Category::where('slug','کتاب‌های-مکتب')->first();
  foreach(range(1,12) as $grade) {
   $g = Category::firstOrCreate(['slug'=>"grade-$grade"],['parent_id'=>$school->id,'section'=>'school','name'=>"صنف $grade",'sort_order'=>$grade]);
   foreach(['ریاضی','فیزیک','کیمیا','بیولوژی','دری','پشتو','انگلیسی','تاریخ','جغرافیه','تعلیمات اسلامی','کمپیوتر'] as $i=>$subject)
    Category::firstOrCreate(['slug'=>"grade-$grade-subject-$i"],['parent_id'=>$g->id,'section'=>'school','name'=>$subject,'sort_order'=>$i]);
  }
  $author = Author::firstOrCreate(['slug'=>'omar-mokhtar-hashemi'],['name'=>'عمرمختار هاشمی','full_name'=>'عمرمختار هاشمی','location'=>'لوگر، افغانستان']);
  $book = Book::firstOrCreate(['slug'=>'sample-omh-library'],[
   'title'=>'نمونه کتابخانه OMH','language_code'=>'fa','short_intro'=>'نمونه اولیه برای نمایش ساختار کتابخانه.',
   'description'=>'این رکورد نمونه است و از پنل مدیریت قابل ویرایش یا حذف خواهد بود.',
   'status'=>'published','is_featured'=>true,'featured_order'=>1,'volumes_count'=>1
  ]);
  $book->authors()->syncWithoutDetaching([$author->id]);
  $book->categories()->syncWithoutDetaching([$science->id]);
 }
}
