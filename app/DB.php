<?php namespace OMH;
class DB{
 static ?\PDO $pdo=null;
 static function p():\PDO{
  if(self::$pdo)return self::$pdo;
  $dsn='pgsql:host='.envv('DB_HOST','localhost').';port='.envv('DB_PORT','5432').';dbname='.envv('DB_DATABASE','omh_library');
  try{self::$pdo=new \PDO($dsn,envv('DB_USERNAME','postgres'),envv('DB_PASSWORD','postgres'),[\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION,\PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC]);}
  catch(\Throwable $e){http_response_code(500);echo 'Database connection failed. Check Render environment variables.';if(envv('APP_DEBUG','false')==='true')echo '<pre>'.e($e).'</pre>';exit;}
  return self::$pdo;
 }
 static function all($sql,$params=[]){$s=self::p()->prepare($sql);$s->execute($params);return $s->fetchAll();}
 static function one($sql,$params=[]){$s=self::p()->prepare($sql);$s->execute($params);return $s->fetch()?:null;}
 static function exec($sql,$params=[]){$s=self::p()->prepare($sql);$s->execute($params);return $s->rowCount();}
 static function id($sql,$params=[]){$s=self::p()->prepare($sql);$s->execute($params);return $s->fetchColumn();}
}
