<?php

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'instintoacuatico';


	/* Conexion externamente a freesqldatabase en https://www.phpmyadmin.co/
	$server = 'sql10.freesqldatabase.com';
	$username = 'sql10418560';
	$password = 'iCDpI3RJ3R';
	$database = 'sql10418560';*/

	/* Conexion externamente a db4free en https://www.db4free.net/phpMyAdmin/index.php?route=/
	$server = 'db4free.net:3306';
	$username = 'mjsierra921';
	$password = 'n#s@@!6hLe@wd8A';
	$database = 'instintoacuatico';*/
	
	
	/* Conexion externamente a  Microsfot Azure en https://portal.azure.com/
	$server = 'instinto.mariadb.database.azure.com:3306';
	$username = 'instintoAdmin@instinto';
	$password = 'n#s@@!6hLe@wd8A';
	$database = 'instintoacuatico';*/
	
	try {
	  $con = new PDO("mysql:host=$server;dbname=$database; charset=utf8", $username, $password);
	} catch (PDOException $e) {
	  die('Connection Failed: ' . $e->getMessage());
	}
