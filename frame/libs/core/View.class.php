<?php
class View{
	private static $view;

	public static function init($viewtype,$config){
		self::$view = new $viewtype;
		foreach ($config as $key => $value) {
			self::$view->$key = $value;
		}
	}

	public static function assign($data){
		foreach ($data as $key => $value) {
			self::$view->assign($key,$value);
		}
		
	}

	public static function display($tpl){
		self::$view->display($tpl);
	}
}
?>