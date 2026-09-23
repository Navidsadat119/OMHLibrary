<?php namespace OMH;
class App{
 function __construct(){check_csrf();}
 function run(){
  $uri=rtrim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)?:'/','/')?:'/';$method=$_SERVER['REQUEST_METHOD'];
  $routes=[
   'GET /'=>fn()=>Controllers::home(),'GET /health'=>fn()=>Controllers::health(),'GET /lang'=>fn()=>Controllers::language(),
   'GET /books'=>fn()=>Controllers::books(),'GET /book'=>fn()=>Controllers::book(),'GET /authors'=>fn()=>Controllers::authors(),'GET /author'=>fn()=>Controllers::author(),'GET /category'=>fn()=>Controllers::category(),'GET /search'=>fn()=>Controllers::search(),
   'GET /submit'=>fn()=>Controllers::submitForm(),'POST /submit'=>fn()=>Controllers::submit(),'GET /track'=>fn()=>Controllers::track(),'POST /submission/edit'=>fn()=>Controllers::submissionEdit(),
   'GET /contact'=>fn()=>Controllers::contact(),'POST /feedback'=>fn()=>Controllers::feedback(),'GET /legal'=>fn()=>Controllers::legal(),'GET /sitemap.xml'=>fn()=>Controllers::sitemap(),'GET /robots.txt'=>fn()=>Controllers::robots(),'GET /download'=>fn()=>Controllers::download(),'GET /reader'=>fn()=>Controllers::reader(),
   'GET /admin'=>fn()=>Admin::dashboard(),'GET /admin/login'=>fn()=>Admin::loginForm(),'POST /admin/login'=>fn()=>Admin::login(),'POST /admin/logout'=>fn()=>Admin::logout(),
   'GET /admin/books'=>fn()=>Admin::books(),'GET /admin/book/edit'=>fn()=>Admin::bookForm(),'POST /admin/book/save'=>fn()=>Admin::bookSave(),'POST /admin/book/delete'=>fn()=>Admin::bookDelete(),
   'GET /admin/categories'=>fn()=>Admin::categories(),'POST /admin/category/save'=>fn()=>Admin::categorySave(),'POST /admin/category/delete'=>fn()=>Admin::categoryDelete(),
   'GET /admin/authors'=>fn()=>Admin::authors(),'POST /admin/author/save'=>fn()=>Admin::authorSave(),'POST /admin/author/delete'=>fn()=>Admin::authorDelete(),
   'GET /admin/submissions'=>fn()=>Admin::submissions(),'POST /admin/submission/status'=>fn()=>Admin::submissionStatus(),
   'GET /admin/settings'=>fn()=>Admin::settings(),'POST /admin/settings'=>fn()=>Admin::settingsSave(),'GET /admin/featured'=>fn()=>Admin::featured(),'POST /admin/featured'=>fn()=>Admin::featuredSave(),
   'GET /admin/sources'=>fn()=>Admin::sources(),'POST /admin/source/save'=>fn()=>Admin::sourceSave(),'POST /admin/source/delete'=>fn()=>Admin::sourceDelete(),
   'GET /admin/sites'=>fn()=>Admin::sites(),'POST /admin/site/save'=>fn()=>Admin::siteSave(),'POST /admin/site/delete'=>fn()=>Admin::siteDelete(),'GET /admin/feedback'=>fn()=>Admin::feedback(),'POST /admin/feedback/status'=>fn()=>Admin::feedbackStatus(),
   'POST /admin/seed'=>fn()=>Admin::seed()
  ];$key=$method.' '.$uri;if(isset($routes[$key]))return $routes[$key]();http_response_code(404);return View::render('404',['title'=>'یافت نشد']);
 }
}
