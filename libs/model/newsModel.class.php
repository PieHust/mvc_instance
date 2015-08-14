<?php
	class newsModel{
		public $table ='news';

		function count(){
			$sql = 'select count(*) from '.$this->table;
			return DB::findResult($sql,0,0);
		}
	}