<?php
/**
* 						
*/
class adminController
{
	public $auth='';

	public function __construct(){
		$authobj = M('auth');
		$this->auth = $authobj->getauth();
		if(empty($this->auth)&&(PC::$method!='login')){
			$this->showmessage('请登录后再操作','admin.php?controller=admin&method=login');
		}
	}


	function login(){
		if($_POST){
			//admin 模型从数据库提取信息
			//auth 进行核对信息
			//
			$this->checklogin();
		}
		else{
			View::display('admin/login.html');
		}
	}
	private function checklogin(){
		$authobj = M('auth');
		if($authobj->loginsubmit()){
			$this->showmessage('登录成功','admin.php?controller=admin&method=index');
		}else{
			$this->showmessage('登录失败','admin.php?controller=admin&method=login');		
		}
	}

	private function showmessage($info, $url){
			echo "<script>alert('$info');window.location.href='$url'</script>";
			exit;
		}
}