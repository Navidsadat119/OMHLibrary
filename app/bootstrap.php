<?php
spl_autoload_register(function($class){$prefix='OMH\\';if(strncmp($class,$prefix,strlen($prefix))!==0)return;$file=__DIR__.'/'.str_replace('\\','/',substr($class,strlen($prefix))).'.php';if(is_file($file))require $file;});
$envFile=__DIR__.'/../.env';if(is_file($envFile)){foreach(file($envFile,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES) as $line){$line=trim($line);if($line===''||str_starts_with($line,'#')||!str_contains($line,'='))continue;[$k,$v]=explode('=',$line,2);$_ENV[$k]=trim($v,'"\' ');}}
ini_set('session.use_strict_mode','1');ini_set('session.cookie_httponly','1');ini_set('session.cookie_samesite','Lax');
if(session_status()===PHP_SESSION_NONE)session_start();
function envv($k,$d=null){return $_ENV[$k]??getenv($k)??$d;}
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function csrf_token(){if(empty($_SESSION['_csrf']))$_SESSION['_csrf']=bin2hex(random_bytes(32));return $_SESSION['_csrf'];}
function csrf_field(){return '<input type="hidden" name="_csrf" value="'.e(csrf_token()).'">';}
function check_csrf(){if($_SERVER['REQUEST_METHOD']==='POST'&&!hash_equals($_SESSION['_csrf']??'',$_POST['_csrf']??'')){http_response_code(419);exit('CSRF token mismatch');}}
function redirect($url){header('Location: '.$url);exit;}
function flash($type,$msg){$_SESSION['_flash']=[$type,$msg];}
function get_flash(){$x=$_SESSION['_flash']??null;unset($_SESSION['_flash']);return $x;}
function setting($key,$default=''){static $cache=null;if($cache===null){$cache=[];try{foreach(OMH\DB::all('SELECT key,value FROM settings') as $s)$cache[$s['key']]=$s['value'];}catch(Throwable $e){}}return $cache[$key]??$default;}
function lang(){ $l=$_GET['lang']??$_SESSION['lang']??'fa';if(!in_array($l,['fa','ps','ar','en'],true))$l='fa';$_SESSION['lang']=$l;return $l; }
function slugify($s){$s=preg_replace('/[^\p{L}\p{N}]+/u','-',trim($s));return trim($s,'-')?:bin2hex(random_bytes(5));}
function client_ip_hash(){return hash('sha256',($_SERVER['REMOTE_ADDR']??'').envv('APP_KEY','omh'));}
function upload_file($field,$dir,$maxBytes,$allowedMimes){if(empty($_FILES[$field])||$_FILES[$field]['error']===UPLOAD_ERR_NO_FILE)return null;$f=$_FILES[$field];if($f['error']!==UPLOAD_ERR_OK||$f['size']>$maxBytes)throw new RuntimeException('فایل نامعتبر یا بزرگ‌تر از حد مجاز است.');$mime=(new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']);if(!in_array($mime,$allowedMimes,true))throw new RuntimeException('نوع فایل مجاز نیست.');$ext=$mime==='application/pdf'?'pdf':($mime==='image/png'?'png':($mime==='image/webp'?'webp':'jpg'));$name=bin2hex(random_bytes(18)).'.'.$ext;$root=__DIR__.'/../uploads/'.$dir;if(!is_dir($root))mkdir($root,0775,true);if(!move_uploaded_file($f['tmp_name'],$root.'/'.$name))throw new RuntimeException('ذخیره فایل انجام نشد.');return $dir.'/'.$name;}
