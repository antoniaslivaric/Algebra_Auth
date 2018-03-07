<?php

class User() {
		private function __construct() {}
			
			
		public static function create($user) {
				$this->user = $user;
			//	insert into database, ako ne uspijemo generirati treba napraviti exception
		}
		
}