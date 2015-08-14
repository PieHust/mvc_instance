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
		// echo var_dump($this->auth);
		if(empty($this->auth)&&(PC::$method!='login')){
			$this->showmessage('请登录后再操作','admin.php?controller=admin&method=login');
		}
	}

	public function index(){

		$newsobj = M('news');
		$newsnum = $newsobj->count();
		View::assign(array('newsnum'=>$newsnum));
		View::display('admin/index.html');
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

	public function logout(){
		$authobj = M('auth');
	    $authobj->logout();
		// $this->showmessage('退出成功','admin.php?controller=admin&method=login');
		header('location:admin.php?controller=admin&method=login');
	}

	private function checklogin(){
		$authobj = M('auth');
		if($authobj->loginsubmit()){
			// $this->showmessage('登录成功','admin.php?controller=admin&method=index');
			header('location:admin.php?controller=admin&method=index');
		}else{
			$this->showmessage('登录失败','admin.php?controller=admin&method=login');		
		}
	}

	private function showmessage($info, $url){
			echo "<script>alert('$info');window.location.href='$url'</script>";
			exit;
		}
}