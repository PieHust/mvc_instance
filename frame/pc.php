<?php
	$currentdir = dirname(__FILE__);
	include_once($currentdir.'/include.list.php');
	foreach ($paths as $key => $value) {
		include_once($currentdir.'/'.$value);
	}

	class PC{
		public static $controller;
		public static $method;
		private static $config;

		private static function init_db(){
			DB::init('mysql',self::config['dbconfig']);
		}

		private static function init_view(){
			View::init('Smarty',$config['viewconfig']);
		}

		private static function init_controller(){
			self::$controller = isset($_GET['controller'])?$_GET['controller']:'index';

		}

		private static function init_method(){
			self::$method = isset($_GET['method'])?$_GET['method']:'index';

		}

		public static function run($config){
			self::$config = $config;
			self::init_db();
			self::init_method();
			self::init_controller();
			self::init_view();
			C(self::$controller,self::$method);
		}

	}
?>