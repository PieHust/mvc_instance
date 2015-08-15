<?php
	class newsModel{
		public $table ='news';

		function count(){
			$sql = 'select count(*) from '.$this->table;
			$res = DB::query($sql);
			
			return DB::findResult($res,0,0);
		}

		public function getnewsinfo($id){
			if(empty($id)){
				return array();
			}else{
				$id = intval($id);
				$sql= 'select * from '.$this->table.' where id='.$id;
				
				return DB::findOne($sql);
			}
		}

		public function newssubmit($data){
			extract($data);
			if(empty($title)||empty($content)){
				return 0;
			}

			$title = addslashes($title);
			$content = addslashes($content);
			$author = addslashes($author);
			$fromip = addslashes($fromip);
			$dateline = addslashes($dateline);


			$data = array(
				'title'=>$title,
				'content'=>$content,
				'author'=>$author,
				'fromip'=>$fromip,
				'dateline'=>$dateline,
				);

			if($_POST['id']!=''){
				DB::update($this->table,$data,'id='.$id);
				return 2;
			}else{
				DB::insert($this->table,$data);
				return 1;
			}
		}

		public function delnews($id){
			$sql = 'delete from '.$this->table.' where id = '.intval($id);
			return DB::query($sql);
		}

		public function findAll_orderby_dateline(){
			$sql = 'select * from '.$this->table.' order by dateline desc';
			return DB::findAll($sql);
		}
	}