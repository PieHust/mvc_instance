<?php 
	class aboutModel{

		public function aboutinfo(){
			return file_get_contents('data/aboutus.txt');
		}
	}