<?php
spl_autoload_register(function($class){
  $prefix='OMH\\'; if(strncmp($class,$prefix,strlen($prefix))!==0)return;
  $file=__DIR__.'/'.str_replace('\\','/',substr($class,strlen($prefix))).'.php'; if(is_file($file))require $file;
});
$envFile=__DIR__.'/../.env';
if(is_file($envFile)) foreach(file($envFile,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES) as $line){if(str_starts_with(trim($line),'#')||!str_contains($line,'='))continue;[$k,$v]=explode('=',trim($line),2);$_ENV[$k]=trim($v,'"\'');}
if(session_status()===PHP_SESSION_NONE) session_start();
function envv($k,$d=null){return $_ENV[$k]??getenv($k)??$d;}
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function csrf_token(){if(empty($_SESSION['_csrf']))$_SESSION['_csrf']=bin2hex(random_bytes(32));return $_SESSION['_csrf'];}
function csrf_field(){return '<input type="hidden" name="_csrf" value="'.e(csrf_token()).'">';}
function check_csrf(){if($_SERVER['REQUEST_METHOD']==='POST' && !hash_equals($_SESSION['_csrf']??'',$_POST['_csrf']??'')){http_response_code(419);exit('CSRF token mismatch');}}
function redirect($url){header('Location: '.$url);exit;}
function flash($type,$msg){$_SESSION['_flash']=[$type,$msg];}
function get_flash(){ $x=$_SESSION['_flash']??null; unset($_SESSION['_flash']); return $x; }
