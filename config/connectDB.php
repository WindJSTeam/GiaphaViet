<?php

	class DBClass
	{
		public function DBClass($server,$user,$pass,$dbname)
		{
			if(!mysql_connect($server,$user,$pass)){
				 die("Connect Database fasle");
			};
			if(!mysql_select_db($dbname)){
				die("Missing database name");
			};
		}
		public function ExcuteQuery($sql){
			mysql_query("SET NAMES utf8");
			$result = mysql_query($sql);
			return $result;
		}
		public function Disconect()
		{
			mysql_close();
		}
	}
	class DB
	{
		public function Query($sql){
			$dbcon = new DBClass(constant('server'),constant('user'),constant('pass'),constant('dbname'));
			$result = $dbcon->ExcuteQuery($sql);
			$dbcon->Disconect();
			return $result;
		}
	}
?>