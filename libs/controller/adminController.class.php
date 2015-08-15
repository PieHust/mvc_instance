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

	public function newsadd(){
		//
		if (empty($_POST)) {
			//没有数据就是显示添加修改的界面
			//读取信息 get the news
			if($_GET['id']){

				$data = M('news')->getnewsinfo($_GET['id']);

			}else{
				$data = array();
			}
			View::assign(array('data'=>$data));
			View::display('admin/newsadd.html');
		}
		else{
			//进行添加
			$this->newssubmit();

		}
	}


	private function newssubmit(){
		$onews = M('news');
		$res = $onews->newssubmit($_POST);
		echo $res;
		switch ($res) {
			case 0:
				$this->showmessage('操作失败','admin.php?controller=admin&method=newsadd&id='.$_POST['id']);
				break;
			case 1:
				$this->showmessage('添加成功','admin.php?controller=admin&method=newslist');
				break;
			case 2:
				$this->showmessage('修改成功','admin.php?controller=admin&method=newslist');
				break;
			default:
				break;
			
		}
	}

	public function newslist(){
		$onews = M('news');
		$data = $onews->findAll_orderby_dateline();
		View::assign(array('data'=>$data));
		View::display('admin/newslist.html');
	}

	public function newsdel(){
		if(intval($_GET['id'])){
			$onews = M('news');
			$data = $onews->delnews($_GET['id']);
			$this->showmessage('删除成功','admin.php?controller=admin&method=newslist');
		}
		


	}
	private function showmessage($info, $url){
			echo "<script>alert('$info');window.location.href='$url'</script>";
			exit;
		}
}