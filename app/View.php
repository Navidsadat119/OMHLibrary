<?php namespace OMH;
class View{
 static function render($view,$data=[]){extract($data);$flash=get_flash();ob_start();require __DIR__.'/../resources/views/'.$view.'.php';$content=ob_get_clean();require __DIR__.'/../resources/views/layout.php';}
}
