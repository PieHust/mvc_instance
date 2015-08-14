<?php
	class adminModel{
		private $table = 'admin';

		//取用户信息 通过用户名
		function findOne_by_username($username){
			$sql = 'select * from '.$this->table.' where username = "'.$username.'"';

			return DB::findOne($sql);
		}

		//用户名密码核对 auth模型
	}