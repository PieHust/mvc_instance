<?php
	header('Conten-type:text/html;charset=utf-8');
	date_default_timezone_set('Asia/Shanghai');
	error_reporting(E_ALL^E_WARNING^E_NOTICE^E_DEPRECATED);
	require_once('config.php');
	require_once('frame/pc.php');
	PC::run($config);