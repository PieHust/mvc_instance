<?php 
	class indexController{
		function index(){
			$onews = M('news');
			$data = $onews->get_news_list();
			View::assign(array('data'=>$data));
			$this->showabout();
			View::display('index/index.html');
		}

		function newsshow(){
			$data = M('news')->getnewsinfo(intval($_GET['id']));

			View::assign(array('data'=>$data));
			$this->showabout();
			View::display('index/show.html');

		}

		private function showabout(){
			$data = M('about')->aboutinfo();
			
			View::assign(array('about'=>$data));

			// View::display('index/show.html');
		}
	}